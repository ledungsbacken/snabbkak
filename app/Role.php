<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Permission;

class Role extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'description',
    ];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * A role belongs to many users.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    /**
     * A role belongs to many permissions.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    /**
     * Checks if roll has specified permission
     *
     * @param string $permissionInput
     *
     * @return bool
     */
    public function hasPermission($permissionInput)
    {
        $hasPermission = false;
        $this->permissions->each(function ($permission) use (&$hasPermission, $permissionInput) {
            if ($permission->name == $permissionInput) {
                $hasPermission = true;
            }
        });
        return $hasPermission;
    }
}
