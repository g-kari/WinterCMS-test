<?php namespace Gkari\UserManagement\Models;

use Model;

/**
 * UserRole Model
 */
class UserRole extends Model
{
    /**
     * @var string The table to associate with this model
     */
    protected $table = 'm_user_roles';

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'role_name',
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
    public $belongsToMany = [
        'users' => [
            'Gkari\UserManagement\Models\User',
            'table' => 't_user_roles',
            'key' => 'm_user_role_id',
            'otherKey' => 't_user_id'
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