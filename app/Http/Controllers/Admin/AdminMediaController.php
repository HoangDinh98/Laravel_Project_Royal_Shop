<?php

namespace App\Http\Controllers\Admin;
date_default_timezone_set("Asia/Ho_Chi_Minh");
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Photo;
use App\Product;
use App\User;

class AdminMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('created_at', 'desc')->Where('is_delete',0)->paginate(5);
        $products = Product::all();
        $users = User::all();
            return view('admin.media.index', compact('products', 'photos'));
 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        
        $photo->update(['is_delete' => '1']);
        \Illuminate\Support\Facades\Session::flash('delete_photo', 'Xóa Hình ảnh <b>' . $photo->path . '</b> Thành công');
        return redirect()->route('admin.media.index');
    }
    
         public function getProductById($id)
    {
         $photos = Photo::orderBy('created_at', 'desc')->Where([['product_id', $id],['is_delete',0]])->paginate(5);
         $products = Product::all();

        return view('admin.media.index', ['products'=>$products],['photos'=>$photos]);

    }
}
