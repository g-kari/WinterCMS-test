#!/bin/bash

# Script to install WinterCMS in a Docker container

echo "Starting WinterCMS installation..."

# Navigate to working directory
cd /var/www

# Create WinterCMS project using Composer
echo "Creating WinterCMS project via Composer..."
composer create-project wintercms/winter mywintercms

# Set proper permissions
echo "Setting proper permissions..."
chown -R www-data:www-data mywintercms
chmod -R 775 mywintercms/storage mywintercms/bootstrap/cache

# Create .env file with database settings
echo "Configuring .env file..."
cat > mywintercms/.env << EOF
APP_DEBUG=true
APP_URL=http://localhost
APP_KEY=

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=winter
DB_USERNAME=winter
DB_PASSWORD=secret

REDIS_HOST=valkey
REDIS_PASSWORD=null
REDIS_PORT=6379
EOF

# Generate application key
echo "Generating application key..."
cd mywintercms
php artisan key:generate

echo "WinterCMS installation complete."
echo "Visit http://localhost/install.php to complete setup."