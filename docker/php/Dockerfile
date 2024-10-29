FROM php:8.2-fpm

# Node.jsとComposerのインストール
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    && curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# Laravel用の必要な設定
RUN docker-php-ext-install pdo pdo_mysql