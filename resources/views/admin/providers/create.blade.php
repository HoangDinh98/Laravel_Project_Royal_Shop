@extends ('layouts.admin')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tạo nhà cung cấp sản phẩm</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="col-md-8">
        <form role="form" action="{{ route('admin.providers.store')}}" method="POST" enctype='multipart/form-data'>
            <div class="box-body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Tên nhà cung cấp</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                    <span class="text-danger">{!! $errors->first('name') !!}</span>
                </div>
                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label for="address">Địa chỉ nhà cung cấp</label>
                    <input type="text" id="address" name="address" class="form-control" value="{{old('address') }}">
                    <span class="text-danger">{!! $errors->first('address') !!}</span>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email nhà cung cấp</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
                    <span class="text-danger">{!! $errors->first('email') !!}</span>
                </div>
                <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                    <label for="website">Website nhà cung cấp</label>
                    <input type="text" id="website" name="website" class="form-control" value="{{old('website') }}">
                    <span class="text-danger">{!! $errors->first('website') !!}</span>
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone">Số điện thoại nhà cung cấp</label>
                    <input type="number" id="phone" name="phone" class="form-control" value="{{old('phone') }}">
                    <span class="text-danger">{!! $errors->first('phone') !!}</span>
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Lưu" />
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
