FROM php:8.0.0

RUN apt-get update -y && apt-get install -y zip unzip git cron libzip-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev supervisor
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.0.8
RUN docker-php-ext-install pdo pdo_mysql pcntl
RUN pecl install -o -f redis &&  rm -rf /tmp/pear &&  docker-php-ext-enable redis
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www
COPY . /var/www

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip
RUN composer install

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
COPY --chown=www:www . /var/www

COPY ./deployment/supervisor/ /etc/supervisor
RUN chown -R www:www /var/log/supervisor

CMD supervisord -c /etc/supervisor/supervisord.conf
EXPOSE 9000
USER www
