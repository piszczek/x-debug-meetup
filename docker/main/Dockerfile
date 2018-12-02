FROM piszczek/php:latest

# CLEAN APT AND TMP
RUN apt-get clean && apt-get autoremove && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# MKDIR & CHMOD LOG DIR
RUN mkdir /var/log/php-fpm && chmod 766 /var/log/php-fpm

# COPY POOL CONFIGURATION
COPY conf.d/service.conf /usr/local/etc/php-fpm.d

# CREATE PHP.INI FOR CLI AND TWEAK IT
RUN cp /usr/local/etc/php/php.ini /usr/local/etc/php/php-cli.ini && \
  sed -i "s|memory_limit.*|memory_limit = -1|" /usr/local/etc/php/php-cli.ini

# TWEAK MAIN PHP.INI CONFIG FILE
RUN sed -i "s|upload_max_filesize.*|upload_max_filesize = 32M|" /usr/local/etc/php/php.ini && \
    sed -i "s|max_execution_time.*|max_execution_time = 3000|" /usr/local/etc/php/php.ini && \
    sed -i "s|memory_limit.*|memory_limit = 2048M|" /usr/local/etc/php/php.ini

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD ["php-fpm"]
