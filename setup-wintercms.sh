#!/bin/bash

# Script to set up WinterCMS in the Docker environment

echo "Starting WinterCMS setup..."

# Make sure we're in the correct directory
cd /var/www

# Install WinterCMS via Composer
echo "Installing WinterCMS via Composer..."
composer create-project wintercms/winter mywintercms

# Set the proper permissions
echo "Setting proper permissions..."
chmod -R 775 mywintercms/storage
chmod -R 775 mywintercms/bootstrap/cache

# Set up environment variables for the database connection
echo "Configuring environment variables..."
cd mywintercms
cp .env.example .env
sed -i 's/DB_CONNECTION=mysql/DB_CONNECTION=mysql/' .env
sed -i 's/DB_HOST=127.0.0.1/DB_HOST=db/' .env
sed -i 's/DB_PORT=3306/DB_PORT=3306/' .env
sed -i 's/DB_DATABASE=database/DB_DATABASE=winter/' .env
sed -i 's/DB_USERNAME=root/DB_USERNAME=winter/' .env
sed -i 's/DB_PASSWORD=/DB_PASSWORD=secret/' .env

# Set Redis configuration
sed -i 's/REDIS_HOST=127.0.0.1/REDIS_HOST=valkey/' .env

echo "WinterCMS has been successfully installed."
echo "Please access http://localhost/install.php to complete the installation wizard."
echo "After installation, the admin panel will be available at http://localhost/backend"