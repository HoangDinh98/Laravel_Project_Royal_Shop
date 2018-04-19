<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Standard;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;
use Helper;
use Illuminate\Support\Str;
use App\Mail\VerifyEmail;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class UIUserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            $name = Helper::standardize_data($request->lastname, 1) . ' ' . Helper::standardize_data($request->firstname, 1);
            $email = $request->email;
            if (!empty($request->phone)) {
                $phone = $request->phone;
            } else {
                $phone = NULL;
            }

            $confirm_code = base64_encode($email);
            $password = bcrypt($request->password);

            $input = array(
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'phone' => $phone,
                'role_id' => 3,
                'is_active' => 0,
                'is_confirmed' => 0,
                'confirm_code' => $confirm_code
            );

            $user = User::create($input);
            Mail::to($user->email)->queue(new VerifyEmail($user));

            return redirect('/')->with('registerStatus', $user->email);
        }

////        $request->session()->flash('status', 'Tạo tài khoản thành công! Bắt đầu đăng nhập để sử dụng tài khoản');
//
//        return redirect('/')->with('status', 'Tạo tài khoản thành công! Bắt đầu đăng nhập để sử dụng tài khoản');
    }

    public function verifyEmail($confirm_code) {
        $status = User::where('confirm_code', '=', $confirm_code)->update(['is_confirmed' => 1, 'confirm_code' => NULL, 'is_active' => 1]);

        if ($status == 0) {
            return redirect('/')->with('verifyStatus', [
                        'err' => 1,
                        'message' => 'Tài khoản của bạn đã được xác thực trước đó!'
            ]);
        } else {
            return redirect('/')->with('verifyStatus', [
                        'err' => 0,
                        'message' => 'Xác thực Email thành công!<br> Đăng nhập ngay để sử dụng dịch vụ'
            ]);
        }
//        echo '<<<<<<'.$status.' >>>> OK';
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
                    'passErr' => '',
                    'confirmErr' => ''
                );
                return response()->json($result);
            } else {
                if ($user->is_confirmed == 0 && !empty($user->confirm_code)) {
                    $result = array(
                        'numErr' => 1,
                        'emailErr' => '',
                        'passErr' => '',
                        'confirmErr' => 'Email của bạn chưa được xác thực<br>Vui lòng kiểm tra Email của bạn và xác thực tài khoản để sử dụng dịch vụ'
                    );
                    return response()->json($result);
                }

                if (!Hash::check($password, $user->password)) {
                    $result = array(
                        'numErr' => 1,
                        'emailErr' => '',
                        'passErr' => 'Mật khẩu không chính xác',
                        'confirmErr' => ''
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
