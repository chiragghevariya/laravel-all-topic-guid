<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =[
        'id',
        'name',
        'email',
        'hobbies',
        'phone',
        'role_id',
        'photo',
        'body'
    ];
    
    public function role(){
        $this->belongsTo('App\Role');
    }

    protected $upload ='/images/';


    public function getPhotoAttribute($photo){

        return $this->upload . $photo;
    }

}
