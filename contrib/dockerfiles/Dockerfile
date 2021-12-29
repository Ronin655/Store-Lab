FROM php:7.4-fpm

# Copy composer.lock and composer.json
COPY composer.lock composer.json /src/

# Set working directory
WORKDIR /src

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    curl \
    git \
    libzip-dev


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-install pdo_mysql zip gd opcache && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-enable opcache

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ARG GITHUB_API_TOKEN
ENV PATH="$PATH:/src/vendor/bin"
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY composer.* ./
RUN composer install --no-scripts --no-autoloader --no-interaction --no-dev

# Copy existing application directory contents
COPY . /src

RUN chgrp -R www-data storage bootstrap/cache && chmod -R ug+rwx storage bootstrap/cache && \
    composer install --no-scripts --no-autoloader --no-interaction --dev && \
    composer dump-autoload --optimize

RUN chmod 777 -R /src/resources/js/

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
