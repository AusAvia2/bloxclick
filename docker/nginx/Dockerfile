FROM registry.gitlab.com/dyosbo/bloxworld:latest

COPY ./public /var/www/html/public
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/brickhill.conf /etc/nginx/conf.d/brickhill.conf