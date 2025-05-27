<?php namespace Gkari\UserManagement\Models;

use Model;

/**
 * UserRoleJoin Model
 */
class UserRoleJoin extends Model
{
    /**
     * @var string The table to associate with this model
     */
    protected $table = 't_user_roles';

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        't_user_id',
        'm_user_role_id',
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
    public $belongsTo = [
        'user' => ['Gkari\UserManagement\Models\User', 'key' => 't_user_id'],
        'role' => ['Gkari\UserManagement\Models\UserRole', 'key' => 'm_user_role_id']
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