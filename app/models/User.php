<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = 'users';
    protected $fillable=['name','email','password',];
    protected $hidden=['remember_token'];

    public function profiles(){
       return  $this->hasOne('App\models\Profile');
    }

    public function posts()
    {
        return $this->hasMany('App\models\Post');
    }

}
