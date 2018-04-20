<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;
use App\Cart;
use App\Order;
use App\OrderDetail;
use App\Http\Controllers\Standard;
use \Helper;

class UICartController extends Controller {

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
    public function show() {
        if (!Session::has('cart')) {
            return view('ui.cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('ui.cart', ['products' => $cart->items]);
//        return view('ui.cart');
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

    //    ----- CART -----
    public function addCart(Request $request) {
        if ($request->ajax()) {
            $product = Product::findOrFail($request->id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);

            if (isset($cart->items[$request->id]) && $cart->items[$request->id]['qty'] >= 5) {
                return response()->json(['error' => 1, 'message' => 'Không thể thêm sản phẩm vào giỏ hàng. <br>Số lượng tối đa cho từng sản phẩm là 5']);
            }

            $cart->add($product, $product->id);

            $price = Helper::vn_currencyunit(round($product->price * (1 - 0.01 * $product->promotion->value)));
            $totalPrice = Helper::vn_currencyunit($cart->totalPrice, 0, ',', '.');

            $request->session()->put('cart', $cart);
            return response()->json([
                        'error' => 0,
                        'totalQty' => $cart->totalQty,
                        'name' => $product->name,
                        'price' => $price,
                        'totalPrice' => $totalPrice,
            ]);
        }
    }

    public function plusCart(Request $request) {
        if ($request->ajax()) {
            $product = Product::findOrFail($request->id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            if ($cart->items[$request->id]['qty'] < 5) {
                $cart->add($product, $product->id);
                $request->session()->put('cart', $cart);
            }
            $qty = $cart->items[$request->id]['qty'];
            $totalQty = $cart->totalQty;
            $sum_price = Helper::vn_currencyunit($cart->items[$request->id]['sum_price']);
            $totalPrice = Helper::vn_currencyunit($cart->totalPrice);

            return response()->json([
                        'qty' => $qty,
                        'sum_price' => $sum_price,
                        'totalQty' => $totalQty,
                        'totalPrice' => $totalPrice
            ]);
        }
    }

    public function minusCart(Request $request) {
        if ($request->ajax()) {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            if ($cart->items[$request->id]['qty'] > 1) {
                $cart->deleteByOne($request->id);
                $request->session()->put('cart', $cart);
            }

            $qty = $cart->items[$request->id]['qty'];
            $sum_price = Helper::vn_currencyunit($cart->items[$request->id]['sum_price']);
            $totalQty = $cart->totalQty;
            $totalPrice = Helper::vn_currencyunit($cart->totalPrice);

//            return response()->json(['qty' => $qty, 'sum_price' => $sum_price]);
            return response()->json([
                        'qty' => $qty,
                        'sum_price' => $sum_price,
                        'totalQty' => $totalQty,
                        'totalPrice' => $totalPrice
            ]);
        }
    }

    public function removeItem(Request $request) {
        if ($request->ajax()) {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);

            $productName = $cart->items[$request->id]['item']->name;

            $cart->removeItem($request->id);
            if (count($cart->items) > 0) {
                Session::put('cart', $cart);
            } else {
                Session::forget('cart');
            }

            $totalQty = $cart->totalQty;
            $totalPrice = Helper::vn_currencyunit($cart->totalPrice);

//            return response()->json(['qty' => $qty, 'sum_price' => $sum_price]);
            return response()->json([
                        'totalQty' => $totalQty,
                        'totalPrice' => $totalPrice,
                        'productName' => $productName
            ]);
        }
    }

    public function checkout() {
        if (session()->has('cart')) {
            if (Auth::check()) {
                $user = Auth::user();

                $name = Helper::diveid_name($user->name);
                if (!empty($user->default_add_received)) {
                    $add = Helper::diveid_add($user->default_add_received);
                    $user->hasadd = true;
                    $user->city = $add['city'];
                    $user->district = $add['district'];
                    $user->town = $add['town'];
                    $user->village = $add['village'];
                }

                $user->firstname = $name['firstname'];
                $user->lastname = $name['lastname'];
            } else {
                $user = app()->make('App');
                $user->firstname = null;
                $user->lastname = null;
                $user->email = null;
                $user->phone = null;
                $user->hasadd = false;
//                var_export($user);
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            
//            Session::forget('order');
            return view('ui.checkout', ['user' => $user, 'products' => $cart->items]);
        } else {
            return redirect()->route('home.index');
        }
    }

    public function checkoutSubmit(Request $request) {
        if (!(session()->has('cart'))) {
            return redirect()->route('ui.home.index');
        }

        $message = 'Không thể để trống trường này';
        if (!empty($request->email)) {
            $this->validate($request, [
                'firstname' => 'required',
                'lastname' => 'required',
                'phone' => 'required',
                'email' => 'email',
                'city' => 'required',
                'district' => 'required',
                'town' => 'required',
                'village' => 'required',
                    ], [
                'firstname.required' => $message,
                'lastname.required' => $message,
                'phone.required' => $message,
                'email.email' => 'Xin vui lòng nhập đúng địa chỉ Email của bạn!',
                'city.required' => $message,
                'district.required' => $message,
                'town.required' => $message,
                'village.required' => $message,
            ]);
        } else {
            $this->validate($request, [
                'firstname' => 'required',
                'lastname' => 'required',
                'phone' => 'required',
                'city' => 'required',
                'district' => 'required',
                'town' => 'required',
                'village' => 'required',
                    ], [
                'firstname.required' => $message,
                'lastname.required' => $message,
                'phone.required' => $message,
                'city.required' => $message,
                'district.required' => $message,
                'town.required' => $message,
                'village.required' => $message,
            ]);
        }

//        $name, $address, $phone, $email, $description;
//        $order_id, $product_id, $quantity, $price, $original_price;
//        Standardize data for Orders tabale
        $name = Standard::standardize_data($request->lastname . ' ' . $request->firstname, 1);

        $city = Standard::standardize_data($request->city, 1);
        $district = Standard::standardize_data($request->district, 1);
        $town = Standard::standardize_data($request->town, 1);
        $village = Standard::standardize_data($request->village, 1);

        $address = $village . ', ' . $town . ', ' . $district . ', ' . $city;

        $email = $request->has('email') ? $request->email : '';

        $description = '';
        if (Auth::check()) {
            $description = 'Thành viên';
        } else {
            $description = 'Không phải thành viên';
        }

        if (Session::has('order')) {
            Session::forget('order');
        }

        //        $order = App::make();
        $order = app()->make('App');
        $order->customer_name = $name;
        $order->firstname = Standard::standardize_data($request->firstname, 1);
        $order->lastname = Standard::standardize_data($request->lastname, 1);
        $order->phone = $request->phone;
        $order->email = $email;
        $order->address = $address;
        $order->city = $city;
        $order->district = $district;
        $order->town = $town;
        $order->village = $village;
        $order->description = $description;

//        Push data into session
        Session::put('order', $order);

//        var_export($order);
        return view('ui.shipping');
    }

    public function shipping() {
        return view('ui.shipping');
    }

    public function shippingSubmit() {
        $user_id = null;
        if (Auth::check()) {
            $user = User::findOrFail(Auth::user()->id);
            $user_id = $user->id;

            if (empty($user->default_add_received)) {
                $user->default_add_received = Session::get('order')->address;
                $user->save();
            }
        }

        $order = Order::create([
                    'user_id' => $user_id,
                    'customer_name' => Session::get('order')->customer_name,
                    'phone' => Session::get('order')->phone,
                    'email' => Session::get('order')->email,
                    'address' => Session::get('order')->address,
                    'description' => Session::get('order')->description
        ]);

        $order_id = $order->id;

//        Insert data from Session into Order detail Table
        foreach (Session::get('cart')->items AS $id => $item) {
            $product_id = $id;
            $quantity = $item['qty'];
            $original_price = $item['item']->price;
            $price = round($original_price * (1 - 0.01 * $item['item']->promotion->value));

            OrderDetail::create([
                'order_id' => $order_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'original_price' => $original_price,
                'price' => $price,
            ]);
        }

        Session::forget('cart');
        Session::forget('order');

        return redirect('/')->with('shippingSuccess', 1);
//        return redirect()->route('home', ['shippingSuccess' => 1]);
//        return view('ui.home', ['shippingSuccess' => 1]);
    }

}
