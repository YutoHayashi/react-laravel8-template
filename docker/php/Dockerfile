FROM php:7.4-fpm

WORKDIR /var/www/html/app

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini && \
    apt-get update && \
    apt-get install -y --no-install-recommends \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    libmagickwand-dev \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    zlib1g-dev
RUN docker-php-ext-install bcmath calendar exif gettext intl mysqli pdo pdo_mysql zip && \
    docker-php-ext-install -j$(nproc) iconv && \
    docker-php-ext-install -j$(nproc) gd
RUN rm -rf /var/lib/apt/lists/*
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

COPY php.ini $PHP_INI_DIR/php.ini
