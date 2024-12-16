FROM php:8.2-apache

# Instalar dependencias del sistema
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip \
    curl \
    unzip \
    libonig-dev

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Instalar extensiones PHP
RUN docker-php-ext-install pdo_mysql zip bcmath

# Configurar el directorio raíz de Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copiar el código de la aplicación
COPY . /var/www/html

# Configurar directorio de trabajo
WORKDIR /var/www/html

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar dependencias del proyecto
RUN composer install --no-scripts --no-interaction --optimize-autoloader

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
