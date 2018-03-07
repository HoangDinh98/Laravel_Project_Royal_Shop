<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Promotion;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class AdminPromotionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $promotions = Promotion::orderBy('created_at', 'desc')->paginate(3);

        return view('admin.promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.promotions.create', compact('promotions'));
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
            'value' => 'required',
                ], [
            'value.required' => $erroricon . ' Không thể để trống trường này'
        ]);
        Promotion::create($request->all());
        Session::flash('notification', 'Thêm khuyến mãi <b>' . $request['name'] . '</b> Thành công');
        return redirect('/admin/promotions');
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
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $promotions = Promotion::findOrFail($id);
        
        $input = $request->all();
        if(empty($input['is_active'])){
            $input['is_active'] = 0;
        }
        $promotions->update($input);

        return redirect('/admin/promotions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
    $promotions = Promotion::findOrFail($id);
        $promotions->delete();
        
        return redirect('admin/promotions');
    }

}
