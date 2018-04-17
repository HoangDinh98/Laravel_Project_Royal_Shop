@extends ('layouts.ui')

@section('content')

<section class="header_text sub">
<!--    <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >-->

</section>	
<section class="main-content">
    <h3 class="title"><span>Thông tin đặt hàng</span></h3>
    <div class="row">
        @if(!Auth::check())
        <div class="span12">
            <a id="call-login"><b>Đăng nhập</b></a> để thanh toán tiện lợi hơn.
            Nếu chưa có tài khoản, hãy
            <a href="{{ route('user.register') }}"><b>Đăng ký</b></a>
            ngay.
        </div>
        @endif

        <div class="span3 next-group" style="float: right">
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
            </div>
        </div>

        <div class="span9 next-group">
            <div class="accordion-group">
                <div class="accordion-inner" style="background-color: #fffed7;">
                    <div>
                        <h5>Hình thức giao hàng:</h5>
                        <div><i class="fa fa-check"></i> Giao hàng tiết kiệm (Miễn phí trên toàn quốc - Nhận hàng sau 5-7 ngày)</div>
                    </div>
                    <br>
                    <div>
                        <h5>HÌnh thức thanh toán:</h5>
                        <i class="fa fa-check"></i> Thanh toán khi nhận hàng
                    </div>
                </div>
            </div>

            <div class="accordion-group next-group">
                <div class="accordion-inner">
                    <p class="noted">Vui lòng nhập chính xác các thông tin yêu vào biểu mẫu dưới đây<br>
                        Những trường có dấu (*) là bắt buộc
                    </p>
                    <form class="row-fluid" id="checkout-form" method="POST" action="{{route('checkout')}}">
                        <div class="span6 part-block">
                            <div class="group-block">
                                <h4>Thông tin người nhận</h4>
                                <div class="control-group">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <label class="control-label"><b>*</b> Tên 
                                        <span class="required">
                                            {{ $errors->first('firstname') }}
                                        </span>
                                    </label>
                                    <div class="controls {{$errors->has('firstname')?'has-error':''}}">
                                        <input type="text" id="firstname" name="firstname" class="input-xlarge"
                                               value="{{ old('firstname') ? old('firstname') : $user->firstname }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><b>*</b> Họ, tên đệm
                                        <span class="required">
                                            {{ $errors->first('lastname') }}
                                        </span>
                                    </label>
                                    <div class="controls {{$errors->has('lastname')?'has-error':''}}">
                                        <input type="text" id="lastname" name="lastname" class="input-xlarge"
                                               value="{{ old('lastname') ? old('lastname') : $user->lastname }}">
                                    </div>
                                </div>					  
                                <div class="control-group">
                                    <label class="control-label"><b>*</b> Số điện thoại 
                                        <span class="required">
                                            {{ $errors->first('phone') }}
                                        </span>
                                    </label>
                                    <div class="controls {{$errors->has('phone')?'has-error':''}}">
                                        <input type="text" id="phone" name="phone" class="input-xlarge"
                                               value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Email
                                        <span class="required">
                                            {{ $errors->first('email') }}
                                        </span>
                                    </label>
                                    <div class="controls {{$errors->has('email')?'has-error':''}}">
                                        <input type="email" id="email-checkout" name="email" class="input-xlarge"
                                               value="{{ old('email') ? old('email') : $user->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="span6 part-block">
                            <div class="group-block">
                                <h4>Địa chỉ nhận hàng</h4>
                                <div class="control-group">
                                    <label class="control-label"><b>*</b> Tỉnh, Thành phố 
                                        <span class="required">
                                            {{ $errors->first('city') }}
                                        </span>
                                    </label>
                                    <div class="controls {{$errors->has('city')?'has-error':''}}">
                                        <input type="text" id="city" name="city" class="input-xlarge"
                                               value="{{ old('city') ? old('city'): ($user->hasadd ? $user->city : '') }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><b>*</b> Quận, Huyện 
                                        <span class="required">
                                            {{ $errors->first('district') }}
                                        </span>
                                    </label>
                                    <div class="controls {{$errors->has('district')?'has-error':''}}">
                                        <input type="text" id="district" name="district" class="input-xlarge"
                                               value="{{ old('district') ? old('district') : ($user->hasadd ? $user->district : '') }}">
                                    </div>
                                </div>					  
                                <div class="control-group">
                                    <label class="control-label"><b>*</b> Phường, Xã, Thị trấn 
                                        <span class="required">
                                            {{ $errors->first('town') }}
                                        </span>
                                    </label>
                                    <div class="controls {{$errors->has('town')?'has-error':''}}">
                                        <input type="text" id="town" name="town" class="input-xlarge"
                                               value="{{ old('town') ? old('town'): ($user->hasadd ? $user->town : '') }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><b>*</b> Số nhà, Thôn, Xóm 
                                        <span class="required">
                                            {{ $errors->first('village') }}
                                        </span>
                                    </label>
                                    <div class="controls {{$errors->has('village')?'has-error':''}}">
                                        <input type="text" id="village" name="village" class="input-xlarge"
                                               value="{{ old('village') ? old('village'): ($user->hasadd ? $user->village : '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="span12" style="margin-left: 0px; text-align: center;">
                            <input type="submit" name="checkout_submit" id="checkout_submit"
                                   value="TIẾN HÀNH ĐẶT HÀNG">
                        </div>
                    </form>
                </div>
            </div>

            <div class="accordion-group next-group">
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