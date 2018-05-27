<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\models\User');
    }



    protected $fillable = ['user_id','avatar','youtube','facebook','about'];

    protected  $path='uploads/avatars';

    public function getFeaturedAttribute($path)
    {
        return asset($path);
    }


}
