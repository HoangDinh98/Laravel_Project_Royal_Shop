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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('ui.details', compact('product'));
    }

    public function getProByCate($id) {
        $products = Product::where('category_id', $id)->paginate(7);
        return view('ui.lists', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

//    ----- CART -----
    public function addCart(Request $request) {
        if ($request->ajax()) {
            $product = Product::findOrFail($request->id);
            return response()->json($product);
        }
    }

    public function search(Request $request) {
        $keyword = $request->keyword;
        if(empty($keyword)) {
        $erroricon = '<i class="fa fa-times"></i>';
        $this->validate($request, 
                [
                   'keyword' => 'required',
                ], [
            'keyword.required' => $erroricon . ' Bạn chưa nhập dữ liệu'
                ]);
                }

        else {
        $products = Product::whereRaw("MATCH(name, description) AGAINST(? IN BOOLEAN MODE)", $keyword)->get();
        return view('ui.search', ['products' => $products, 'keyword' => $keyword]);
        }
        
    }
}
