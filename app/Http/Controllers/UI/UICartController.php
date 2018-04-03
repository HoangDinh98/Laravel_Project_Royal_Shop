<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;
use App\Order;
use App\OrderDetail;
use App\Http\Controllers\Standard;

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

            $price = number_format(round($product->price * (1 - 0.01 * $product->promotion->value)));
            $totalPrice = number_format($cart->totalPrice);

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
            $totalQty = number_format($cart->totalQty);
            $sum_price = number_format($cart->items[$request->id]['sum_price']);
            $totalPrice = number_format($cart->totalPrice);

            return response()->json(['qty' => $qty, 'sum_price' => $sum_price,
                        'totalQty' => $totalQty, 'totalPrice' => $totalPrice]);
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
            $sum_price = number_format($cart->items[$request->id]['sum_price']);
            $totalQty = number_format($cart->totalQty);
            $totalPrice = number_format($cart->totalPrice);

//            return response()->json(['qty' => $qty, 'sum_price' => $sum_price]);
            return response()->json(['qty' => $qty, 'sum_price' => $sum_price,
                        'totalQty' => $totalQty, 'totalPrice' => $totalPrice]);
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

            $totalQty = number_format($cart->totalQty);
            $totalPrice = number_format($cart->totalPrice);

//            return response()->json(['qty' => $qty, 'sum_price' => $sum_price]);
            return response()->json(['totalQty' => $totalQty, 'totalPrice' => $totalPrice,
                        'productName' => $productName]);
        }
    }

    public function checkout() {
        if (session()->has('cart')) {
            return view('ui.checkout');
        } else {
            return redirect()->route('ui.home.index');
        }
    }

    public function checkoutSubmit(Request $request) {
        $message = 'Không thể để trống trường này';
        if (!empty($_POST['email'])) {
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
        $name = Standard::standardize_data($request->lastname.' '.$request->firstname, 1);
        
        $city = Standard::standardize_data($request->city, 1);
        $district = Standard::standardize_data($request->district, 1);
        $town = Standard::standardize_data($request->town, 1);
        $village = Standard::standardize_data($request->village, 1);
        
        $address = $village.', '.$town.', '.$district.', '.$city;
        
        $email = $request->has('email') ? $request->email : '';
        
        $description = '';
//        if(Auth::user()->name) {
//            $description = 'Thành viên';
//        } else {
//            $description = 'Không phải thành viên';
//        }
        
        $order = Order::create([
            'customer_name' => $name,
            'phone' => $request->phone,
            'email' => $email,
            'address' => $address,
            'description' => $description
        ]);
        
        $order_id = $order->id;
        
//        Insert data from Session into Order detail Table
        foreach (Session::get('cart')->items AS $id => $item) {
            $product_id = $id;
            $quantity = $item['qty'];
            $original_price = $item['item']->price;
            $price = round($original_price * (1- 0.01 * $item['item']->promotion->value));
            
            OrderDetail::create([
                'order_id' => $order_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'original_price' => $original_price,
                'price' => $price,
            ]);
        }
    }

}
