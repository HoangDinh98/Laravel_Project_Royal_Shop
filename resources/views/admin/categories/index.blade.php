@extends ('layouts.admin')

@section('content')

@if (Session::has('notification'))
<div class="alert alert-success" id="notify">
    <button data-dismiss="alert" class="close">×</button>
    {!! Session::get('notification') !!}
</div>
@endif

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Chứa trong</th>
                            <th>Ngày tạo</th>
                            <th>Cập nhật vào</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories AS $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td id="name_{{$category->id}}">{{ $category->name }}</td>
                            <td>
                                {{ $category->parent_id!=0 ? $category->parent->name:'Thư mục gốc' }}
                            </td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td>
                                <a class="button-a edit-button" href="{{ route('admin.categories.edit', $category->id) }}" 
                                   title="Chỉnh sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;
                                <!--                                <a class="button-a delete-button" href="javascript:deleteA('category_{{$category->id}}')" 
                                                                   title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;-->
                                <a class="button-a delete-button delete-fnt" data-type="1" data-id="{{$category->id }}"
                                   title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;
                                <form id="fnt_{{$category->id}}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@endsection