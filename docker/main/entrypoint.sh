#!/bin/sh
#set -e


USER_LOGIN=developer
HOME_DIR=/home/$USER_LOGIN

if [ -z "$USER_ID" ]; then
	USER_ID=1000
fi

if ! id -u $USER_LOGIN > /dev/null 2>&1
then
	# CREATE developer USER
	addgroup --gid $USER_ID $USER_LOGIN \
    && adduser --uid $USER_ID --ingroup $USER_LOGIN --shell /bin/bash --disabled-password --gecos "" $USER_LOGIN \
    && usermod -aG sudo $USER_LOGIN \
    && echo "$USER_LOGIN ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers

    # xdebug improvments
    # find correct host ip address
    HOST_IP=`/sbin/ip route|awk '/default/ { print $3 }'`
    # file has only this line
    echo export XDEBUG_CONFIG="remote_host=$HOST_IP" > $HOME_DIR/.bashrc
    echo export XDEBUG_REMOTE_HOST="$HOST_IP" >> $HOME_DIR/.bashrc
    echo export PHP_IDE_CONFIG="serverName=$HTTP_DOMAIN" >> $HOME_DIR/.bashrc

    echo 'export PS1="[\$(test -e /usr/local/etc/php/conf.d/xdebug.off && echo XOFF || echo XON)] $HC$FYEL[ $FBLE${debian_chroot:+($debian_chroot)}\u$FYEL: $FBLE\w $FYEL]\\$ $RS"' >> $HOME_DIR/.bashrc
    # ADD ALIASES
    echo "source /etc/environment" >> $HOME_DIR/.bashrc

	printenv | sed 's/^\([^=]*\)=\(.*\)$/export \1=\"\2\"/g' > /home/$USER_LOGIN/project_env.sh

    chown $USER_LOGIN:$USER_LOGIN -R /home/$USER_LOGIN
    chown $USER_LOGIN:$USER_LOGIN -R /opt
    chown $USER_LOGIN:$USER_LOGIN -R /usr/local/composer
    chown $USER_LOGIN:$USER_LOGIN -R /var/log
fi


# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

exec "$@"
