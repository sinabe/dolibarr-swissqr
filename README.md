# Swiss QR-bill for Dolibarr

This module adds support for generating **Swiss QR-bill** (DE: QR-Rechnung, FR: QR-facture,IT: QR-fattura) invoices within Dolibarr ERP/CRM.
It provides an additional invoice template that complies with the Swiss QR-bill standard, making it easier to issue valid invoices in Switzerland.

For more information: https://www.six-group.com/en/products-services/banking-services/payment-standardization/standards/qr-bill.html

## Features
- Supports both QR-IBAN and standard IBAN payment methods.
- Generates QR codes according to the official Swiss standard.
- Seamlessly integrates with Dolibarr’s invoice system.
- Produces ready-to-use invoices in PDF format, including the payment slip.
- Based on Swiss QR Bill PHP library https://github.com/sprain/php-swiss-qr-bill/

## Requirements
- PHP ≥ 8.1
- Dolibarr ≥ 18, compatible up to 23

## Installation

1. Dowload the module from the Github repository
2. Use the upload function in Setup -> Modules/Applications -> Deploy/install external app/module
3. Activate the Swiss QR module
4. Activate the model in Setup -> Modules/Applications -> Invoices
5. You need to configure a bank account with an IBAN or QR-IBAN (reference number).
6. For QR-IBAN payments, configure the BESR-ID in Setup → Other Setup using the variable SI_SWISSQR_REF.
    The BESR-ID is provided by your bank and is required to generate the QR payment reference.

    You can configure a BESR-ID for each bank account using the variable SI_SWISSQR_REF_{ACCOUNT_REF}, where {ACCOUNT_REF} is the reference of the bank account in Dolibarr.

    - Account-specific configuration (SI_SWISSQR_REF_{ACCOUNT_REF}) takes priority.
    - If no account-specific value is configured, the global SI_SWISSQR_REF value is used as a fallback.
    - For PostFinance, use 00000 as the BESR-ID.
    Note: A valid BESR-ID configuration is mandatory for QR-IBAN payments.

## How to build the module
To build the module, follow these steps:

```shell
# Open a terminal (Command Prompt or PowerShell for Windows, Terminal for macOS or Linux)

# Ensure Git is installed
# Visit https://git-scm.com to download and install console Git if not already installed

# Ensure Docker is installed
# Visit https://docker.com to download and install Docker if not already installed

# Clone the repository
git clone https://github.com/sinabe/dolibarr-swissqr.git

# Rename the project directory
mv dolibarr-swissqr swissqr

# Navigate to the project directory
cd swissqr

# Compile the project
bash build/build.sh

# Rename the zip file with the version according to Dolibarr documentation
cd ..
mv swissqr.zip swissqr-1.0.0.zip

```

# Facture QR-Suisse pour Dolibarr

Ce module permet de générer des factures **QR-facture** dans Dolibarr ERP/CRM.
Il fournit un modèle de facture complémentaire conformes à la norme Suisse QR-facture, facilitant l'émission de factures valables en Suisse.

Pour plus d'informations : https://www.six-group.com/en/products-services/banking-services/payment-standardization/standards/qr-bill.html

## Fonctionnalités

- Support des méthodes de paiement QR-IBAN et IBAN standard.
- Génération de codes QR conformes à la norme suisse officielle.
- Intégration fluide avec le système de facturation de Dolibarr.
- Production de factures prêtes à l'emploi au format PDF, incluant le justificatif de paiement.
- Base sur la bibliothèque PHP QR Bill : https://github.com/sprain/php-swiss-qr-bill/

## Exigences

- PHP ≥ 8.1
- Dolibarr ≥ 18, compatible jusqu'à 23

## Installation

1. Téléchargez le module depuis le dépôt GitHub
2. Utilisez la fonction d'upload dans Configuration -> Modules/Applications -> Déployer/Installer un module externe
3. Activez le module Swiss QR
4. Activer le modèle dans Configuration -> Modules/Applications -> Factures et avoirs
5. Vous devez configurer un compte bancaire avec un IBAN ou un IBAN QR (numéro de référence).
6. Pour les paiements avec un QR-IBAN, configurez le BESR-ID dans Configuration → Autres paramètres à l'aide de la variable SI_SWISSQR_REF.

    Le BESR-ID est fourni par votre banque et est nécessaire pour générer la référence de paiement QR.

    Vous pouvez configurer un BESR-ID pour chaque compte bancaire à l'aide de la variable SI_SWISSQR_REF_{ACCOUNT_REF}, où {ACCOUNT_REF} correspond à la référence du compte bancaire dans Dolibarr.

    - La configuration spécifique au compte (SI_SWISSQR_REF_{ACCOUNT_REF}) est prioritaire.
    - Si aucune valeur spécifique au compte n'est configurée, la valeur globale SI_SWISSQR_REF est utilisée comme solution de remplacement.
    - Pour PostFinance, utilisez 00000 comme BESR-ID.

    Remarque : La configuration d'un BESR-ID valide est obligatoire pour les paiements avec un QR-IBAN.

# Swiss QR-Rechnung für Dolibarr

