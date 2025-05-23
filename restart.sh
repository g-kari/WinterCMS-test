#!/bin/bash

# Script to restart Docker containers and setup WinterCMS environment

echo "Stopping running containers..."
docker-compose down

echo "Starting containers..."
docker-compose up -d

echo "Waiting for containers to be fully initialized..."
sleep 5

echo "Installing WinterCMS..."
docker exec -it winter-app bash -c "bash /var/www/install-winter.sh"

echo "Setup complete!"
echo "Access WinterCMS installation wizard at: http://localhost/install.php"