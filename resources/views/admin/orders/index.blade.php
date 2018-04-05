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
                <h3 class="box-title">Đơn đặt hàng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên khách hàng</th>
                            <th>Số ĐT</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Ngày đặt</th>
                            <th>Cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders AS $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td id="name_{{$order->id}}">{{ $order->customer_name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->is_delivered == 1 ? 'Đã giao' : 'Chưa giao' }}</td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at }}</td>
                            <td>
                                <a class="button-a edit-button" href="{{ route('admin.orders.edit', $order->id) }}" 
                                   title="Chỉnh sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;
                                <a class="button-a delete-button delete-fnt" data-type="1" data-id="{{$order->id }}"
                                   title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;
                                <form id="fnt_{{$order->id}}" action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
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