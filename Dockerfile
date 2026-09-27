FROM php:8.3-cli-alpine

# Dépendances système et extensions PHP nécessaires
RUN apk add --no-cache \
    sqlite-dev \
    sqlite \
    nodejs \
    npm \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    oniguruma-dev

RUN docker-php-ext-install pdo pdo_sqlite mbstring xml

# Installation de Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copie des fichiers sources
COPY . .

# Installation des dépendances et compilation des assets
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN npm install && npm run build

# Préparation de l'environnement et de SQLite
RUN cp .env.example .env && \
    php artisan key:generate && \
    touch database/database.sqlite && \
    php artisan migrate --force

# Port d'écoute pour Render
EXPOSE 8000
ENV PORT=8000

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}

