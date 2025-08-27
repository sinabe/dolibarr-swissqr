#!/bin/bash

docker run --rm --interactive --tty --volume ./includes:/app composer update --ignore-platform-req=ext-bcmath

# Clean up vendor directory

if [ -d includes/vendor/sprain/swiss-qr-bill/example ]; then
  rm -rf includes/vendor/sprain/swiss-qr-bill/example
fi

cd ..

if [ -f swissqr.zip ]; then
  rm swissqr.zip
fi
zip -r swissqr.zip swissqr -x "swissqr/.git*"