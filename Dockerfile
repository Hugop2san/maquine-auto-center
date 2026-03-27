# ---------- Stage 1: Node (build do Vite) ----------
FROM node:20 AS node_builder

WORKDIR /app

# Copia apenas arquivos necessários para instalar dependências
COPY package*.json ./
RUN npm install

# Copia restante do projeto
COPY . .

# Gera build do Vite (cria public/build + manifest.json)
RUN npm run build


# ---------- Stage 2: PHP ----------
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

# Definir diretório
WORKDIR /var/www

# Copiar arquivos do projeto
COPY . .

# Copiar build do Vite gerado no stage Node
COPY --from=node_builder /app/public/build /var/www/public/build

# Instalar dependências do Laravel (modo produção recomendado)
RUN composer install --no-dev --optimize-autoloader

# Permissões (melhor prática)
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

CMD ["php-fpm"]