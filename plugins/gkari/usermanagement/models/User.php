<?php namespace Gkari\UserManagement\Models;

use Model;

/**
 * User Model
 */
class User extends Model
{
    /**
     * @var string The table to associate with this model
     */
    protected $table = 't_users';

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'public_user_id',
        'user_name',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * @var array Date fields
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'logs' => ['Gkari\UserManagement\Models\UserLog', 'key' => 't_user_id'],
        'settings' => ['Gkari\UserManagement\Models\UserSetting', 'key' => 't_user_id']
    ];

    public $belongsToMany = [
        'roles' => [
            'Gkari\UserManagement\Models\UserRole',
            'table' => 't_user_roles',
            'key' => 't_user_id',
            'otherKey' => 'm_user_role_id'
        ]
    ];

    /**
     * Implement soft delete
     */
    use \Winter\Storm\Database\Traits\SoftDelete;
    
    /**
     * The attributes that should be mutated to dates.
     * @var array
     */
    protected $dates = ['deleted_at'];
}