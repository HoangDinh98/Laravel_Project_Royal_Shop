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
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UIAccountController extends Controller {
    public function show($id){
        $user = User::findOrFail($id);
        return view('ui.account.info');
    }
}
