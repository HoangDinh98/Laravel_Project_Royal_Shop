@extends('layouts.ui')
@section('content')

<section id="mainBody">
    <div class="container">
        <h3 class="title"><span>Đăng ký</span></h3>
        <ul class="breadcrumb">
            <li><a href="{{ url('/home') }}">Trang chủ</a> <span class="divider">/</span></li>
            <li class="active">Đăng ký</li>
        </ul>
        <div class="well">
            <form class="register-form form-horizontal" method="POST" action="{{ route('user.register.submit') }}">
                <p>
                    Vui lòng nhập đúng thông tin cá nhân của bạn vào biểu mẫu dưới đây.
                    Điều này sẽ thuận tiện hơn cho việc đặt hàng.
                    Những trường có dấu (*) là bắt buộc
                </p>
                @csrf
                <h3>Thông tin Đăng ký</h3>
                <div class="control-group">
                    <label class="control-label" style="text-align: left;" for="name">Tên <span class="required">*</span></label>
                    <input id="firstname" type="text" name="firstname" value="{{ old('firstname') }}"><br>
                    <div class="required">
                        {{ $errors->has('firstname') ? $errors->first('firstname') : '' }}
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" style="text-align: left;" for="name">Họ, tên đệm <span class="required">*</span></label>
                    <input id="lastname" type="text" name="lastname" value="{{ old('lastname') }}"><br>
                    <div class="required">
                        {{ $errors->has('lastname') ? $errors->first('lastname') : '' }}
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" style="text-align: left;" for="email">Email <span class="required">*</span></label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"><br>
                    <div class="required">
                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                    </div>	  
                </div>

                <div class="control-group">
                    <label class="control-label" style="text-align: left;" for="email">Số ĐT </label>
                    <input id="phone" type="text" name="phone" value="{{ old('phone') }}" ><br>
                    <div class="required">
                        {{ $errors->has('phone') ? $errors->first('phone') : '' }}
                    </div>	  
                </div>

                <div class="control-group">
                    <label class="control-label" style="text-align: left;" for="password">Mật khẩu <span class="required">*</span></label>
                    <input id="password" type="password" name="password"><br>
                    <div class="required">
                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label " style="text-align: left;" for="password-confirm">Xác nhận mật khẩu <span class="required">*</span></label>
                    <input id="repassword" type="password" name="repassword">
                    <div class="required">
                        {{ $errors->has('repassword') ? $errors->first('repassword') : '' }}
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary"> Đăng ký </button>
                    </div>
                </div>	

                <br>
                <br>
                <br>
            </form>
        </div>

    </div>

</section>
@endsection