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
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class UIHomeController extends Controller {

    public function index() {
        $products = Product::orderBy('created_at', 'desc')->where('is_delete', 0)->limit(8)->get();
        $hot_products_id = OrderDetail::select(DB::raw('count(product_id) AS SL'), 'product_id', DB::raw('sum(quantity) as Tong'))
                ->groupBy('product_id')
                ->orderBy('SL', 'desc')
                ->orderBy('Tong', 'desc')
                ->limit(4)
                ->get();
        $other_products = Product::select(DB::raw('a.*'))
                        ->from(DB::raw('products AS a JOIN (SELECT category_id, MIN(id) AS id FROM products WHERE is_delete = 0 GROUP BY category_id) AS b ON a.category_id = b.category_id AND a.id = b.id'))
                        ->orderByRaw('RAND()')->limit(8)->get();

//        $other_products = Product::all();

        return view('ui.index', compact('products', 'hot_products_id', 'other_products'));
    }

    public function getProByCate($id) {
        $products = Product::where('category_id', $id)->paginate(12);
        return view('ui.lists', compact('products'));
    }

//    public function paginate($items, $perPage, $page, $options = []) {
//        $page = $page ? : (Paginator::resolveCurrentPage() ? : 1);
//        $items = $items instanceof Collection ? $items : Collection::make($items);
//        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
//    }

    public function paginate($items, $perPage) {
        $pageStart = request('page', 1);
        $offSet = ($pageStart * $perPage) - $perPage;
        $itemsForCurrentPage = $items->slice($offSet, $perPage);

        return new LengthAwarePaginator(
                $itemsForCurrentPage, $items->count(), $perPage, Paginator::resolveCurrentPage(), ['path' => Paginator::resolveCurrentPath()]
        );
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
        if (empty($keyword)) {
            $erroricon = '<i class="fa fa-times"></i>';
            return redirect()->route('home.index');
        } else {

            $products = Product::where('is_delete', 0)->whereRaw("MATCH(name, description) AGAINST(? IN BOOLEAN MODE)", $keyword)->paginate(12);
            return view('ui.search', ['products' => $products, 'keyword' => $keyword]);
        }
    }

    public function getProByPrice($data) {
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
            $priceproducts = $this->paginate($priceproducts, 12);
            $approxprice = 'Có <b>' . $priceproducts->total() . '</b> sản phẩm có mức giá dưới ' . Helper::vn_currencyunit($price);
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
            $priceproducts = $this->paginate($priceproducts, 12);
            $approxprice = 'Có <b>' . $priceproducts->total() . '</b> sản phẩm có mức giá ' . Helper::vn_currencyunit($startprice) . ' - ' . Helper::vn_currencyunit($endprice);
        }

        if (str_contains($data, '+')) {
            $price = (int) str_after($data, '+');
            $price *= 1000000;
            $priceproducts = Product::all();
            foreach ($priceproducts AS $key => $product) {
                $current_price = $product->price * (1 - 0.01 * $product->promotion->value);
                if ($current_price < $price) {
                    array_forget($priceproducts, $key);
                }
            }
            
            $priceproducts = $this->paginate($priceproducts, 12);
            $approxprice = 'Có <b>' . $priceproducts->total() . '</b> sản phẩm có mức giá trên ' . Helper::vn_currencyunit($price);
        }

        return view('ui.pricelists', compact('priceproducts', 'approxprice'));
    }

}
