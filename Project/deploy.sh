#!/bin/bash
cd $(dirname $0)

#
# Remove old web pages
#
sudo rm -rf /var/www/html/*

#
# copy new web pages
#
sudo cp -r ./http_server/* /var/www/html/

#
# Set permissions 
#

