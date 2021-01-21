<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use  Notifiable;
    

    protected $table = "admins";
    // public $timestamps = false;
    // protected $guard_name = 'admin';
    protected $fillable = 
    [
        'name', 'email', 'password','role_id','status','phone'
    ];
    // public $timeStamps = false;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = 
    [
        'email_verified_at' => 'datetime',
        'role_id' => 'array'
    ];


    public function Status()
    {
       return $this->status == 1 ? 'Active' : 'Not Active';
    }



    
    // RELATIONS 

    // MANY TO MANY WITH COMPANY
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    // MANY TO MANY WITH COMPANY
    public function rolees()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    // GET PERMISSIONS
    public function getRoleAttribute($role_id)
    {
        return \json_decode($role_id,true);
    }



    public function hasAbility($permissions)    //products  //mahoud -> admin can't see brands
    {
        $role = $this->role;

        if (!$role) {
            return false;
        }

        foreach ($role->permissions as $permission) {
            if (is_array($permissions) && in_array($permission, $permissions)) {
                return true;
            } else if (is_string($permissions) && strcmp($permissions, $permission) == 0) {
                return true;
            }
        }
        return false;
    }

   

}
