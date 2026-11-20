#!/bin/bash

chown www-data:www-data /var/www/html/uploads
chmod 755 /var/www/html/uploads

exec apachectl -D FOREGROUND