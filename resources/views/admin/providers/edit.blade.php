@extends ('layouts.admin')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tạo nhà cung cấp sản phẩm</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
        <div class="col-md-8">
            <form role="form" action="{{ route('admin.providers.update', $provider->id) }}" method="POST" enctype='multipart/form-data'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="_method" value="PUT">
                <div class="box-body">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Tên nhà cung cấp</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $provider->name ? $provider->name: old('name') }}">
                        <span class="text-danger">{!! $errors->first('name') !!}</span>
                    </div>
                     <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="name">Địa chỉ nhà cung cấp</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $provider->address ? $provider->address: old('address') }}">
                        <span class="text-danger">{!! $errors->first('name') !!}</span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Chỉnh sửa" />
                    </div>
                    
