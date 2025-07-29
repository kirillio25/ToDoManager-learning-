FROM php:8.3-apache

# Устанавливаем системные пакеты
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    curl \
    git \
    gnupg

# PHP расширения
RUN docker-php-ext-install pdo pdo_mysql mysqli zip

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Включаем модуль Apache rewrite
RUN a2enmod rewrite

# Копируем конфиг Apache
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Копируем проект
COPY . /var/www/html

# Права
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
