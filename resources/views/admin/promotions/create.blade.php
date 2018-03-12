@extends ('layouts.admin')

@section('content')


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Thêm mới khuyến mãi</h3>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form role="form" action="{{ route('admin.promotions.store') }}" method="post" enctype='multipart/form-data'>
                <div class="box-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <div class=" form-group {{ $errors->has('value') ? 'has-error' : '' }}">
                        <label for="value">Giá trị khuyến mãi:</label>
                        <input type="number" id="value" name="value" class="form-control"  value="{{ old('value') }}">
                        <span class="text-danger">{!! $errors->first('value') !!}</span>
                    </div>  

                    <div class=" form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label for="description">Mô tả khuyến mãi:</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div> 

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Lưu" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

