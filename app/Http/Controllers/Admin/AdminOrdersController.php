<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class AdminOrdersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $orders = Order::paginate(10);
        return view('admin.orders.index', compact('orders'));
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
        $order = Order::findOrFail($id);
        return view('admin.orders.detail', compact('order'));
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

    public function updateAjax(Request $request) {
        $message_option = [
            0 => 'Chờ xử lý',
            1 => 'Đang giao',
            2 => 'Đã giao',
            3 => 'Đã hủy'
        ];

        if ($request->ajax()) {
            $order = Order::findOrFail($request->id);

            $old_status = $order->status;

            if ($order->status != $request->status) {
                $order->status = $request->status;
                $order->save();
                $message = '<br><b> ' . $message_option[$old_status] . ' -> <span class="blue">' . $message_option[$order->status] . '</span></b>';

                return response()->json([
                            'is_changed' => 1,
                            'status' => $order->status,
                            'status_text' => $message_option[$order->status],
                            'message' => $message
                ]);
            }

            return response()->json(['is_changed' => 0, 'status' => $order->status, 'message' => '']);
        }
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
