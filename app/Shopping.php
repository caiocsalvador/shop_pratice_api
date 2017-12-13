<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    protected $fillable = [
        'user_id', 'total'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    //Many to Many relationship
    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
