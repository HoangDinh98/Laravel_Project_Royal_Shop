@extends ('layouts.ui')

@section('content')

@php
$session_timeout = 30*60;

if (!Session::has('last_visit')) {
Session::put('last_visit', time());
}

if ((time() - Session::get('last_visit')) > $session_timeout) {
Session::forget('cart');
}

Session::put('last_visit', time());
@endphp

<section>
    <h3 class="title"><span>Giỏ hàng của bạn</span></h3>
    <div class="well">
        <div class="row">
            <div class="span9">
                <div id="notification-content">
                    @if (Session::has('notification'))
                    <div class="alert alert-success">
                        <button data-dismiss="alert" class="close">×</button>
                        {{ Session::get('notification') }}
                    </div>
                    @endif
                </div>
                
                <div class="product-quatity-notify">
                    @if (Session::has('cart'))
                    <b>CÓ <span id="product-totalQty">{{ Session::get('cart')->totalQty }}</span> SẢN PHẨM</b>
                    @else
                    <b>Hiện tại, không có sản phẩm nào trong giỏ hàng của bạn</b>
                    @endif
                </div>
                
                @if (Session::has('cart'))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th class="number-box">Giá bán</th>
                            <th style="text-align: center">Số lượng</th>
                            <th class="number-box">Thành tiền</th>
                            <th class="number-box" style="width: 20px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products AS $id => $product)
                        <tr id="row-id-{{$id}}">
                            <td class="">
                                <a href="{{ route('product.index', $id)}}">
                                    <div class="img-box">
                                        <img id="product-img-{{$id}}" src="{{ $product['item']->thumbnail()? asset($product['item']->thumbnail()->path):'http://placehold.it/800x800' }}" alt="#">
                                    </div>
                                    <div id="product-name-{{$id}}" class="name-box">
                                        {{ $product['item']->name }}
                                    </div>
                                </a>
                            </td>
                            <td class="number-box">
                                <p class="current-price">
                                    @php
                                    $current_price = $product['item']->price*(1 - 0.01*$product['item']->promotion->value)
                                    @endphp
                                    {{ Helper::vn_currencyunit($current_price) }}
                                </p>
                                <p class="original-price">
                                    {{ number_format($product['item']->price, 0, ',', '.').' đ' }}
                                </p>
                                <p class="promotion-ratio">
                                    {{ '- '.$product['item']->promotion->value.' %' }}
                                </p>
                            </td>
                            <!--<td><input type="text" placeholder="1" class="input-mini"></td>-->
                            <td class="number-box">
                                <div class="product-num-box">
                                    <span data-id="{{$id}}" id="minus-{{$id}}" class="change-num-direct minus {{ $product['qty']<=1?'disabled':'' }}">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </span><span class="product-num noselect" id="product-qty-{{$id}}">
                                        {{ $product['qty'] }}
                                    </span><span data-id="{{$id}}" id="plus-{{$id}}" class="change-num-direct plus {{ $product['qty']>=5?'disabled':'' }} ">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </td>
                            <td class="number-box" id="sum-price-{{$id}}">
                                {{ Helper::vn_currencyunit($product['sum_price']) }}
                            </td>
                            <td class="number-box romove-sign">
                                <a class="remove" data-id="{{$id}}">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
            <div class="span2">
                <div class = "block" style="">
                    <h4>Thông tin đơn hàng</h4>
                    <div class="line-block"> Giỏ hàng của bạn hiện có: 
                        <div>
                            <b id="notify-num-box">
                                {{ Session::has('cart')?Session::get('cart')->totalQty : '0'}}
                            </b> sản phẩm
                        </div> 
                    </div>
                    <div class="line-block">
                        <span class="float-left">Tạm tính:</span>
                        <span class="number-box float-right" id="temp-money">
                            {{Session::has('cart')? number_format(Session::get('cart')->totalPrice, 0, ',', '.') : '0'}} đ
                        </span>
                    </div>
                    <div class="line-block">
                        <span class="float-left"><b>Tổng tiền:</b></span>
                        <span class="number-box float-right">
                            <b id="total-money">
                                {{Session::has('cart')? number_format(Session::get('cart')->totalPrice, 0, ',', '.') : '0'}} đ
                            </b>
                        </span>
                    </div>
                    <div id="check-out-container">
                        @if(session()->has('cart'))
                        <a class="btn btn-danger" href="{{ route('checkout') }}"> TIẾN HÀNH THANH TOÁN</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include ('ui.notify_modal')

@endsection