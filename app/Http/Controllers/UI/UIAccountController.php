<?php

/**
 * Description of UIAccountController
 *
 * @author hoang.dinh
 */

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Standard;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Order;
use App\Photo;
use Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Mail\NotificationMail;

class UIAccountController extends Controller {

    public function show($id) {
        $user = Auth::user();
        return view('ui.account.info', compact('user'));
    }

    public function orderDetail($id) {
        $user_id = Auth::user()->id;
        $order = Order::where([['id', $id], ['user_id', $user_id]])->get()->first();
        return view('ui.account.order_detail', compact('order'));
    }

    public function orderCanceled(Request $request) {
        $order = Order::findOrFail($request->order_id);
        $order->status = 4;
        $order->save();
        return redirect()->back()->with('notification', 'Bạn đã hủy đơn hàng thành công');
    }

    public function profile($id) {
        $user = Auth::user();
        $name = Helper::diveid_name($user->name);

//        var_dump($name);

        $user->firstname = $name['firstname'];
        $user->lastname = $name['lastname'];

        return view('ui.account.profile', compact('user'));
    }

    public function changePass(Request $request) {
        if ($request->ajax()) {
            if (empty($request->oldpass)) {
                return response()->json([
                            'hasError' => true,
                            'message' => 'Vui lòng nhập mật khẩu cũ của bạn',
                ]);
            }

            $user = User::findOrFail($request->user_id);
            if (!Hash::check($request->oldpass, $user->password)) {
                $result = array(
                    'hasError' => true,
                    'message' => 'Bạn đã nhập mật khẩu cũ không chính xác'
                );
                return response()->json($result);
            }

            $validator = Validator::make($request->all(), [
                        'newpass' => 'required|min:8|max:20',
                        'renewpass' => 'same:newpass',
                            ], [
                        'newpass.required' => 'Vui lòng nhập mật khẩu',
                        'newpass.min' => 'Mật khẩu quá ngắn (Độ dài phải từ 8-20 ký tự)',
                        'newpass.max' => 'Mật khẩu quá dài (Độ dài phải từ 8-20 ký tự)',
//                        'renewpass.required' => 'Vui lòng xác nhận mật khẩu',
                        'renewpass.same' => 'Vui lòng nhập đúng với Mật khẩu mới',
            ]);

            if ($validator->passes()) {
                $user->password = bcrypt($request->newpass);
                $user->update();

                return response()->json([
                            'hasError' => false,
                            'message' => 'Cập nhật Mật khẩu <b>Thành công</b>'
                ]);
            }

            return response()->json(['error' => $validator->errors()]);
        }
    }

    public function profileUpdate(Request $request, $id) {
//        Validation
        if (empty($request->phone)) {
            $this->validate($request, [
                'firstname' => 'required',
                'lastname' => 'required',
                'avatar' => 'mimes:jpg,jpeg,png|max:3670',
                    ], [
                'firstname.required' => 'Không thể để trống tên',
                'lastname.required' => 'Không thể để trống họ, tên đệm',
                'avatar.mimes' => 'Tệp được chọn phải đúng định dạng (png, jpg, jpeg)',
                'avatar.max' => 'Kích thước ảnh tối đa là 3670 kB',
                    ]
            );
        } else {
            $this->validate($request, [
                'firstname' => 'required',
                'lastname' => 'required',
                'avatar' => 'mimes:jpg,jpeg,png|max:3670',
                'phone' => array('regex:/^0(1\d{9}|9\d{8}|8\d{8})$/')
                    ], [
                'firstname.required' => 'Không thể để trống tên',
                'lastname.required' => 'Không thể để trống họ, tên đểm',
                'avatar.mimes' => 'Tệp được chọn phải đúng định dạng (png, jpg, jpeg)',
                'avatar.max' => 'Kích thước ảnh tối đa là 3670 kB',
                'phone.regex' => 'Vui lòng nhập đúng số điện thoại của bạn'
                    ]
            );
        }

//        Insert data into table
        $input = $request->except('email');
        $name = Standard::standardize_data($request->lastname, 1) . ' ' . Standard::standardize_data($request->firstname, 1);
        $input['name'] = $name;
        unset($input['firstname']);
        unset($input['lastname']);

        $user = User::findOrFail($id);
        $user->update($input);

        if ($file = $request->file('avatar')) {
            $photos = Photo::where('user_id', '=', $user->id)->get();

            foreach ($photos AS $photo) {
                File::delete($photo->path);
                $photo->delete();
            }

            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $sub_folder = 'users/' . $user->id . '/' . $year . '/' . $month . '/' . $day . '/';
            $upload_url = 'images/' . $sub_folder;

            if (!File::exists(public_path() . '/' . $upload_url)) {
                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
            }

            $name = time() . $file->getClientOriginalName();

            $file->move($upload_url, $name);
            Photo::create(['user_id' => $user->id, 'is_thumbnail' => 1, 'path' => $upload_url . $name]);
        }

        return redirect()->back()->with('notification', 'Cập nhật thông tin <b>Thành công</b>');
    }

    public function sendMail($id) {
            $user = User::findOrFail($id);
            Mail::to($user->email)->send(new NotificationMail($user));

//            Mail::to($request->user())->send(new NotificationMail($user));
//            return response()->json("Gửi mail thành công");
    }

}
