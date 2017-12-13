<?php

namespace App\Http\Controllers;

use App\Product;
use App\Shopping;
use JWTAuth;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function store(request $request){


        /*$input = $request->all();
        return response()->json(['products' => $input['products']], 200);*/
        $user = JWTAuth::parseToken()->toUser();
        $total = $request->input('total');
        $shopping = Shopping::create(['user_id' => $user->id, 'total' => $total]);
        $input = $request->all();
        if(array_key_exists('products', $input)){
            foreach($input['products'] as $product){
                $shopping->products()->attach($product['id']);
            }
        }
        return response()->json(['message' => 'Success'], 200);
    }
}
