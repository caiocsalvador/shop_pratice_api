<?php

namespace App\Http\Controllers;

use App\Product;
use App\Shopping;
use JWTAuth;
use Illuminate\Http\Request;
use App\Mail\ShoppingMail;
use Mail;

class ShoppingController extends Controller
{
    public function store(request $request){
        //Get user based on token
        $user = JWTAuth::parseToken()->toUser();
        //Get the shopping total
        $total = $request->input('total');
        //Create a Shopping model
        $shopping = Shopping::create(['user_id' => $user->id, 'total' => $total]);
        $input = $request->all();
        //Looking for products
        if(array_key_exists('products', $input)){
            foreach($input['products'] as $product){
                //Adds products for the table product_shopping(Many to many)
                $shopping->products()->attach($product['id']);
            }
        }
        //Try to send the email
        if(! $this->sendMail($user->email, $input['products'])){
           return response()->json(['message' => 'Success'], 500); 
        }
        
        return response()->json(['message' => 'Success'], 200);
    }

    //Send a email
    public function sendMail($email, $products) {       

    	$content = [
    		'title'=> 'Awesome Shopping - Thank you for your pucharse', 
    		'products'=>  $products
    		];

        //Uses the App\Mail\ShoppingMail.php Mailable to send the email
    	Mail::to($email)->send(new ShoppingMail($content));

    	return true;
    }
}
