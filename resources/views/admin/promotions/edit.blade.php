@extends ('layouts.admin')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Chỉnh sửa khuyến mãi</h3>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form role="form" action="{{ route('admin.promotions.update',$promotion->id) }}" method="POST" enctype='multipart/form-data'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="_method" value="PUT">
                <div class="box-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    
                    <div class=" form-group {{ $errors->has('value') ? 'has-error' : '' }}" >
                        <label for="value">Giá trị khuyến mãi:</label>
                        <input type="number" id="value" name="value" class="form-control"  value="{{ $promotion->value  }}">
                        <span class="text-danger">{!! $errors->first('value') !!}</span>
                    </div>  

                    <div class=" form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label for="description">Mô tả khuyến mãi:</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $promotion->description  }}">
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div> 

                    <div class="  form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                        <label for="is_active">Hoạt động:</label>
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ $promotion->is_active == 1 ? 'checked' : '' }} >

                        <span class="text-danger">{{ $errors->first('is_active') }}</span>
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