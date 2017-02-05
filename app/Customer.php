<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    

    protected $fillable= [

      'first_name',
       'last_name',
        'sex',
        'email',
        'phone'

    ];

//    public $timestamps=true;
}
