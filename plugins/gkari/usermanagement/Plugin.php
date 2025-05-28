<?php namespace Gkari\UserManagement;

use Backend;
use System\Classes\PluginBase;

/**
 * UserManagement Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'User Management',
            'description' => 'Provides user management models and CRUD operations',
            'author'      => 'Gkari',
            'icon'        => 'icon-users'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'gkari.usermanagement.access_users' => [
                'tab' => 'User Management',
                'label' => 'Manage Users'
            ],
            'gkari.usermanagement.access_roles' => [
                'tab' => 'User Management',
                'label' => 'Manage Roles'
            ],
            'gkari.usermanagement.access_logs' => [
                'tab' => 'User Management',
                'label' => 'View User Logs'
            ],
            'gkari.usermanagement.access_settings' => [
                'tab' => 'User Management',
                'label' => 'Manage User Settings'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'usermanagement' => [
                'label'       => 'User Management',
                'url'         => Backend::url('gkari/usermanagement/users'),
                'icon'        => 'icon-users',
                'permissions' => ['gkari.usermanagement.*'],
                'order'       => 500,
                'sideMenu' => [
                    'users' => [
                        'label'       => 'Users',
                        'icon'        => 'icon-user',
                        'url'         => Backend::url('gkari/usermanagement/users'),
                        'permissions' => ['gkari.usermanagement.access_users'],
                    ],
                    'roles' => [
                        'label'       => 'Roles',
                        'icon'        => 'icon-tag',
                        'url'         => Backend::url('gkari/usermanagement/userroles'),
                        'permissions' => ['gkari.usermanagement.access_roles'],
                    ],
                    'logs' => [
                        'label'       => 'User Logs',
                        'icon'        => 'icon-file-text-o',
                        'url'         => Backend::url('gkari/usermanagement/userlogs'),
                        'permissions' => ['gkari.usermanagement.access_logs'],
                    ],
                    'settings' => [
                        'label'       => 'User Settings',
                        'icon'        => 'icon-cog',
                        'url'         => Backend::url('gkari/usermanagement/usersettings'),
                        'permissions' => ['gkari.usermanagement.access_settings'],
                    ],
                ],
            ],
        ];
    }
}