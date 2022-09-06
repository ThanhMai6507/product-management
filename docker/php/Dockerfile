FROM php:8.0.5-fpm-alpine

RUN apk update && \
  apk add --update --no-cache --virtual=.build-dependencies \
  autoconf \
  gcc \
  g++ \
  make \
  tzdata \
  git && \
  apk add libpng libpng-dev libjpeg-turbo-dev libwebp-dev zlib-dev libxpm-dev gd && \
  apk add --update --no-cache \
  icu-dev \
  libzip-dev \
  oniguruma-dev && \
  pecl install xdebug && \
  apk del .build-dependencies && \
  docker-php-ext-install intl pdo_mysql mbstring zip bcmath gd && \
  docker-php-ext-enable xdebug && \
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
