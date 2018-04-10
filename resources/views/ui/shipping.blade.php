@extends ('layouts.ui')

@section('content')

<section class="header_text sub">
<!--    <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >-->

</section>	
<section class="main-content">
    <h3 class="title"><span>Thông tin đặt hàng</span></h3>
    <div class="row">
        <div class="span4" style="float: right">
            <div class = "block" style="">
                <h4>Thông tin đơn hàng</h4>
                <div class="line-block">
                    <b id="notify-num-box">
                        {{ Session::has('cart')?Session::get('cart')->totalQty : '0'}}
                    </b> sản phẩm
                </div>
                <div class="line-block">
                    <span class="float-left">Tạm tính:</span>
                    <span class="number-box float-right" id="temp-money">
                        {{Session::has('cart')? Helper::vn_currencyunit(Session::get('cart')->totalPrice) : '0 đ'}}
                    </span>
                </div>
                <div class="line-block">
                    <span class="float-left">Phí vận chuyển:</span>
                    <span class="number-box float-right" id="">
                        MIỄN PHÍ
                    </span>
                </div>
                <div class="line-block">
                    <span class="float-left"><b>Tổng tiền:</b></span>
                    <span class="number-box float-right">
                        <b id="total-money">
                            {{Session::has('cart')? Helper::vn_currencyunit(Session::get('cart')->totalPrice) : '0 đ'}}
                        </b>
                    </span>
                </div>

                <h4>Thông tin giao hàng</h4>
                <div class="line-block" style="text-align: left">
                    <span>Giao hàng tới: <b>{{Session::get('order')->customer_name}}</b></span>
                    <p>
                        Địa chỉ: {{Session::get('order')->address}}<br>
                        SĐT: {{Session::get('order')->phone}}
                    </p>
                    <div>
                        <a href="{{route('checkout')}}">Thay đổi thông tin giao hàng</a>
                    </div>
                </div>
                <div id="check-out-container">
                    <button class="btn btn-warning btn-shippingAgree">XÁC NHẬN ĐẶT HÀNG</button>
                    <form action="{{ route('shippingAgree') }}" method="POST" id="shippingAgree-form">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <div class="span8">
            <div class="accordion-group">
                <div class="accordion-inner">
                    @if (Session::has('cart'))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{Session::get('cart')->totalQty}} SẢN PHẨM</th>
                                <th class="number-box">Giá bán</th>
                                <th style="text-align: center">Số lượng</th>
                                <th class="number-box">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Session::get('cart')->items AS $id => $product)
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
                                        {{ Helper::vn_currencyunit($product['item']->price) }}
                                    </p>
                                    <p class="promotion-ratio">
                                        {{ '- '.$product['item']->promotion->value.' %' }}
                                    </p>
                                </td>
                                <!--<td><input type="text" placeholder="1" class="input-mini"></td>-->
                                <td class="number-box">
                                    <div class="product-num-box">
                                        <span class="product-num" style="border: none" id="product-qty-{{$id}}">
                                            {{ $product['qty'] }}
                                        </span>
                                    </div>
                                </td>
                                <td class="number-box bold" id="sum-price-{{$id}}">
                                    {{ Helper::vn_currencyunit($product['sum_price']) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>

@include ('ui.sticky_cart')
@include ('ui.notify_modal')

@endsection