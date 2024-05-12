# Utiliser l'image PHP avec FPM
FROM php:7.4-fpm

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl

# Effacer le cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www

# Copier le fichier composer.json
COPY composer.json .

# Installer les dépendances PHP via Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Copier le reste de l'application
COPY . .

# Donner les droits d'accès au répertoire /var/www
RUN chown -R www-data:www-data /var/www

# Exposer le port 9000
EXPOSE 9000

# Commande pour démarrer le serveur PHP-FPM
CMD ["php-fpm"]




#docker build -t blog-app .
#docker run -p 9000:9000 blog-app
