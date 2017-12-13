<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function shoppings(){
        return $this->belongsToMany('App\Shopping', 'product_shopping', 'product_id', 'shopping_id');
    }
}
