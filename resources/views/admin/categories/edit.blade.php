@extends ('layouts.admin')

@section('content')

<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tạo danh mục sản phẩm</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="row">
        <div class="col-md-8">
            <form role="form" action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype='multipart/form-data'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="_method" value="PUT">
                <div class="box-body">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Tên Danh mục</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $category->name ? $category->name: old('name') }}">
                        <span class="text-danger">{!! $errors->first('name') !!}</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Danh mục này thuôc về</label>
                        <select id="parent_id" name="parent_id" class="form-control">
                            <option value="0">-- Danh mục gốc --</option>
                            @foreach ($categories AS $cate)
                            <option value="{{ $cate->id }}" {{ $cate->id == $category->parent_id ? 'selected' : '' }} >
                                {{ $cate->name }}
                            </option>
                            @endforeach
                        </select>
                    </div> 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.box -->

@endsection

