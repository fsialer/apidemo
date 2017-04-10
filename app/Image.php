<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'user_id', 'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */ 

     public function user(){
         return $this->belongsTo('App\user');
     }
}
