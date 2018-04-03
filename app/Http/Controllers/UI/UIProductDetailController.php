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
        return view('ui.details', compact('product'));
    }

    public function addComment() {
        
    }

}
