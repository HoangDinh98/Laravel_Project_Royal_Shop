@extends ('layouts.ui')

@section('content')

<section class="header_text sub">
<!--    <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >-->

</section>	
<section class="main-content">
    <h3 class="title"><span>THÔNG TIN ĐẶT HÀNG</span></h3>
    <p style="text-align: center">Vui lòng nhập chính xác các thông tin yêu vào biểu mẫu dưới đây<br>
        Những trường có dấu (*) là bắt buộc
    </p>
    <div class="row">
        <div class="span12">
            <div class="accordion-group">
                <div class="accordion-inner">
                    <form class="row-fluid" id="checkout-form" method="POST" action="{{route('ui.checkout')}}">
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
                                    <div class="controls">
                                        <input type="text" id="firstname" name="firstname" class="input-xlarge"
                                               value="{{ old('firstname') }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><b>*</b> Họ 
                                        <span class="required">
                                            {{ $errors->first('lastname') }}
                                        </span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="lastname" name="lastname" class="input-xlarge"
                                               value="{{ old('lastname') }}">
                                    </div>
                                </div>					  
                                <div class="control-group">
                                    <label class="control-label"><b>*</b> Số điện thoại 
                                        <span class="required">
                                            {{ $errors->first('phone') }}
                                        </span>
                                    </label>
                                    <div class="controls">
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
                                    <div class="controls">
                                        <input type="email" id="email" name="email" class="input-xlarge"
                                               value="{{ old('email') }}">
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
                                    <div class="controls">
                                        <input type="text" id="city" name="city" class="input-xlarge"
                                               value="{{ old('city') }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><b>*</b> Quận, Huyện 
                                        <span class="required">
                                            {{ $errors->first('district') }}
                                        </span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="district" name="district" class="input-xlarge"
                                               value="{{ old('district') }}">
                                    </div>
                                </div>					  
                                <div class="control-group">
                                    <label class="control-label"><b>*</b> Phường, Xã, Thị trấn 
                                        <span class="required">
                                            {{ $errors->first('town') }}
                                        </span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="town" name="town" class="input-xlarge"
                                               value="{{ old('town') }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><b>*</b> Số nhà, Thôn, Xóm 
                                        <span class="required">
                                            {{ $errors->first('village') }}
                                        </span>
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="village" name="village" class="input-xlarge"
                                               value="{{ old('village') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="span12" style="margin-left: 0px; text-align: center;">
                            <input type="submit" name="checkout_submit" id="checkout_submit"
                                   value="XÁC NHẬN THÔNG TIN VÀ ĐẶT HÀNG">
                        </div>
                    </form>
                </div>
            </div>			
        </div>
    </div>
</section>

@include ('ui.notify_modal')

@endsection