#!/bin/bash

LOGFILE=/tmp/docker-compose.txt

chown -R www-data /var/www/html/

# Make www-data user and group use id:s from hosts user to make shared folder writable.
#
# fetch current userid and groupid for user www-data
WWW_DATA_USERID=$(id -u www-data)
WWW_DATA_GROUPID=$(id -g www-data)
# if current userid doesn’t equal the one from yaml, force id of user to the one from yaml
if [ “$WWW_DATA_USERID” -ne “${USERID}” ];then
   echo “run.sh : usermod -u ${USERID} www-data” >> $LOGFILE
   usermod -u ${USERID} www-data
fi
# if current groupid doesn’t equal the one from yaml, force id of group to the one from yaml
if [ “$WWW_DATA_GROUPID” -ne “${GROUPID}” ];then
   echo “run.sh : groupmod -g ${GROUPID} www-data” >> $LOGFILE
   groupmod -g ${GROUPID} www-data
fi

# Replace conf with wp conf
cp /docker_conf/wp.default.conf /etc/apache2/sites-enabled/000-default.conf

# Install wp-cli
apt-get update && apt-get install -y sudo less
curl -o /bin/wp-cli.phar https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
cp /docker_conf/wp-su.sh /bin/wp
chmod +x /bin/wp-cli.phar /bin/wp

# start apache
exec apache2ctl -D FOREGROUND