@extends ('layouts.admin')

@section('content')
@if (Session::has('notification'))
<div class="alert alert-success" id="notify">
    <button data-dismiss="alert" class="close">×</button>
    {!! Session::get('notification') !!}
</div>
@endif

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Chỉnh sửa Nhà cung cấp</h3>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form role="form" action="{{ route('admin.providers.update',$provider->id) }}" method="POST" enctype='multipart/form-data'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="_method" value="PUT">
                <div class="box-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    
                    <div class=" form-group {{ $errors->has('name') ? 'has-error' : '' }}" >
                        <label for="name">Tên Nhà cung cấp :</label>
                        <input type="number" id="name" name="name" class="form-control"  value="{{ $provider->name ? $provider->name: old('name') }}">
                        <span class="text-danger">{!! $errors->first('name') !!}</span>
                    </div>  

                    <div class=" form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="address">Địa chỉ nhà cung cấp:</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $provider->address ? $provider->address: old('address') }}">
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    </div> 

                    <div class=" form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email nhà cung cấp:</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $provider->email ? $provider->email: old('email') }}">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div> 
                    
                    <div class=" form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                        <label for="website">Website nhà cung cấp:</label>
                        <input type="text" class="form-control" id="website" name="website" value="{{ $provider->website ? $provider->website: old('website') }}">
                        <span class="text-danger">{{ $errors->first('website') }}</span>
                    </div> 
                    
                    <div class=" form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label for="phone">Phone nhà cung cấp:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $provider->phone ? $provider->phone: old('phone') }}">
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div> 
                    
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Chỉnh sửa" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop