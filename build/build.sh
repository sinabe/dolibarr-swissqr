#!/bin/bash

docker run --rm --interactive --tty --volume $(pwd):/app composer update --ignore-platform-req=ext-bcmath


# Nettoyage du dossier vendor
if [ -d vendor/sprain/swiss-qr-bill/example ]; then
  rm -rf vendor/sprain/swiss-qr-bill/example
fi

cd ..

if [ -f swissqr.zip ]; then
  rm swissqr.zip
fi
zip -r swissqr.zip swissqr -x "swissqr/.git*"