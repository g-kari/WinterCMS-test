#!/bin/bash

# Script to verify WinterCMS installation

echo "Verifying WinterCMS installation..."

# Check if the directory exists
if [ -d "/var/www/mywintercms" ]; then
    echo "✓ WinterCMS directory exists"
else
    echo "✗ WinterCMS directory does not exist"
    exit 1
fi

# Check if the .env file exists
if [ -f "/var/www/mywintercms/.env" ]; then
    echo "✓ .env file exists"
else
    echo "✗ .env file does not exist"
    exit 1
fi

# Check if the database connection is configured correctly
db_host=$(grep DB_HOST /var/www/mywintercms/.env | cut -d '=' -f2)
if [ "$db_host" = "db" ]; then
    echo "✓ Database host is configured correctly"
else
    echo "✗ Database host is not configured correctly"
fi

echo "WinterCMS installation verification completed."
echo "Please access http://localhost/install.php to complete the installation wizard if you haven't already."
echo "After installation, the admin panel will be available at http://localhost/backend"