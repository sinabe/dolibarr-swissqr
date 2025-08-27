# Swiss QR Invoice for Dolibarr

This Dolibarr module add Swiss QR invoice model to Dolibarr ERP/CRM.
The model supports QR-IBAN or classic IBAN.

## Requirement

This module require PHP 8.1 and Dolibarr 18.
Compatible up to Dolibarr 21.

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

## Installation

1. Dowload the module from the Github repository
2. Use the upload function in Setup -> Modules/Applications -> Deploy/install external app/module
3. Activate the Swiss QR module
4. Activate the model in Setup -> Modules/Applications -> Invoices
5. You need to configure a bank account with an IBAN or QR-IBAN (reference number).
6. In case of QR-IBAN add the variable SI_SWISSQR_REF in Setup -> Other Setup. You receive this number from your bank (BESR-ID). For Postfinance value is 00000.

## Baed on

* Swiss QR Bill (https://github.com/sprain/php-swiss-qr-bill/)

# QR facture suisse pour Dolibarr

Ce module Dolibarr ajoute un modèle de facture QR Suisse à Dolibarr ERP/CRM.
Le modèle prend en charge un IBAN traditionnel ou un IBAN QR.

## Prérequis

Ce module nécessite PHP 8.x et Dolibarr 16. Il est compatible jusqu'à Dolibarr 21.

## Installation

1. Téléchargez le module depuis le dépôt GitHub
2. Utilisez la fonction d'upload dans Configuration -> Modules/Applications -> Déployer/Installer un module externe
3. Activez le module Swiss QR
4. Activer le modèle dans Configuration -> Modules/Applications -> Factures et avoirs
5. Vous devez configurer un compte bancaire avec un IBAN ou un IBAN QR (numéro de référence).
6. En cas d'utilisation d'un IBAN-QR, ajoutez la variable SI_SWISSQR_REF dans Setup -> Autres paramètres. Ce numéro provient de votre banque (BESR-ID). Pour Postfinance, la valeur est 00000.

# Swiss QR Invoice für Dolibarr

Dieser Dolibarr-Modul fügt einen Swiss QR-Rechnungsmodell zu Dolibarr ERP/CRM hinzu.
Das Modell unterstützt QR-IBAN oder klassischen IBAN.

## Anforderung

Dieser Modul erfordert PHP 8.x und Dolibarr 16. Kompatibel bis Dolibarr 21.

## Installation

1. Laden Sie das Modul vom GitHub-Repository herunter
2. Verwenden Sie die Upload-Funktion unter Einstellungen -> Modul/Applikationen -> Externes Modul hinzufügen
3. Aktivieren Sie das Modul Swiss QR
4. Aktivieren Sie die Vorlage in Einstellungen -> Modul/Applikationen -> Rechnungen
5. Sie müssen ein Bankkonto mit IBAN oder QR-IBAN (Referenznummer) konfigurieren.
6. Falls Sie QR-IBAN verwenden, fügen Sie die Variable SI_SWISSQR_REF in Setup -> Andere Einstellungen hinzu. Sie erhalten diese Nummer von Ihrer Bank (BESR-ID). Für Postfinance ist der Wert 00000.

# Fattura QR svizzera per Dolibarr

Questo modulo Dolibarr aggiunge un modello di fattura QR Svizzera a Dolibarr ERP/CRM.
Il modello supporta IBAN classico o QR-IBAN.

## Requisiti

Questo modulo richiede PHP 8.x e Dolibarr 16. Compatibile fino a Dolibarr 21.

## Installazione

1. Scarica il modulo dal repository GitHub
2. Utilizza la funzione di caricamento in Impostazioni -> Moduli/Applicazioni -> Trova app/moduli esterni...
3. Attiva il modulo Swiss QR
4. Attivare il modello in Impostazioni -> Moduli/Applicazioni -> Fornitori
5. Devi configurare un conto bancario con un IBAN o QR-IBAN (numero di riferimento).
6. In caso di utilizzo di un IBAN QR, aggiungi la variabile SI_SWISSQR_REF in Impostazioni -> Altri Impostazioni. Questo numero viene fornito dalla tua banca (BESR-ID). Per Postfinance il valore è 00000.
