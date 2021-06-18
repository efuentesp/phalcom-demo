#ProjectPhalconPHP/php/Dockerfile
#Paso 1
FROM php:7.2.8-apache  
MAINTAINER Código Electrónica - codigoelectronica@gmail.com
#Paso 2
RUN docker-php-ext-install pdo pdo_mysql
#Paso 3
ENV PHALCON_VERSION=3.1.1
#Paso 4
WORKDIR /var/tmp
#Paso 5
RUN curl -sS https://getcomposer.org/installer | php && \
  mv composer.phar /usr/local/bin/composer
#Paso 6
RUN apt-get -y update && apt-get -y install unzip
#Paso 7
RUN set -xe && \
        curl -LO https://github.com/phalcon/cphalcon/archive/v${PHALCON_VERSION}.tar.gz && \
        tar xzf v${PHALCON_VERSION}.tar.gz && cd cphalcon-${PHALCON_VERSION}/build && ./install && \
        echo "extension=phalcon.so" > /usr/local/etc/php/conf.d/phalcon.ini && \
        cd ../.. && rm -rf v${PHALCON_VERSION}.tar.gz cphalcon-${PHALCON_VERSION} && \
        # Insall Phalcon Devtools, see https://github.com/phalcon/phalcon-devtools/
        curl -LO https://github.com/phalcon/phalcon-devtools/archive/v${PHALCON_VERSION}.tar.gz && \
        tar xzf v${PHALCON_VERSION}.tar.gz && \
        mv phalcon-devtools-${PHALCON_VERSION} /usr/local/phalcon-devtools && \
        ln -s /usr/local/phalcon-devtools/phalcon.php /usr/local/bin/phalcon
#Paso 8
COPY php.ini /usr/local/etc/php/conf.d
#Paso 9
RUN a2enmod headers rewrite
#Paso 10
WORKDIR /var/www/html