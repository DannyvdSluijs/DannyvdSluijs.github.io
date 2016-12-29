#!/bin/bash
#######################################################################
# Application preparation
#######################################################################

(
    cd /var/www/html;

    # Compile CSS and JS
    npm install;
    npm run build;
)