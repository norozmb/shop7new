FROM php:8.2-apache

# Copy application files
COPY . /var/www/html/

# Ensure permissions
RUN chown -R www-data:www-data /var/www/html

# Enable rewrite module (commonly used by PHP apps)
RUN a2enmod rewrite || true

EXPOSE 80

CMD ["apache2-foreground"]
