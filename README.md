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
- Dolibarr ≥ 18, compatible up to 22

## Installation

1. Dowload the module from the Github repository
2. Use the upload function in Setup -> Modules/Applications -> Deploy/install external app/module
3. Activate the Swiss QR module
4. Activate the model in Setup -> Modules/Applications -> Invoices
5. You need to configure a bank account with an IBAN or QR-IBAN (reference number).
6. In case of QR-IBAN add the variable SI_SWISSQR_REF in Setup -> Other Setup. You receive this number from your bank (BESR-ID). For Postfinance value is 00000.

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
- Dolibarr ≥ 18, compatible jusqu'à 22

## Installation

1. Téléchargez le module depuis le dépôt GitHub
2. Utilisez la fonction d'upload dans Configuration -> Modules/Applications -> Déployer/Installer un module externe
3. Activez le module Swiss QR
4. Activer le modèle dans Configuration -> Modules/Applications -> Factures et avoirs
5. Vous devez configurer un compte bancaire avec un IBAN ou un IBAN QR (numéro de référence).
6. En cas d'utilisation d'un IBAN-QR, ajoutez la variable SI_SWISSQR_REF dans Setup -> Autres paramètres. Ce numéro provient de votre banque (BESR-ID). Pour Postfinance, la valeur est 00000.

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
- Dolibarr ≥ 18, kompatibel bis 22

## Installation

1. Laden Sie das Modul vom GitHub-Repository herunter
2. Verwenden Sie die Upload-Funktion unter Einstellungen -> Modul/Applikationen -> Externes Modul hinzufügen
3. Aktivieren Sie das Modul Swiss QR
4. Aktivieren Sie die Vorlage in Einstellungen -> Modul/Applikationen -> Rechnungen
5. Sie müssen ein Bankkonto mit IBAN oder QR-IBAN (Referenznummer) konfigurieren.
6. Falls Sie QR-IBAN verwenden, fügen Sie die Variable SI_SWISSQR_REF in Setup -> Andere Einstellungen hinzu. Sie erhalten diese Nummer von Ihrer Bank (BESR-ID). Für Postfinance ist der Wert 00000.

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
- Dolibarr ≥ 18, compatibile fino a 22

## Installazione

1. Scarica il modulo dal repository GitHub
2. Utilizza la funzione di caricamento in Impostazioni -> Moduli/Applicazioni -> Trova app/moduli esterni...
3. Attiva il modulo Swiss QR
4. Attivare il modello in Impostazioni -> Moduli/Applicazioni -> Fornitori
5. Devi configurare un conto bancario con un IBAN o QR-IBAN (numero di riferimento).
6. In caso di utilizzo di un IBAN QR, aggiungi la variabile SI_SWISSQR_REF in Impostazioni -> Altri Impostazioni. Questo numero viene fornito dalla tua banca (BESR-ID). Per Postfinance il valore è 00000.
