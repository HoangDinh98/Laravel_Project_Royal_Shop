<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Provider;
use App\Http\Controllers\Standard;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class AdminProvidersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $providers = Provider::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.providers.create', compact('providers'));
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
            'address' => 'required',
            'email' => 'required|email|unique:users'
                ], [
            'name.required' => $erroricon . ' Không thể để trống trường này',
            'address.required' => $erroricon . 'Không thể để trống trường này',
            'email.required' => $erroricon . 'Không thể để trống trường này',
            'email.email' => $erroricon . 'Nhập đúng định dạng Email',
            'email.unique' => $erroricon . 'Email này đã tồn tại'
        ]);

        $input = $request->all();
        $provider = Standard::standardize_data($request->input('name'), 0);
        $input['name'] = $provider;

        Provider::create($input);

        Session::flash('notification', 'Thêm nhà cung cấp <b>' . $input['name'] . '</b> thành công');
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
        $provider = Provider::findOrFail($id);
        return view('admin/providers/edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $erroricon = '<i class="fa fa-times"></i>';
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users'
                ], [
            'name.required' => $erroricon . ' Không thể để trống trường này',
            'address.required' => $erroricon . 'Không thể để trống trường này',
            'email.required' => $erroricon . 'Không thể để trống trường này',
            'email.email' => $erroricon . 'Nhập đúng định dạng Email',
            'email.unique' => $erroricon . 'Email này đã tồn tại'
        ]);
        $input = $request->all();
        $providername = Standard::standardize_data($request->input('name'), 1);
        $input['name'] = $providername;

        $provider->update($input);
        Session::flash('notification', 'Thêm Nhà cung cấp <b>' . $input['name'] . '</b> Thành công');
        return redirect('/admin/providers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $provider = Provider::findOrFail($id);
        $provider->update(['is_detele' => '0']);
        Session::flash('notification', 'Xóa Nhà cung cấp <b>' . '</b> Thành công');
        returnredirect()->route('admin.providers.index');
    }

}
