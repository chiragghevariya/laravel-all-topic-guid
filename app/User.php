<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public static function  RoleMap($number)
//    {
//        switch($number)
//        {
//            case 1:
//                return 'admin';
//                break;
//            case 2:
//                return 'simpleuser';
//                break;
//          
//            default:
//                return none;
//
//        }
//
//    }
}
