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
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
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
            'price' => 'required|min:2|max:10',
            'quantity' => 'required|min:1|max:3',
            'description' => 'required|min:30|max:100',
            ],[
                'name.required' => 'Please enter name of product',
                'name.min' => 'The name must be at least 5 characters',
                'name.max' => 'The name may not be greater than 30 charaters',
                'weight.required' => 'Please enter weight of product',
                'weight.min' => 'The weight must be at least 1 characters',
                'weight.max' => 'The weight may not be greater than 3 charaters',
                'price.required' => 'Please enter price of product',
                'price.min' => 'The price must be at least 2 characters',
                'price.max' => 'The price may not be greater than 10 charaters',
                'quantity.required' => 'Please enter quantity of product',
                'quantity.min' => 'The quantity must be at least 1 characters',
                'quantity.max' => 'The quantity may not be greater than 3 charaters',
                'description.required' => 'Please enter description of product',
                'description.min' => 'The description must be at least 30 characters',
                'description.max' => 'The description may not be greater than 100 charaters',
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
            'price' => 'required|min:2|max:10',
            'quantity' => 'required|min:1|max:3',
            'description' => 'required|min:30|max:100',

            ],[
                'name.required' => 'Please enter name of product',
                'name.min' => 'The name must be at least 5 characters',
                'name.max' => 'The name may not be greater than 30 charaters',
                'weight.required' => 'Please enter weight of product',
                'weight.min' => 'The weight must be at least 1 characters',
                'weight.max' => 'The weight may not be greater than 3 charaters',
                'price.required' => 'Please enter price of product',
                'price.min' => 'The price must be at least 2 characters',
                'price.max' => 'The price may not be greater than 10 charaters',
                'quantity.required' => 'Please enter quantity of product',
                'quantity.min' => 'The quantity must be at least 1 characters',
                'quantity.max' => 'The quantity may not be greater than 3 charaters',
                'description.required' => 'Please enter description of product',
                'description.min' => 'The description must be at least 30 characters',
                'description.max' => 'The description may not be greater than 100 charaters',
                

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
            
            
            $photo = Photo::create(['path' => $upload_url . $name,'product_id'=>$product_id,'is_thumbnail'=>0]);
            
            
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
       $products = Product::findOrFail($id);
        $products->delete();
        
        \Illuminate\Support\Facades\Session::flash('deleted_product','Xóa Danh mục <b>' . $products->name . '</b> Thành công');
        
        return redirect('/admin/products');
    }
    
      public function getProviderById($id)
    {
         $products = Product::Where('provider_id', $id)->paginate(5);
         $providers = Provider::all();

        return view('admin.products.index', ['products'=>$products],['providers'=>$providers]);

    }
}
