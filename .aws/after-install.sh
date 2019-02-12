#!/bin/bash

(
    cd /var/www/html;

    npm install;
    ng build  --prod;
)