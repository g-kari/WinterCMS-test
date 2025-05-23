# WinterCMS Verification Steps

This document provides steps to verify that your WinterCMS installation is working correctly.

## Installation Verification

1. After running the installation script, visit `http://localhost/install.php`
2. You should see the WinterCMS installation wizard
3. Follow the setup steps to configure your admin account and database
4. Upon completion, you should be redirected to the backend

## Frontend Verification

1. Visit `http://localhost` in your browser
2. You should see the default WinterCMS welcome page
3. Try to navigate through the default pages if available

## Backend Verification

1. Visit `http://localhost/backend` in your browser
2. Log in with the administrator credentials you created during installation
3. Verify you can access the following features:
   - Dashboard
   - Pages (Create, edit, and delete pages)
   - Media (Upload and manage files)
   - Settings (Site configuration)

## Database Verification

1. Connect to the database:
   ```
   docker exec -it winter-mysql mysql -u winter -p winter
   ```
   When prompted, enter password: `secret`

2. Run the following commands to check tables:
   ```
   SHOW TABLES;
   ```
   
3. You should see tables created by WinterCMS, including users, systems, etc.

## Common Issues

### Installation Page Not Found

If the installation page is not accessible:

1. Check if the containers are running:
   ```
   docker-compose ps
   ```

2. Check Nginx logs:
   ```
   docker exec -it winter-nginx cat /var/log/nginx/error.log
   ```

### Database Connection Issues

If the installer cannot connect to the database:

1. Verify database credentials:
   ```
   docker exec -it winter-app cat /var/www/mywintercms/.env | grep DB_
   ```

2. Check that the MySQL service is running:
   ```
   docker-compose logs db
   ```

### Permission Issues

If you encounter permission errors:

```
docker exec -it winter-app bash -c "chown -R www-data:www-data /var/www/mywintercms && chmod -R 775 /var/www/mywintercms/storage /var/www/mywintercms/bootstrap/cache"
```