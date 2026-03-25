FROM php:8.3-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev

# Instalar extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_pgsql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www

# Copiar arquivos
COPY . .

# Instalar dependências do Laravel
RUN composer install

# Permissões (importante)
RUN chmod -R 777 storage bootstrap/cache

CMD ["php-fpm"]