#!/bin/ash

chmod 600 /entrypoint.sh

export SECRET=$(tr -dc a-zA-Z0-9 </dev/urandom | head -c 100) # you can't guess this... Plz do not waste time!!

sed -i "s/\[SECRET\]/$SECRET/g" /www/index.php

echo $SECRET

echo '*/1 * * * * rm /www/uploads/*' >> /var/spool/cron/crontabs/root

crond -f &

/usr/bin/supervisord -c /etc/supervisord.conf