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
            <form class="form-horizontal" method="POST" action="{{ route('user.register.submit') }}">
                @csrf
                <h3>Thông tin cá nhân</h3>

                <div class="control-group">
                    <label class="control-label" style="text-align: left;" for="name">Tên <sup>*</sup></label>
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required ><br>
                    <div>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong><p class="feed">{{ $errors->first('name') }}</p></strong>
                        </span>
                        @endif     
                </div>
                </div>

                <div class="control-group">
                    <label class="control-label" style="text-align: left;" for="email">Email <sup>*</sup></label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required><br>
                    <div>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong><p class="feed">{{ $errors->first('email') }}</p></strong>
                        </span>
                        @endif 
                </div>	  
                </div>

                <div class="control-group">
                    <label class="control-label" style="text-align: left;" for="password">Mật khẩu <sup>*</sup></label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required><br>
                    <div>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback ">
                            <strong><p class="feed">{{ $errors->first('password') }}</p></strong>
                        </span>
                        @endif                    
                </div>	 
                </div>

                <div class="control-group">
                    <label class="control-label " style="text-align: left;" for="password-confirm">Xác nhận mật khẩu <sup>*</sup></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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