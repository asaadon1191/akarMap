<?php

namespace App\Models;

use App\Models\Admin;
// use Spatie\Permission\Guard;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Exceptions\GuardDoesNotMatch;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Contracts\Role as RoleContract;
use Spatie\Permission\Traits\RefreshesPermissionCache;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model 
{

    protected $table = "roles";
    protected $fillable = 
    [
        'name','permmsions'
    ];



    // RELATIONS

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }


    // GET PERMISSIONS
    public function getPermissionsAttribute($permissions)
    {
        return \json_decode($permissions,true);
    }


    
}
