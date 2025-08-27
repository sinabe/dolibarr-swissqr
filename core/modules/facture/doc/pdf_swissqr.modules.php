<?php
/*
 * Copyright (C) 2022-2025  Sinabe Sàrl, Benoit Vianin
 * Copyright (C) 2023       Didier Raboud
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 * or see https://www.gnu.org/
 */

/**
 *  \file       htdocs/custom/swissqr/core/modules/facture/doc/pdf_swissqr.modules.php
 *  \ingroup    facture
 *  \brief      File of class to generate customers invoices from sponge model
 */

use Sprain\SwissQrBill as QrBill;
require_once DOL_DOCUMENT_ROOT.'/custom/swissqr/includes/vendor/autoload.php';

require_once DOL_DOCUMENT_ROOT.'/core/modules/facture/modules_facture.php';
require_once DOL_DOCUMENT_ROOT.'/core/modules/facture/doc/pdf_sponge.modules.php';
require_once DOL_DOCUMENT_ROOT.'/product/class/product.class.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/company.lib.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/functions2.lib.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/pdf.lib.php';

/**
 *	Class to manage PDF invoice template sponge
 */
class pdf_swissqr extends pdf_sponge
{
	/**
	 *	Constructor
	 *
	 *  @param		DoliDB		$db      Database handler
	 */
	public function __construct($db)
	{
        parent::__construct($db);
        $this->name = "SwissQR";
		$this->description = 'Swiss QR invoice based on sponge model';
	}

    public function addBottomQRInvoice($pdf, $object, $langs): bool
    {
        $bankid = ($object->fk_account <= 0 ? $conf->global->FACTURE_RIB_NUMBER : $object->fk_account);
        if ($object->fk_bank > 0) {
            $bankid = $object->fk_bank; // For backward compatibility when object->fk_account is forced with object->fk_bank
        }
        $account = new Account($this->db);
        $account->fetch($bankid);

        // Copy account outside the tableau_info function
        $object->account = $account;

        $pdf->AddPage();
        $this->_pagehead($pdf, $object, 0, $langs);
        $pdf->SetTextColor(0, 0, 0);
        $this->qrinvoice($pdf, $object, $langs);

        return true;
    }

    /**
     * Swiss QR invoice
     * 
     * This function add the QR-invoice block add the end of the last page of the PDF invoice.
     * 
     * @param object TFTP object
     * @param object the Dolibarr invoice object
     * @param object the Dolibarr langs object
     * @param object the Dolibarr configuration
     */
    protected function qrinvoice($pdf, $object, $langs)
    {
        if (empty($object->fk_account)) {
			$this->error = 'Bank account must be defined to use this feature';
			return false;
		}

        // Create a new instance of QrBill, containing default headers with fixed values
        $qrBill = QrBill\QrBill::create();

        // Add creditor information
        // Who will receive the payment and to which bank account?
        if ($object->account->proprio != '') {
            $qrBill->setCreditor(
                QrBill\DataGroup\Element\StructuredAddress::createWithStreet(
                    $object->account->proprio,
                    $object->account->owner_address,
                    '',
                    $object->account->owner_zip,
                    $object->account->owner_town,
                    'CH'
                )
            );
        } else {
            $qrBill->setCreditor(
                QrBill\DataGroup\Element\StructuredAddress::createWithStreet(
                    $this->emetteur->name,
                    $this->emetteur->address,
                    '',
                    $this->emetteur->zip,
                    $this->emetteur->town,
                    'CH'
                )
            );
        }

        $qrBill->setCreditorInformation(
            QrBill\DataGroup\Element\CreditorInformation::create($object->account->iban // This is a special QR-IBAN. Classic IBANs will not be valid here.
            ));

        $creditorInformation = QrBill\DataGroup\Element\CreditorInformation::create($object->account->iban);

        if ($creditorInformation->containsQrIban()) {

            $ref = $object->ref;

            if (str_contains($ref, 'PROV'))
            {
                $ref = 0;
            }

            $ref = preg_replace('/[^0-9]/', '', $ref);

            // Add payment reference for QR-IBAN
            // This is what you will need to identify incoming payments.
            $referenceNumber = QrBill\Reference\QrPaymentReferenceGenerator::generate(
                $conf->global->SI_SWISSQR_REF,  // You receive this number from your bank (BESR-ID). Unless your bank is PostFinance, in that case use NULL.
                $ref // A number to match the payment with your internal data, e.g. an invoice number
            );
        
            $qrBill->setPaymentReference(
                QrBill\DataGroup\Element\PaymentReference::create(
                    QrBill\DataGroup\Element\PaymentReference::TYPE_QR,
                    $referenceNumber
                )
            );
        } else {
            // Add payment reference CLASSIC-IBAN
            // This is what you will need to identify incoming payments.
            $qrBill->setPaymentReference(
                QrBill\DataGroup\Element\PaymentReference::create(
                    QrBill\DataGroup\Element\PaymentReference::TYPE_NON
                )
            );
        }

        // Add debtor information
        // Who has to pay the invoice? This part is optional.
        $qrBill->setUltimateDebtor(
            QrBill\DataGroup\Element\StructuredAddress::createWithStreet(
                $object->thirdparty->name,
                $object->thirdparty->address,
                '',
                $object->thirdparty->zip,
                $object->thirdparty->town,
                'CH'
            ));

        // Calculate total with taxes
        $deja_regle = $object->getSommePaiement((isModEnabled("multicurrency") && $object->multicurrency_tx != 1) ? 1 : 0);
        $creditnoteamount = $object->getSumCreditNotesUsed((!empty($conf->multicurrency->enabled) && $object->multicurrency_tx != 1) ? 1 : 0); // Warning, this also include excess received
        $depositsamount = $object->getSumDepositsUsed((!empty($conf->multicurrency->enabled) && $object->multicurrency_tx != 1) ? 1 : 0);
        $balance = price2num($object->total_ttc - $deja_regle - $creditnoteamount - $depositsamount, 'MT');
  
        if ($balance < 0) {
            $balance = 0;
        }

        // Add payment amount information
        // What amount is to be paid?
        $qrBill->setPaymentAmountInformation(
            QrBill\DataGroup\Element\PaymentAmountInformation::create(
                'CHF',
                $balance
            ));

        // Optionally, add some human-readable information about what the bill is for.
        $qrBill->setAdditionalInformation(
            QrBill\DataGroup\Element\AdditionalInformation::create(
                $object->ref
            )
        );

        // Define the translation to use
        if ($langs->shortlang == 'de' || $langs->shortlang == 'fr' || $langs->shortlang == 'it' || $langs->shortlang == 'en')
        {
            $output = new QrBill\PaymentPart\Output\TcPdfOutput\TcPdfOutput($qrBill, $langs->shortlang, $pdf);
        } else 
        {
            $output = new QrBill\PaymentPart\Output\TcPdfOutput\TcPdfOutput($qrBill, 'en', $pdf);
        }

        $output->setPrintable(false)->getPaymentPart();
    }
}