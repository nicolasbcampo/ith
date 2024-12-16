# Imagen base de PHP con Alpine Linux
FROM php:8.1.9-fpm-alpine

# Actualización de paquetes y herramientas necesarias
RUN apk --no-cache upgrade && \
    apk --no-cache add bash git sudo openssh libxml2-dev oniguruma-dev autoconf gcc g++ make npm freetype-dev libjpeg-turbo-dev libpng-dev

# Instalación de extensiones de PHP
RUN pecl channel-update pecl.php.net && \
    pecl install pcov ssh2 swoole && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install mbstring xml gd zip sockets bcmath soap pdo_mysql pcntl && \
    docker-php-ext-enable mbstring xml gd zip pcov pcntl sockets bcmath pdo pdo_mysql soap swoole

# Instalación de Composer (gestor de dependencias de PHP)
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

# Copiar Composer y RoadRunner
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --from=spiralscout/roadrunner:2.4.2 /usr/bin/rr /usr/bin/rr

# Configuración del directorio de trabajo
WORKDIR /app

# Copiar archivos del proyecto
COPY . .

# Instalación de dependencias de PHP y Node.js
RUN composer install
RUN composer require laravel/octane spiral/roadrunner
RUN npm install --global yarn
RUN yarn
RUN yarn prod

# Generar clave de aplicación y configuración de Octane
RUN php artisan key:generate
RUN php artisan octane:install --server="swoole"

# Comando para iniciar el servidor Octane
CMD php artisan octane:start --server="swoole" --host="0.0.0.0"

# Exponer el puerto 8000
EXPOSE 8000
