FROM php:8.2-cli

LABEL maintainer="Dominic Xaviera - 2472011"

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html

RUN touch /var/www/html/database/database.sqlite \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod 666 /var/www/html/database/database.sqlite

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 8000

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
