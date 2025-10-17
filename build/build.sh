#!/bin/bash

# Extract version of the module
file=$(pwd)"/core/modules/modSwissqr.class.php"
version=$(grep -oE '[0-9]+\.[0-9]+\.[0-9]+' "$file" 2>/dev/null)

docker run --rm --interactive --tty --volume ./includes:/app composer update --ignore-platform-req=ext-bcmath

# Clean up vendor directory

if [ -d includes/vendor/sprain/swiss-qr-bill/example ]; then
  rm -rf includes/vendor/sprain/swiss-qr-bill/example
fi

if [ -d includes/vendor/symfony/intl/Resources/data/currencies ]; then
  rm -rf includes/vendor/symfony/intl/Resources/data/currencies
fi

if [ -d includes/vendor/symfony/intl/Resources/data/languages ]; then
  rm -rf includes/vendor/symfony/intl/Resources/data/languages
fi

if [ -d includes/vendor/symfony/intl/Resources/data/timezones ]; then
  rm -rf includes/vendor/symfony/intl/Resources/data/timezones
fi

if [ -d includes/vendor/symfony/intl/Resources/data/transliterator ]; then
  rm -rf includes/vendor/symfony/intl/Resources/data/transliterator
fi

if [ -d includes/vendor/endroid/qr-code/assets ]; then
  rm -rf includes/vendor/endroid/qr-code/assets
fi

cd ..

if [ -f swissqr.zip ]; then
  rm swissqr.zip
fi

zip -r swissqr.zip swissqr -x "swissqr/.git*" "swissqr/build/*"

# Rename ZIP file
if [ -f swissqr.zip ]; then
  mv "swissqr.zip" "swissqr-${version}.zip"
fi