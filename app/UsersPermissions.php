<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersPermissions extends Model
{
    

    public static function filterUsersPermissionsByUserType($userType){

        $permissions = static::where('user_type', $userType)->get();

        return $permissions;
    
    }
}

