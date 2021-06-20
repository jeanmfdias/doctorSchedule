FROM php:8.0-fpm

RUN apt update && apt upgrade -y

RUN apt install -y git vim curl zip libzip-dev wget

RUN docker-php-ext-install pdo pdo_mysql zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
    apt install -y nodejs

RUN npm install --global npm && \
    npm install --global yarn

RUN cp /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime

WORKDIR /var/www
