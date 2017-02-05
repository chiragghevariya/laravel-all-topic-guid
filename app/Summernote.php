<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Summernote extends Model
{
    protected $table ='summernotes';
    
    protected $fillable =[
        'mixdata'
    ];
}
