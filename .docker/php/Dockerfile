FROM php:5.6-fpm

MAINTAINER Mathew Peterson <mathewpeterson@me.com>

RUN usermod -u 1000 www-data

COPY bin/* /usr/local/bin/
RUN chmod +x -R /usr/local/bin/

COPY conf/php.ini /usr/local/etc/php/conf.d/
COPY conf/pool.conf /usr/local/etc/php/

WORKDIR /app

RUN apt-install \
    apt-utils \
    less \
    libssl-dev \
    git \
    zip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng12-dev \
    libxml2-dev \
    libmcrypt-dev \
    nodejs \
    npm \
    php5-ssh2 \
    libssh2-1 \
    libssh2-1-dev

RUN ln -s /usr/bin/nodejs /usr/bin/node
RUN echo '{ "allow_root": true }' > /root/.bowerrc

RUN mkdir -p /tmp \
    && docker-php-ext-configure gd \
    --with-freetype-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install \
    gd \
    pdo \
    pdo_mysql \
    soap \
    mcrypt \
    pcntl \
    && docker-php-pecl-install zip memcached xdebug

RUN curl -sS https://getcomposer.org/installer | php -- \
      --install-dir=/usr/local/bin \
      --filename=composer && \
      echo "phar.readonly = off" > /usr/local/etc/php/conf.d/phar.ini

RUN version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") \
    && curl -A "Docker" -o ./blackfire-probe.tar.gz -D - -L -s https://blackfire.io/api/v1/releases/probe/php/linux/amd64/$version \
    && mkdir ./blackfire \
    && tar zxpf ./blackfire-probe.tar.gz -C ./blackfire \
    && mv ./blackfire/blackfire-*.so $(php -r "echo ini_get('extension_dir');")/blackfire.so \
    && printf "extension=blackfire.so\nblackfire.agent_socket=tcp://blackfire:8707\n" > $PHP_INI_DIR/conf.d/blackfire.ini \
    && rm -r ./blackfire

RUN pecl install ssh2 channel://pecl.php.net/ssh2-0.13 \
    && cp /etc/php5/mods-available/ssh2.ini /usr/local/etc/php/conf.d/ssh2.ini

RUN curl -L -o ./phpunit.phar https://phar.phpunit.de/phpunit.phar \
    && chmod +x phpunit.phar \
    && mv phpunit.phar /usr/local/bin/phpunit

RUN npm install -g bower

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
