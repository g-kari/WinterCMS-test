# User Management Plugin for WinterCMS

This plugin provides a set of models and CRUD operations for user management in WinterCMS.

## Features

- User management with roles, logs, and settings
- Complete CRUD operations for all models
- Soft delete support for all records
- Relations between users, roles, logs, and settings

## Installation

1. Clone this repository to your plugins directory:
```bash
cd plugins
mkdir -p gkari
git clone https://github.com/g-kari/usermanagement gkari/usermanagement
```

2. Update your WinterCMS installation:
```bash
php artisan winter:up
```

## Usage

After installation, you'll find a new "User Management" menu in the backend with the following sections:

- **Users**: Manage users with their unique public IDs and names
- **Roles**: Define user roles for access control
- **User Logs**: Track user activities and events
- **User Settings**: Configure settings for individual users

## Database Structure

The plugin creates the following tables:

- **t_users**: Main user table
- **l_user_logs**: Log entries related to users
- **m_user_roles**: Available user roles
- **t_user_roles**: Relationship between users and roles
- **t_user_settings**: Custom settings for users

## Permissions

The plugin provides the following permissions:

- **gkari.usermanagement.access_users**: Access to user management
- **gkari.usermanagement.access_roles**: Access to role management
- **gkari.usermanagement.access_logs**: Access to user logs
- **gkari.usermanagement.access_settings**: Access to user settings

## License

MIT