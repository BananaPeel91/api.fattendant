<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\OperatorUsers;
use App\AttendantAircrafts;
use App\Job;
use App\UsersPermissions;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function operatorUsers(){

        return $this->hasMany(OperatorUsers::class);
    }

    public function aircrafts(){

        return $this->belongsToMany(Aircrafts::class, 'attendant_aircrafts', 'user_id', 'aircraft_id');
    }

    public function jobs(){

        return $this->belongsToMany(Job::class, 'job_applicants', 'job_id', 'user_id');
    }

    public function permissions(){
        return $this->hasMany(UsersPermissions::class, 'user_type', 'user_type');
    }

    public static function getAttendants(){

        return static::where('user_type', 1);
    }

    public static function filterUserById($id){

        $user = static::where('id', $id)->first();

        return $user;
    
    }
}
