<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Category;
use App\OrderDetail;
use App\Http\Controllers\Standard;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class UIHomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::orderBy('created_at', 'desc')->where('is_delete', 0)->paginate(5);
        $hot_products = Product::join('order_details', 'products.id', '=', 'order_details.product_id')->where('order_details.quantity', '>', 5)->get();
        $cate_products = Product::whereIn('category_id', array(1, 2, 3))->get();
        
        return view('ui.index', compact('products', 'hot_products', 'cate_products'));
    }

    public function getProByCate($id) {
        $products = Product::where('category_id', $id)->paginate(7);
        return view('ui.lists', compact('products'));
    }
    
    public function getProByPrice(Request $request){
        $symbol = [
            0 => '_',
            2 => '-',
            3 => '+'
        ];
        
        $priceproducts = Product::where('price', '>','1000000')->get();
        return view ('ui.pricelists', compact('priceproducts'));
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
            $products = Product::where('is_delete',0)->whereRaw("MATCH(name, description) AGAINST(? IN BOOLEAN MODE)", $keyword)->get();
            return view('ui.search', ['products' => $products, 'keyword' => $keyword]);
        }
    }

}
