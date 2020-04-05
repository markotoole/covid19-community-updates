FROM php:7.3-fpm

RUN apt-get update && apt-get install -y libzip-dev libmemcached-dev zlib1g-dev libpng-dev libxml2-dev libpq-dev
RUN apt-get install -y libmagickwand-dev imagemagick && \
    pecl install imagick && \
    docker-php-ext-enable imagick
RUN apt-get -y install python3-pip
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd
RUN docker-php-ext-install dom
RUN docker-php-ext-install xml
RUN docker-php-ext-install simplexml
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo pdo_pgsql pgsql
RUN docker-php-ext-install pcntl

RUN pecl install xdebug-beta && \
    docker-php-ext-enable xdebug
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN pip3 install pandas && \
    pip3 install xlrd

ARG PUID
ENV PUID ${PUID}
ARG PGID
ENV PGID ${PGID}

RUN groupmod -g ${PGID} www-data && \
    usermod -u ${PUID} www-data

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_max_filesize = 100M;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 100M;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_execution_time = 6000;" >> /usr/local/etc/php/conf.d/uploads.ini
