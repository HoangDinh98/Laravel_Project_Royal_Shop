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
            <form role="form" action="{{ route('admin.categories.store') }}" method="POST" enctype='multipart/form-data'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="box-body">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="exampleInputEmail1">Tên Danh mục</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên danh mục">
                        <span class="text-danger">{{$errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Danh mục này thuôc về</label>
                        <select id="parent_id" name="parent_id" class="form-control">
                            <option value="0" selected="true">-- Danh mục gốc --</option>
                            @foreach ($categories AS $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
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