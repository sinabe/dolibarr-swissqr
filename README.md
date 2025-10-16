# Swiss QR-bill for Dolibarr

This module adds support for generating **Swiss QR-bill** (DE: QR-Rechnung, FR: QR-facture,IT: QR-fattura) invoices within Dolibarr ERP/CRM.
It provides an additional invoice template that complies with the Swiss QR-bill standard, making it easier to issue legally valid invoices in Switzerland.

For more information: https://www.six-group.com/en/products-services/banking-services/payment-standardization/standards/qr-bill.html

## Features
- Supports both QR-IBAN and standard IBAN payment methods.
-	Generates QR codes according to the official Swiss standard.
-	Seamlessly integrates with Dolibarr’s invoice system.
-	Produces ready-to-use invoices in PDF format, including the payment slip.
-	Based on Swiss QR Bill PHP library https://github.com/sprain/php-swiss-qr-bill/

## Requirements
-	PHP ≥ 8.1
-	Dolibarr ≥ 18, compatible up to 21

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
