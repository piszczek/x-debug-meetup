FROM nginx:1.15.0

# COPY VHOST DEFINTIONS
COPY conf.d/* /etc/nginx/templates/

# pass env variables to .conf files
COPY run-nginx.sh /bin/run-nginx.sh
