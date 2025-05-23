# WinterCMS Setup Instructions

This document provides step-by-step instructions for setting up WinterCMS after Docker containers are running.

## Automated Installation

1. Start the Docker containers:
   ```
   docker-compose up -d
   ```

2. Execute the installation script in the PHP container:
   ```
   docker exec -it winter-app bash -c "bash /var/www/install-winter.sh"
   ```

3. Access the WinterCMS installation wizard in your browser:
   ```
   http://localhost/install.php
   ```

4. Follow the installation wizard instructions. When prompted for database details:
   - Database: `winter`
   - Username: `winter`
   - Password: `secret`
   - Host: `db`

5. Once installation is complete, you can access:
   - Frontend: `http://localhost`
   - Backend: `http://localhost/backend`

## Manual Installation

If you prefer to install WinterCMS manually:

1. Access the PHP container:
   ```
   docker exec -it winter-app bash
   ```

2. Navigate to your working directory:
   ```
   cd /var/www
   ```

3. Create a new WinterCMS project using Composer:
   ```
   composer create-project wintercms/winter mywintercms
   ```

4. Configure the .env file at `/var/www/mywintercms/.env` with these database settings:
   ```
   DB_CONNECTION=mysql
   DB_HOST=db
   DB_PORT=3306
   DB_DATABASE=winter
   DB_USERNAME=winter
   DB_PASSWORD=secret
   ```

5. Set proper permissions:
   ```
   chown -R www-data:www-data mywintercms
   chmod -R 775 mywintercms/storage mywintercms/bootstrap/cache
   ```

6. Access the installation wizard in your browser and continue from step 3 in the Automated Installation section.

## Troubleshooting

If you encounter issues:

1. Check logs:
   ```
   docker-compose logs
   ```

2. Verify the database connection:
   ```
   docker exec -it winter-mysql mysql -u winter -p winter
   ```
   When prompted, enter the password: `secret`

3. Restart containers:
   ```
   docker-compose restart
   ```