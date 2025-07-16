FROM php:8.2-fpm

# setting user
ARG user=laravel
ARG uid=1000

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    netcat-openbsd \
    iputils-ping \ 
    zip \
    unzip \
    default-mysql-client

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# wait for 
# RUN chmod +x /var/www/docker-entrypoint.sh
# RUN chmod +x /var/www/wait-for

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# working directory
WORKDIR /var/www

USER $user