#!/bin/bash

set -e


service mariadb start


until mariadb-admin ping --silent; do
    sleep 1
done

# DB
mariadb < /opt/nexora/init/01-schema.sql

# SSH
mkdir -p /run/sshd
/usr/sbin/sshd

exec apachectl -D FOREGROUND