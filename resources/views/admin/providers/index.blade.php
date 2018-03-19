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
                            <th>Tên nhà cung cấp</th>
                            <th>Địa chỉ</th>
                            <th>Email nhà cung cấp</th>
                            <th>Website</th>
                            <th>Phone</th>
                            <th>Ngày tạo</th>
                            <th>Cập nhật vào</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($providers)
                        @foreach($providers as $provider)
                        <tr>
                            <td>{{$provider->id}}</td>
                            <td id="name_{{$provider->id}}">{{$provider->name}}</td>
                            <td>{{$provider->address}}</td>
                            <td>{{$provider->email}}</td>
                            <td>{{$provider->website}}</td>
                            <td>{{$provider->phone}}</td>
                            <td>{{$provider->create_at}}</td>
                            <td>{{$provider->update_at}}</td>
                            <td>
                                <a class="button-a edit-button" href="{{ route('admin.providers.edit', $provider->id)}}"
                                   title="Chỉnh sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;

                                <a class="button-a delete-button delete-fnt" data-type="3" data-id="{{$provider->id }}"
                                   title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;
                            </td>
                    <form id="provider_{{$provider->id}}" action="{{ route('admin.providers.destroy', $provider->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    </form> 
                    </td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

