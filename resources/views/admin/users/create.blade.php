@extends ('layouts.admin')

@section('content')

<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tạo mới tài khoản</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="row">
        <div class="col-md-8">
            <form role="form" action="{{ route('admin.users.store') }}" method="POST" enctype='multipart/form-data'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="box-body">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Họ và tên <span>*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nhập Họ và Tên" value="{{ old('name') }}" >
                        <span class="text-danger">{!! $errors->first('name') !!}</span>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email <span>*</span></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email" value="{{ old('email') }}">
                        <span class="text-danger">{!! $errors->first('email') !!}</span>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password">Mật khẩu <span>*</span></label>
                        <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}">
                        <span class="text-danger">{!! $errors->first('password') !!}</span>
                    </div>
                    <div class="form-group {{ $errors->has('re_password') ? 'has-error' : '' }}">
                        <label for="re_password">Xác nhận Mật khẩu <span>*</span></label>
                        <input type="password" id="re_password" name="re_password" class="form-control">
                        <span class="text-danger">{!! $errors->first('re_password') !!}</span>
                    </div>
                    <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                        <label for="avatar">Hình đại diện </label>
                        <input type="file" id="avatar" name="avatar" class="form-control" value="{{ old('avatar') }}">
                        <span class="text-danger">{!! $errors->first('avatar') !!}</span>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Nhập Số điện thoại" value="{{ old('phone') }}">
                        <span class="text-danger">{!! $errors->first('phone') !!}</span>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Chức vụ</label>
                        <select id="role_id" name="role_id" class="form-control">
                            @foreach ($roles AS $role)
                            <option value="{{ $role->id }}" {{$role->name=='User'?'selected':''}}>
                                {{ $role->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="is_active">Kích hoạt</label>
                        <input type="checkbox" id="is_active" name="is_active" value="1">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.box -->

@endsection