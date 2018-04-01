<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Standard;
use App\User;
use Illuminate\Support\Facades\Hash;

date_default_timezone_set("Asia/Ho_Chi_Minh");

class UIUserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            $result = array(
                'numErr' => 0,
                'emailErr' => '',
                'passErr' => '',
                'username' => $user->name,
                'role' => $user->role->name,
                'userid' => $user->id,
                'path' => 'http://localhost/laravel_project_diamond_shop/public/',
            );

            return response()->json($result);
        }
    }

}