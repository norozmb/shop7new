FROM php:8.2-apache

# Copy application files
COPY . /var/www/html/

# Ensure permissions
RUN chown -R www-data:www-data /var/www/html

# Enable .htaccess and rewrite module for PHP routing
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
RUN a2enmod rewrite || true

EXPOSE 80

CMD ["apache2-foreground"]
