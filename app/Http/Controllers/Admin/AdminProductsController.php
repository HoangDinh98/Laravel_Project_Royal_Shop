<?php

namespace App\Http\Controllers\Admin;

use App\Provider;
use App\Product;
use App\Photo;
use App\Promotion;
use App\Category;
use App\User;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
date_default_timezone_set("Asia/Ho_Chi_Minh");


class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::orderBy('created_at', 'desc')->where('is_delete',0)->paginate(10);
        $providers = Provider::all();
        $categories = Category::all();
        $promotions = Promotion::all();
        return view('admin.products.index', compact('products', 'providers','categories','promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::pluck('name', 'id')->all();
         $providers = Provider::pluck('name', 'id')->all();
          $promotions = Promotion::pluck('value', 'id')->all();
        return view('admin.products.create', compact('categories','providers','promotions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this ->validate($request, [
            'name' => 'required|min:3|max:30',
            'weight' => 'required|min:1|max:3',
            'price' => 'required|min:6|max:12',
            'quantity' => 'required|min:1|max:3',
            'description' => 'required|min:30|max:1000',
            ],[
                'name.required' => 'Vui lòng điền tên của sản phẩm',
                'name.min' => 'Vui lòng nhập ít nhất 3 ký tự',
                'name.max' => 'Vui lòng không nhập quá 30 ký tự',
                'weight.required' => 'Vui lòng điền khối lượng của sản phẩm',
                'weight.min' => 'Vui lòng nhập ít nhất 1 ký tự',
                'weight.max' => 'Vui lòng không nhập quá 3 ký tự',
                'price.required' => 'Vui lòng điền giá của sản phẩm',
                'price.min' => 'Vui lòng nhập ít nhất 6 ký tự',
                'price.max' => 'Vui lòng không nhập quá 12 ký tự',
                'quantity.required' => 'Vui lòng điền số lượng của sản phẩm',
                'quantity.min' => 'Vui lòng nhập ít nhất 1 ký tự',
                'quantity.max' => 'Vui lòng không nhập quá 3 ký tự',
                'description.required' => 'Vui lòng điền mô tả của sản phẩm',
                'description.min' => 'Vui lòng nhập ít nhất 30 ký tự',
                'description.max' => 'Vui lòng không nhập quá 1000 ký tự',
        ]);
        $input = $request->all();
        $product = new Product();
        
        $product->create($input);
        $product_id = DB::getPdo()->lastInsertId();


        
            if($file = $request->file('photo_id')) {
                $year = date('Y');
                $month = date('m');
                $day = date('d');
                $sub_folder = $year.'/'.$month.'/'.$day.'/';
                $upload_url= 'images/'.$sub_folder;

                if (! File::exists(public_path().'/'.$upload_url)) {
                       File::makeDirectory(public_path().'/'.$upload_url,0777,true);
                  }

                $name = time() . $file->getClientOriginalName();


                $file->move($upload_url, $name);


                $photo = Photo::create(['path'=> $upload_url. $name,'product_id'=>$product_id,'is_thumbnail'=>1]);

                }
                if($file = $request->file('photo')) {
                $year = date('Y');
                $month = date('m');
                $day = date('d');
                $sub_folder = $year.'/'.$month.'/'.$day.'/';
                $upload_url= 'images/'.$sub_folder;

                if (! File::exists(public_path().'/'.$upload_url)) {
                       File::makeDirectory(public_path().'/'.$upload_url,0777,true);
                  }

                $name = time() . $file->getClientOriginalName();


                $file->move($upload_url, $name);


                $phot = Photo::create(['path'=> $upload_url. $name,'product_id'=>$product_id,'is_thumbnail'=>0]);

                }

                
                return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $products = Product::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();
        $providers = Provider::pluck('name', 'id')->all();
        $promotions = Promotion::pluck('value', 'id')->all();

        return view('admin.products.edit', compact('products', 'categories', 'providers', 'promotions','photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this ->validate($request, [
            'name' => 'required|min:3|max:30',
            'weight' => 'required|min:1|max:3',
            'price' => 'required|min:6|max:12',
            'quantity' => 'required|min:1|max:3',
            'description' => 'required|min:30|max:1000',
            ],[
                'name.required' => 'Vui lòng điền tên của sản phẩm',
                'name.min' => 'Vui lòng nhập ít nhất 3 ký tự',
                'name.max' => 'Vui lòng không nhập quá 30 ký tự',
                'weight.required' => 'Vui lòng điền khối lượng của sản phẩm',
                'weight.min' => 'Vui lòng nhập ít nhất 1 ký tự',
                'weight.max' => 'Vui lòng không nhập quá 3 ký tự',
                'price.required' => 'Vui lòng điền giá của sản phẩm',
                'price.min' => 'Vui lòng nhập ít nhất 6 ký tự',
                'price.max' => 'Vui lòng không nhập quá 12 ký tự',
                'quantity.required' => 'Vui lòng điền số lượng của sản phẩm',
                'quantity.min' => 'Vui lòng nhập ít nhất 1 ký tự',
                'quantity.max' => 'Vui lòng không nhập quá 3 ký tự',
                'description.required' => 'Vui lòng điền mô tả của sản phẩm',
                'description.min' => 'Vui lòng nhập ít nhất 30 ký tự',
                'description.max' => 'Vui lòng không nhập quá 1000 ký tự',
                

        ]);
        $products = Product::findOrFail($id);
        $input = $request->all();
        $product_id = $id;


        if ($file = $request->file('photo_id')) {
            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $sub_folder = 'products/'.$product_id.'/'. $year . '/' . $month . '/' . $day . '/';
            $upload_url = 'images/' . $sub_folder;

            if (!File::exists(public_path() . '/' . $upload_url)) {
                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
            }

            $name = time() . $file->getClientOriginalName();

            $file->move($upload_url, $name);
            
            
            $photo = Photo::create(['path' => $upload_url . $name,'product_id'=>$product_id,'is_thumbnail'=>1]);
            
            
        }
        if($file = $request->file('photo')) {
                $year = date('Y');
                $month = date('m');
                $day = date('d');
                $sub_folder = $year.'/'.$month.'/'.$day.'/';
                $upload_url= 'images/'.$sub_folder;

                if (! File::exists(public_path().'/'.$upload_url)) {
                       File::makeDirectory(public_path().'/'.$upload_url,0777,true);
                  }

                $name = time() . $file->getClientOriginalName();


                $file->move($upload_url, $name);


                $phot = Photo::create(['path'=> $upload_url. $name,'product_id'=>$product_id,'is_thumbnail'=>0]);

                }

        $products->update($input);

        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       $product = Product::findOrFail($id);
        
        $product->update(['is_delete' => '1']);
        \Illuminate\Support\Facades\Session::flash('delete_product', 'Xóa sản phẩm <b>' . $product->name . '</b> thành công');
        return redirect()->route('admin.products.index');
    }
    
      public function getProviderById($id)
    {
         $products = Product::Where([['provider_id', $id],['is_delete',0]])->paginate(5);
         $providers = Provider::all();

        return view('admin.products.index', ['products'=>$products],['providers'=>$providers]);

    }
}