<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Standard;
use App\Role;
use App\User;
use App\Photo;
//use App\EmailChecker;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class AdminUsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public $EmailChecker;
//
//    public function __construct() {
//        $this->EmailChecker = new EmailChecker();
//    }

    public function index() {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:5|max:30',
            'email' => 'required|email|min:16|unique:users,email',
            'password' => 'required|min:8|max:20',
            're_password' => 'required|same:password',
            'avatar' => 'mimes:jpg,jpeg,png|max:3670',
                ], [
            'name' => 'Không thể để trống Họ và Tên',
            'name.min' => 'Tên quá ngắn (phải từ 5 ký tự trở lên)',
            'name.max' => 'Tên quá dài (vượt quá 30 ký tự)',
            'email.required' => 'Không thể để trống Email',
            'email.min' => 'Email quá ngắn hoặc không khả dụng',
            'email.unique' => 'Email này đã được sử dụng',
            'password.required' => 'Không thẻ để trống Mật khẩu',
            'password.min' => 'Mật khẩu phải từ 8-20 ký tự',
            'password.max' => 'Mật khẩu phải từ 8-20 ký tự',
            're_password.required' => 'Vui lòng xác nhận lại mật khẩu',
            're_password.same' => 'Vui lòng nhập đúng với Mât khẩu',
            'avatar.mimes' => 'Định dạng ảnh phải là: jpg png jpeg',
            'avatar.max' => 'Kích thước ảnh quá lớn (ảnh <= 3,5MB)'
                ]
        );
        $input = $request->all();

        $input['password'] = bcrypt($request->password);

        $input['name'] = Standard::standardize_data($input['name'], 1);

        if (empty($_POST['is_active'])) {
            $input['is_active'] = 0;
        }

        $data = User::create($input);

        $user_id = $data->id;
        if ($file = $request->file('avatar')) {
            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $sub_folder = 'users/' . $user_id . '/' . $year . '/' . $month . '/' . $day . '/';
            $upload_url = 'images/' . $sub_folder;

            if (!File::exists(public_path() . '/' . $upload_url)) {
                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
            }

            $name = time() . $file->getClientOriginalName();


            $file->move($upload_url, $name);
            Photo::create(['user_id' => $user_id, 'is_thumbnail' => 1, 'path' => $upload_url . $name]);

//                $input['photo_id'] = $photo->id;
        }


        Session::flash('notification', 'Add user <b>' . $input['name'] . '</b> Successful');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (!empty($_POST['password']) || !empty($_POST['re_password'])) {
            $this->validate($request, [
                'name' => 'required|min:5|max:30',
                'avatar' => 'mimes:jpg,jpeg,png|max:3670',
                'password' => 'min:8|max:20',
                're_password' => 'required|same:password',
                    ], [
                'name.required' => 'Không thể để trống Họ và Tên',
                'name.min' => 'Tên quá ngắn (phải từ 5 ký tự trở lên)',
                'name.max' => 'Tên quá dài (vượt quá 30 ký tự)',
                'password.min' => 'Mật khẩu phải từ 8-20 ký tự',
                'password.max' => 'Mật khẩu phải từ 8-20 ký tự',
                're_password.required' => 'Vui lòng xác nhận lại mật khẩu',
                're_password.same' => 'Vui lòng nhập đúng với Mât khẩu',
                'avatar.mimes' => 'Định dạng ảnh phải là: jpg png jpeg',
                'avatar.max' => 'Kích thước ảnh quá lớn (ảnh <= 3,5MB)'
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|min:5|max:30',
                'avatar' => 'mimes:jpg,jpeg,png|max:3670',
                    ], [
                'name.required' => 'Không thể để trống Họ và Tên',
                'name.min' => 'Tên quá ngắn (phải từ 5 ký tự trở lên)',
                'name.max' => 'Tên quá dài (vượt quá 30 ký tự)',
                'avatar.mimes' => 'Định dạng ảnh phải là: jpg png jpeg',
                'avatar.max' => 'Kích thước ảnh quá lớn (ảnh <= 3,5MB)'
                    ]
            );
        }

        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        $input['name'] = Standard::standardize_data($input['name'], 1);

        if (empty($_POST['is_active'])) {
            $input['is_active'] = 0;
        }

        $user = User::findOrFail($id);
        $user->update($input);

        if ($file = $request->file('avatar')) {
            $user_id = $id;
            Photo::where('user_id', '=', $user_id)->update(['is_thumbnail' => 0]);

            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $sub_folder = 'users/' . $user_id . '/' . $year . '/' . $month . '/' . $day . '/';
            $upload_url = 'images/' . $sub_folder;

            if (!File::exists(public_path() . '/' . $upload_url)) {
                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
            }

            $name = time() . $file->getClientOriginalName();

            $file->move($upload_url, $name);
            Photo::create(['user_id' => $user_id, 'path' => $upload_url . $name]);
        }


        Session::flash('notification', 'Câp nhật thông tin tài khoản <b>' . $input['name'] . '</b> thànnh công');
        return redirect('/admin/users');
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
