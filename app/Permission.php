<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Role;

class Permission extends Model
{

    /**
     * A permission belongs to many roles .
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
