<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Comment;
use App\Cart;
use App\Order;
use App\OrderDetail;
use App\User;
use App\Http\Controllers\Standard;

class UIProductDetailController extends Controller {

    public function index($id) {
        $product = Product::findOrFail($id);
        $comments = Comment::where('product_id', $id)->orderBy('created_at', 'desc')->get();
        $related_products = Product::where('is_delete',0)->where('category_id',$product->category_id)
                ->orderBy('created_at', 'desc')->take(8)->get();
        return view('ui.details', compact('product', 'related_products', 'comments'));
    }

    public function addComment(Request $request) {     
           $input = $request->all();
           $user = Auth::user();
        
           if($user){
               $input['user_id'] = $user->id;
               $input['is_delete'] = 0;
               $comments = new Comment();
               Comment::create($input);
               
               Session::flash('succes', 'Comment was added');
               return redirect()->back();
               
    }

}
  function deleteComment($id) {
      $comment= Comment::findOrFail($id);
      
        if (Auth::user() && (Auth::user()->id == $comment->user_id)) {
            Comment::where('id', $id)->delete();
            return back();
        } else
            return 'you dont have permission';
    }
}
