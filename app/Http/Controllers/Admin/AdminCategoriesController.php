<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Category;
use App\Http\Controllers\Standard;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class AdminCategoriesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index() {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::where('parent_id', '=', 0)->orderBy('name', 'asc')->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $erroricon = '<i class="fa fa-times"></i>';
        $this->validate($request, [
            'name' => 'required',
                ], [
            'name.required' => $erroricon.' Không thể để trống trường này'
        ]);
        
        $input = $request->all();
        $categoryname = Standard::standardize_data($request->input('name'), 1);
        $input['name'] = $categoryname;

        Category::create($input);

        Session::flash('notification', 'Add Category <b>' . $input['name'] . '</b> Successful');
        return $this->index();
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

}
