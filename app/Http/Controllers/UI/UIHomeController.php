<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Category;
use App\OrderDetail;
use App\Http\Controllers\Standard;
use \Helper;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class UIHomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::orderBy('created_at', 'desc')->where('is_delete', 0)->paginate(5);
        $hot_products_id = OrderDetail::select(DB::raw('count(product_id) AS SL'), 'product_id', DB::raw('sum(quantity) as Tong'))
                ->groupBy('product_id')
                ->orderBy('SL', 'desc')
                ->orderBy('Tong', 'desc')
                ->limit(4)
                ->get();
        $cate_products = Product::whereIn('category_id', array(1, 2, 3))->get();
        return view('ui.index', compact('products', 'hot_products_id', 'cate_products'));
    }

    public function getProByCate($id) {
        $products = Product::where('category_id', $id)->paginate(7);
        return view('ui.lists', compact('products'));
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
        if (empty($keyword)) {
            $erroricon = '<i class="fa fa-times"></i>';
            return redirect()->route('home.index');
        } else {

            $products = Product::where('is_delete', 0)->whereRaw("MATCH(name, description) AGAINST(? IN BOOLEAN MODE)", $keyword)->paginate(3);
            return view('ui.search', ['products' => $products, 'keyword' => $keyword]);
        }
    }

    public function getProByPrice($data) {
//        $symbol = [
//            0 => '_',
//            2 => '-',
//            3 => '+'
//        ];
        $priceproducts;
        $approxprice;

        if (str_contains($data, '_')) {
            $price = (int) str_after($data, '_');
            $price *= 1000000;
            $priceproducts = Product::all();
//            $priceproducts = Product::where('price', '<', $price)->get();
            foreach ($priceproducts AS $key => $product) {
                if (($product->price * (1 - 0.01 * $product->promotion->value)) > $price) {
                    array_forget($priceproducts, $key);
                }
            }
            $approxprice = 'Có <b>' . count($priceproducts) . '</b> sản phẩm có mức giá dưới ' . Helper::vn_currencyunit($price);
        }

        if (str_contains($data, '-')) {
            $startprice = 1000000 * ((int) str_before($data, '-'));
            $endprice = 1000000 * ((int) str_after($data, '-'));
            $priceproducts = Product::all();
//            $priceproducts = Product::where('price', '>=', $startprice)->where('price', '<=', $endprice)->get();
            foreach ($priceproducts AS $key => $product) {
                $current_price = $product->price * (1 - 0.01 * $product->promotion->value);
                if ($current_price <= $startprice || $current_price >= $endprice) {
                    array_forget($priceproducts, $key);
                }
            }

            $approxprice = 'Có <b>' . count($priceproducts) . '</b> sản phẩm có mức giá ' . Helper::vn_currencyunit($startprice) . ' - ' . Helper::vn_currencyunit($endprice);
        }

        if (str_contains($data, '+')) {
            $price = (int) str_after($data, '+');
            $price *= 1000000;
//            $priceproducts = Product::where('price', '>', $price)->get();
            $priceproducts = Product::all();
            foreach ($priceproducts AS $key => $product) {
                $current_price = $product->price * (1 - 0.01 * $product->promotion->value);
                if ($current_price < $price) {
                    array_forget($priceproducts, $key);
                }
            }
            $approxprice = 'Có <b>' . count($priceproducts) . '</b> sản phẩm có mức giá trên ' . Helper::vn_currencyunit($price);
        }

        return view('ui.pricelists', compact('priceproducts', 'approxprice'));

//        $priceproducts = Product::where('price', '>','1000000')->get();
//        return view ('ui.pricelists', compact('priceproducts'));
    }

}
