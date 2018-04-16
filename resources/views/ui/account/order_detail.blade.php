@extends ('layouts.ui')

@section('content')

<section class="main-content">
    <h3 class="title"><span>Đơn hàng của tôi</span></h3>
    <div class="accordion-group">
        <div class="accordion-inner" style="background-color: #fffed7;">
            <div>
                <h5>Trạng thái đơn hàng:</h5>
                <div style="color: #ca2801;">
                    <i class="fa fa-check"></i>  
                    @switch($order->status)
                    @case (0)
                    <span>{{'Đang xử lý'}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-danger canceldorder" data-id="{{$order->id}}">HỦY ĐẶT HÀNG</a>
                    <form id="order-canceled" style="display: none" action="{{route('user.ordercanceled')}}" method="POST">
                        @csrf
                        <input type="text" name="order_id" value="{{$order->id}}">
                    </form>
                    @break
                    @case (1)
                    {{'Đang giao'}}
                    @break
                    @case (2)
                    {{'Đã nhận'}}
                    @break
                    @default
                    {{'Đã hủy'}}
                    @endswitch
                </div>
            </div>
        </div>
    </div>

    <div class="row order-detail">
        <div class="span12">
            <div class="accordion-group">
                <div class="accordion-inner">
                    <h4>Chi tiết đơn hàng số #{{ Helper::order_no($order->id) }}</h4>
                    <p>Ngày đặt hàng: {{Helper::vn_date($order->created_at)}}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th class="number-box">Giá bán</th>
                                <th style="text-align: center">Số lượng</th>
                                <th class="number-box">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalPrice = 0;
                            @endphp

                            @foreach($order->items AS $item)
                            <tr id="row-id-{{$item->product->id}}">
                                <td class="">
                                    <a href="{{ route('product.index', $item->product->id )}}">
                                        <div class="img-box">
                                            <img src="{{ $item->product->thumbnail()? asset($item->product->thumbnail()->path):'http://placehold.it/800x800' }}" alt="#">
                                        </div>
                                        <div class="name-box">
                                            {{ $item->product->name }}
                                        </div>
                                    </a>
                                </td>
                                <td class="number-box">
                                    {{ Helper::vn_currencyunit($item->price) }}
                                </td>
                                <!--<td><input type="text" placeholder="1" class="input-mini"></td>-->
                                <td style="text-align: center">
                                    {{ $item->quantity }}
                                </td>
                                <td class="number-box">
                                    {{ Helper::vn_currencyunit($item->price * $item->quantity) }}
                                </td>
                                @php
                                $totalPrice += $item->quantity * $item->price
                                @endphp
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="number-box">
                                    <b>Tổng tiền</b> (tạm tính dựa trên số lượng sản phẩm):
                                </td>
                                <td class="number-box">
                                    <b>{{Helper::vn_currencyunit($totalPrice)}}</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="span6">
            <div class="accordion-group">
                <div class="accordion-inner">
                    <h5 class="orange1">Địa chỉ nhận hàng</h5>
                    <p>
                        <b>{{ $order->customer_name }}</b><br>
                        {{ $order->address }}<br>
                        {{ 'SĐT: '.$order->phone }}<br>
                        {{ $order->email ? 'Email: '.$order->email: ''}}
                    </p>
                </div>
            </div>
        </div>

        <div class="span6">
            <div class="accordion-group">
                <div class="accordion-inner">
                    <h5 class="orange1">Tổng tiền thanh toán</h5>
                    <div class="line-block" style="border-bottom: none">
                        <span class="float-left">Tạm tính:</span>
                        <span class="number-box float-right">
                            {{Helper::vn_currencyunit($totalPrice)}}
                        </span>
                    </div>
                    <div class="line-block" style="border-bottom: none">
                        <span class="float-left">Phí vận chuyển:</span>
                        <span class="number-box float-right">
                            0 đ
                        </span>
                    </div>
                    <div class="line-block">
                        <span class="float-left"><b>Tổng cộng:</b></span>
                        <span class="number-box float-right">
                            <b id="total-money">
                                {{Helper::vn_currencyunit($totalPrice)}}
                            </b>
                        </span>
                    </div>
                    <div style="margin-top: 10px">
                        @switch($order->status)
                        @case (2)
                        {{'Đã thanh toán'}}
                        @break
                        @case (3)
                        {{'Đã hủy'}}
                        @break
                        @default
                        {{'Chưa thanh toán'}}
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('extraNotify')
@if(session('notification'))
@include('ui.account.notification')
@endif
@endsection
