#!/bin/bash

if [ $(basename $(pwd)) == "bin" ]; then
  echo "Please, get out of there, this command needs to be executed from the upper directory, eg. bash ./bin/dist-js-bundles.sh."
  exit
fi

if [ $(basename $(pwd)) != "aibvc-wp-scoreboards" ]; then
  echo "This script must be executed from the root of the aibvc-wp-scoreboards plugin. Aborting..."
  exit
fi

if [ ! command -v "browserify" &>/dev/null || ! command -v "uglifyjs" &>/dev/null ]; then
  echo "Scripts browserify and uglify-js must be installed in order to execute this script! Aborting..."
  exit
fi

widget_files=(assets/js/ranking-widget-module.js assets/js/tournaments-widget-module.js)

echo "Bundling:"
for file in "${widget_files[@]}"; do
  fileName=$(basename $file)
  echo "[*] $fileName from assets/js/$fileName"
done
# create bundle
browserify ${widget_files[@]} | uglifyjs > "assets/js/dist/aibvcs-widgets.bundle.js"

echo "done."
