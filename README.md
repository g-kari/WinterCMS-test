# WinterCMS-test

## Docker Development Environment

This repository includes a complete Docker-based development environment with PHP-FPM, Nginx, MySQL, and Valkey (Redis fork) for evaluating WinterCMS.

### Prerequisites

- Docker and Docker Compose installed on your system
- Git

### Getting Started

1. Clone this repository:
   ```
   git clone https://github.com/g-kari/WinterCMS-test.git
   cd WinterCMS-test
   ```

2. Start the Docker containers:
   ```
   docker-compose up -d
   ```

3. Install WinterCMS:
   ```
   docker exec -it winter-app bash /var/www/setup-wintercms.sh
   ```

4. Complete the installation through the web interface:
   ```
   http://localhost/install.php
   ```

5. Access the WinterCMS admin panel:
   ```
   http://localhost/backend
   ```

### Environment Details

- **PHP-FPM**: PHP 8.2 with common extensions required for Laravel/WinterCMS
- **Nginx**: Latest stable version configured to serve PHP applications
- **MySQL**: Version 8.0 with persistent storage
- **Valkey**: Redis-compatible in-memory data store

### Database Connection

- Host: `localhost` (from host) or `db` (from containers)
- Port: `3306`
- Username: `winter`
- Password: `secret`
- Database: `winter`

### Valkey Connection

- Host: `localhost` (from host) or `valkey` (from containers)
- Port: `6379`

### Troubleshooting

If you encounter any issues:

1. Check container logs:
   ```
   docker-compose logs
   ```

2. Verify all containers are running:
   ```
   docker-compose ps
   ```

3. Restart all containers:
   ```
   docker-compose restart
   ```