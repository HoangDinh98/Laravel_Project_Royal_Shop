<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;
use App\Order;
use App\OrderDetail;
use App\Http\Controllers\Standard;

class UIProductDetailController extends Controller {

    public function index($id) {
        $product = Product::findOrFail($id);
        $related_products = Product::where('category_id', $product->category_id)->orderBy('created_at', 'desc')->take(8)->get();
        return view('ui.details', compact('product', 'related_products'));
    }

    public function addComment() {
        
    }

}
