FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

COPY . .

RUN composer install
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan migrate --force
RUN php artisan storage:link
RUN sed -i 's|root /var/www/html|root /var/www/html/public|g' /etc/nginx/sites-available/default.conf
RUN sed -i 's|try_files $uri $uri/ =404;|try_files $uri $uri/ /index.php?$query_string;|g' /etc/nginx/sites-available/default.conf
