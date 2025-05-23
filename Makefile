.PHONY: build start stop restart install verify logs shell

# Build the Docker containers
build:
	docker-compose build

# Start the Docker containers
start:
	docker-compose up -d

# Stop the Docker containers
stop:
	docker-compose down

# Restart the Docker containers
restart:
	docker-compose restart

# Install WinterCMS
install:
	docker exec -it winter-app bash /var/www/setup-wintercms.sh

# Verify the WinterCMS installation
verify:
	docker exec -it winter-app bash /var/www/verify-installation.sh

# View container logs
logs:
	docker-compose logs -f

# Open a shell in the app container
shell:
	docker exec -it winter-app bash

# One-command setup: start the containers and install WinterCMS
setup: start install
	@echo "Setup complete. Visit http://localhost/install.php to complete the installation wizard."
	@echo "After installation, the admin panel will be available at http://localhost/backend"