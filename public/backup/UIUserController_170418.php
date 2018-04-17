<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Standard;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
<<<<<<< Updated upstream
=======
use Validator;
use Helper;
use Illuminate\Support\Str;
>>>>>>> Stashed changes

date_default_timezone_set("Asia/Ho_Chi_Minh");

class UIUserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< Updated upstream
    public function index() {
        //
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

    public function registerShow() {
        return view('ui.register');
    }

    public function Register(Request $request) {

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
                ], [
            'name.required' => '*Vui lòng nhập tên tài khoản',
            'name.max' => '*Vui lòng nhập không quá 50 ký tự',
            'email.required' => '*Vui lòng nhập email',
            'email.unique' => '*Email đã tồn tại',
            'password.required' => '*Vui lòng nhập mất khẩu',
            'password.min' => '*Mật khấu tối thiểu gồm 6 ký tự',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $pass = Hash::make($request->input('password'));

        $user = User::create(['name' => $name, 'email' => $email, 'password' => $pass, 'role_id' => 2]);
//        $request->session()->flash('status', 'Tạo tài khoản thành công! Bắt đầu đăng nhập để sử dụng tài khoản');

        return redirect('/')->with('status', 'Tạo tài khoản thành công! Bắt đầu đăng nhập để sử dụng tài khoản');
=======
    protected $messsages = array(
        'firstname.required' => 'Không thể để trống Tên',
        'lastname.required' => 'Không thể để trống Họ, tên đệm',
        'email.required' => 'Không thể để trống email',
        'email.email' => 'Vui lòng nhập đúng địa chỉ email của bạn',
        'email.unique' => 'Email này đã tồn tại',
        'phone.regex' => 'Vui lòng nhập đúng số điện thoại của bạn',
        'password.required' => 'Vui lòng nhập mật khẩu của bạn',
        'password.min' => 'Mật khẩu quá ngắn (Độ dài phải từ 8-20 ký tự)',
        'password.max' => 'Mật khẩu quá dài (Độ dài phải từ 8-20 ký tự)',
        'repassword.same' => 'Vui lòng nhập đúng với Mật khẩu',
    );
    protected $role_without_phone = array(
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|max:20',
        'repassword' => 'same:password',
    );
    protected $role_within_phone = array(
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users,email',
        'phone' => array('regex:/^0(1\d{9}|9\d{8}|8\d{8})$/'),
        'password' => 'required|min:8|max:20',
        'repassword' => 'same:password',
    );

    public function registerShow() {
        return view('ui.register');
    }

    public function Register(Request $request) {
        if (empty($request->phone)) {
            $validator = Validator::make($request->all(), $this->role_without_phone, $this->messsages);
        } else {
            $validator = Validator::make($request->all(), $this->role_within_phone, $this->messsages);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            //            $confirm_code = Str::random(16);
            $is_continue = TRUE;
            while ($is_continue) {
                $confirm_code = Str::random(16);
                if (count(User::where('confirm_code', '=', $confirm_code)->get()) == 0) {
                    $is_continue = FALSE;
                }
            }

            $name = Helper::standardize_data($request->lastname, 1) . ' ' . Helper::standardize_data($request->firstname, 1);
            $email = $request->email;
            if (!empty($request->phone)) {
                $phone = $request->phone;
            } else {
                $phone = NULL;
            }

            $password = bcrypt($request->password);

            $input = array(
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'phone' => $phone,
                'role_id' => 1,
                'is_active' => 0,
                'is_confirmed' => 0,
                'confirm_code' => $confirm_code
            );

            var_dump($input);
//            $input = $request->all();
//        $name = $request->input('name');
//        $email = $request->input('email');
//        $pass = Hash::make($request->input('password'));
//
            User::create($input);
        }

////        $request->session()->flash('status', 'Tạo tài khoản thành công! Bắt đầu đăng nhập để sử dụng tài khoản');
//
//        return redirect('/')->with('status', 'Tạo tài khoản thành công! Bắt đầu đăng nhập để sử dụng tài khoản');
>>>>>>> Stashed changes
    }

    public function login(Request $request) {
        if ($request->ajax()) {
            $email = $request->email;
            $password = $request->password;


            $user = User::where('email', '=', $email)->first();
            // Check for Errors
            if (empty($user)) {
                $result = array(
                    'numErr' => 1,
                    'emailErr' => 'Email không hợp lệ',
                    'passErr' => ''
                );
                return response()->json($result);
            } else {
//                $user = User::where('email', $email)->where('password', $request->password)->first();
                if (!Hash::check($password, $user->password)) {
                    $result = array(
                        'numErr' => 1,
                        'emailErr' => '',
                        'passErr' => 'Mật khẩu không chính xác'
                    );
                    return response()->json($result);
                }
            }

//            Delived data if dont have any errors
            $remember_me = empty($request->remember_me) ? false : true;
            $result = array(
                'numErr' => 0,
                'emailErr' => '',
                'passErr' => '',
                'username' => $user->name,
                'role' => $user->role->name,
                'userid' => $user->id,
                'path' => 'http://localhost/laravel_project_diamond_shop/public/',
            );

            if (Auth::attempt(['email' => $email, 'password' => $password], $remember_me)) {
                return response()->json($result);
            } else {
                return response()->json(['message' => 'Đăng nhập thất bại']);
            }
        }
    }

}
