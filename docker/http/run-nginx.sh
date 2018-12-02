#!/bin/bash
for f in $(find /etc/nginx/templates -regex '.*\.conf'); do
#pass only needed variables in .conf
envsubst \
'${HTTP_DOMAIN_PURE} ${HTTP_DOMAIN_SYMFONY}' \
< $f >  \
"/etc/nginx/conf.d/$(basename $f)";
done

nginx -g 'daemon off;'
