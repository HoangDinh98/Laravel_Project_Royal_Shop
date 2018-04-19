@extends ('layouts.ui')

@section('content')

<section class="main-content user-profile">
    <h3 class="title"><span>Thông tin cá nhân</span></h3>

    <div class="accordion-group">
        <div class="accordion-inner">
            <div class="row-fluid">
                <form class="profile-update" action="{{ route('user.profile.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    <div class="span4">
                        <h5>Ảnh đại diện</h5>
                        <div class="avatar-box">
                            <img src="{{ $user->avatar() ? asset($user->avatar()->path) : 'http://placehold.it/100x100' }}">
                        </div>
                        <br>
                        <label class="btn btn-success btn-file">
                            Thay đổi <input type="file" id="avatar" name="avatar" style="display: none;">
                        </label>
                        <p class="required">{{ $errors->first('avatar') }}</p>
                        <p id="avatar-source"></p>
                    </div>

                    <h4 style="text-align: center">Thông tin</h4>
                    <div class="span4">
                        <div class="control-group">
                            <span>Tên đầy đủ: {{$user->name}}</span>
                        </div>
                        <div class="control-group {{$errors->has('firstname')?'has-error':''}}">
                            <label>Tên:</label>
                            <input type="text" name="firstname"
                                   value="{{ old('firstname') ? old('firstname') :$user->firstname}}">
                            <span class="required">{{ $errors->first('firstname') }}</span>
                        </div>
                        <div class="control-group {{$errors->has('lastname')?'has-error':''}}">
                            <label>Họ, tên đệm:</label>
                            <input type="text" name="lastname" 
                                   value="{{old('lastname') ? old('lastname') : $user->lastname}}">
                            <span class="required">{{ $errors->first('lastname') }}</span>
                        </div>
                        <div class="control-group">
                            <a href="#change-pass-div" data-toggle="modal">
                                <h5>Thay đổi mật khẩu</h5>
                            </a>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="control-group">
                            <span>Liên lạc</span>
                            @csrf
                        </div>
                        <div class="control-group">
                            <label>Email:</label>
                            <input type="text" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="control-group {{$errors->has('phone')?'has-error':''}}">
                            <label>Số ĐT:</label>
                            <input type="text" name="phone" value="{{ old('phone') ? old('phone') : $user->phone }}">
                            <span class="required">{{ $errors->first('phone') }}</span>
                        </div>
                    </div>
                    <div class="span12" style="text-align: right">
                        <button type="submit" class="btn btn-primary" style="margin-right: 60px" disabled>Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="change-pass-div" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
        <div class="modal-header">
            <button id="btn_close" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Royal Shop : Thay đổi mật khẩu</h3>
        </div>
        <div class="modal-body">
            <form id="change-pass-form">
                <div id="old-pass" class="control-group input-box" >
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    @csrf
                    <label>Mật khẩu cũ <span class="required">(*)</span></label>
                    <input type="password" name="oldpass" id="oldpass" autofocus>
                    <span id="old-pass-error" class="required">{{ $errors->first('oldpass') }}</span>
                </div>
                <br>
                <div id="new-pass" class="control-group input-box">
                    <label>Mật khẩu mới <span class="required">(*)</span></label>
                    <input type="password" id="newpass" name="newpass">
                    <span id="newpass-error" class="required">{{ $errors->first('newpass') }}</span>
                </div>
                <div class="control-group input-box">
                    <label>Xác nhận mật khẩu mới <span class="required">(*)</span></label>
                    <input type="password" id="renewpass" name="renewpass">
                    <span id="renewpass-error" class="required">{{ $errors->first('renewpass') }}</span>
                </div>
                <div class="control-group">
                    <button type="button" class="btn btn-success btn-change-pass">Lưu</button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
                </div>
            </form>		

        </div>
    </div>

</section>

@include('ui.sticky_cart')

@endsection

@section('extraNotify')
@if(session('notification'))
@include('ui.account.notification')
@endif
@endsection
