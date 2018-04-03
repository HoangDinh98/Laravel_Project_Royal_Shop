<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Category;
use App\Http\Controllers\Standard;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class UIHomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::all();
        return view('ui.index', compact('products'));
    }

    public function getProByCate($id) {
        $products = Product::where('category_id', $id)->paginate(7);
        return view('ui.lists', compact('products'));
    }
    
    public function search(Request $request) {
        $keyword = $request->keyword;
        if (empty($keyword)) {
            $erroricon = '<i class="fa fa-times"></i>';
//            $validator = $this->validate($request, [
//                'keyword' => 'required',
//                    ], [
//                'keyword.required' => $erroricon . ' Bạn chưa nhập dữ liệu'
//            ]);
            return redirect()->route('ui.home.index');
            
        } else {
            $products = Product::whereRaw("MATCH(name, description) AGAINST(? IN BOOLEAN MODE)", $keyword)->get();
            return view('ui.search', ['products' => $products, 'keyword' => $keyword]);
        }
    }

}
