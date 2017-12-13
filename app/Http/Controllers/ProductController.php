<?php 

namespace App\Http\Controllers;

use App\Product;
use JWTAuth;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function getProducts(request $request){        
        $products = Product::limit(5)->get();
        return response()->json(compact('products'), 200);
    }

}