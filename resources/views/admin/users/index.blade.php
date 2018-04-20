

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
                <h3 class="box-title">Tài khoản người dùng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Avatar</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số ĐT</th>
                            <th>Chức vụ</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Cập nhật gần nhất</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users AS $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><img height="50" 
                                     src="<?php
                                     if ($user->avatar()) {
                                         if (File::exists(public_path($user->avatar()->path)))
                                             echo asset($user->avatar()->path);
                                         else
                                             echo 'http://placehold.it/1200x800';
                                     } else {
                                         echo 'http://placehold.it/1200x800';
                                     }
                                     ?>"
                                     >
                            </td>
                            <td id="name_{{$user->id}}">
                                <a href="{{route('admin.users.edit', $user->id)}}"><b>{{ $user->name }}</b></a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->is_active==1?'Đã kích hoạt':'Chưa kích hoạt' }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                                <div style="display: block; width: max-content">
                                    <a class="button-a edit-button" href="{{ route('admin.users.edit', $user->id) }}" 
                                       title="Chỉnh sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;
                                    <a class="button-a delete-button delete-fnt" data-type="5" data-id="{{$user->id }}"
                                       title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;
                                    <form id="fnt_{{$user->id}}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </div>
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