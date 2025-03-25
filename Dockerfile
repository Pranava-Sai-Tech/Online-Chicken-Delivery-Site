# Use an official PHP image with Apache
FROM php:8.2-apache

# Copy your project files to the container
COPY . /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]