Dieses Modul ermöglicht die Erstellung von **Swiss QR-Rechnung** innerhalb von Dolibarr ERP/CRM.
Es bietet eine zusätzliche Rechnungsvorlage, die den Schweizer QR-Bill standard einhält, um rechtlich gültige Rechnungen in der Schweiz effizient zu erstellen.

Weitere Informationen: https://www.six-group.com/en/products-services/banking-services/payment-standardization/standards/qr-bill.html

## Funktionen

- Unterstützt sowohl QR-IBAN als auch Standard-IBAN-Zahlungsmethoden.
- Erzeugt QR-Codes gemäß der offiziellen Schweizer Norm.
- Integriert sich problemlos mit dem Rechnungssystem von Dolibarr.
- Erzeugt Rechnungen im PDF-Format, die direkt verwendet werden können, inklusive des Zahlungsnachweises.
- Basiert auf der PHP-Bibliothek Swiss QR Bill: https://github.com/sprain/php-swiss-qr-bill/

## Anforderungen

- PHP ≥ 8.1
- Dolibarr ≥ 18, kompatibel bis 23

## Installation

1. Laden Sie das Modul vom GitHub-Repository herunter
2. Verwenden Sie die Upload-Funktion unter Einstellungen -> Modul/Applikationen -> Externes Modul hinzufügen
3. Aktivieren Sie das Modul Swiss QR
4. Aktivieren Sie die Vorlage in Einstellungen -> Modul/Applikationen -> Rechnungen
5. Sie müssen ein Bankkonto mit IBAN oder QR-IBAN (Referenznummer) konfigurieren.
6. Für Zahlungen mit QR-IBAN konfigurieren Sie die BESR-ID unter Konfiguration → Weitere Einstellungen mithilfe der Variable SI_SWISSQR_REF.

    Die BESR-ID wird von Ihrer Bank bereitgestellt und ist erforderlich, um die QR-Zahlungsreferenz zu generieren.

    Sie können für jedes Bankkonto eine eigene BESR-ID konfigurieren. Verwenden Sie dazu die Variable SI_SWISSQR_REF_{ACCOUNT_REF}, wobei {ACCOUNT_REF} der Referenz des Bankkontos in Dolibarr entspricht.

    - Die kontospezifische Konfiguration (SI_SWISSQR_REF_{ACCOUNT_REF}) hat Vorrang.
    - Wenn kein kontospezifischer Wert konfiguriert ist, wird ersatzweise der globale Wert SI_SWISSQR_REF verwendet.
    - Für PostFinance verwenden Sie 00000 als BESR-ID.

    Hinweis: Für Zahlungen mit QR-IBAN ist eine gültige BESR-ID-Konfiguration erforderlich.

# Swiss QR-fattura per Dolibarr

Questo modulo aggiunge supporto per la generazione di **Swiss QR-fattura** all'interno di Dolibarr ERP/CRM.
Fornisce un modello di fattura aggiuntivo che rispetta lo standard Swiss QR-Bill, rendendo più semplice l'emissione di fatture valide in Svizzera.

Per ulteriori informazioni: https://www.six-group.com/en/products-services/banking-services/payment-standardization/standards/qr-bill.html

## Funzionalità

- Supporta sia i metodi di pagamento QR-IBAN che i metodi standard IBAN.
- Genera codici QR in conformità con lo standard svizzero ufficiale.
- Si integra in modo fluido con il sistema di fatturazione di Dolibarr.
- Produce fatture pronte all'uso in formato PDF, inclusi i documenti di pagamento.
- Basato sulla libreria PHP Swiss QR Bill: https://github.com/sprain/php-swiss-qr-bill/

## Requisiti

- PHP ≥ 8.1
- Dolibarr ≥ 18, compatibile fino a 23

## Installazione

1. Scarica il modulo dal repository GitHub
2. Utilizza la funzione di caricamento in Impostazioni -> Moduli/Applicazioni -> Trova app/moduli esterni...
3. Attiva il modulo Swiss QR
4. Attivare il modello in Impostazioni -> Moduli/Applicazioni -> Fornitori
5. Devi configurare un conto bancario con un IBAN o QR-IBAN (numero di riferimento).
6. Per i pagamenti con QR-IBAN, configurare il BESR-ID in Configurazione → Altre impostazioni utilizzando la variabile SI_SWISSQR_REF.

    Il BESR-ID viene fornito dalla vostra banca ed è necessario per generare il riferimento di pagamento QR.

    È possibile configurare un BESR-ID specifico per ogni conto bancario utilizzando la variabile SI_SWISSQR_REF_{ACCOUNT_REF}, dove {ACCOUNT_REF} corrisponde al riferimento del conto bancario in Dolibarr.

    - La configurazione specifica del conto (SI_SWISSQR_REF_{ACCOUNT_REF}) ha la priorità.
    - Se non è configurato alcun valore specifico per il conto, viene utilizzato come alternativa il valore globale SI_SWISSQR_REF.
    - Per PostFinance, utilizzare 00000 come BESR-ID.

    Nota: Per i pagamenti con QR-IBAN è obbligatoria una configurazione BESR-ID valida.
