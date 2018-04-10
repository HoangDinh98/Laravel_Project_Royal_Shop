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
                            <th>Mô tả</th>
                            <th>Ngày đặt</th>
                            <th>Cập nhật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders AS $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td id="cus-name-{{$order->id}}">{{ $order->customer_name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->address }}</td>
                            <td id="order-status-{{$order->id}}" data-id='{{$order->status}}' >
                                @switch($order->status)
                                @case(0)
                                {{'Chờ xử lý'}}
                                @break
                                @case(1)
                                {{'Đang giao'}}
                                @break
                                @case(2)
                                {{'Đã giao'}}
                                @break
                                @default
                                {{'Đã hủy'}}
                                @endswitch
                            </td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->updated_at }}</td>
                            <td>
                                <div style="display: block; width: max-content">
                                    <a class="button-a blue order-update-modal" data-id="{{$order->id}}" title="Cập nhật trang thái"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;
                                    <a class="button-a edit-button" href="{{ route('admin.orders.show', $order->id) }}" 
                                       title="Chỉnh sửa"><i class="fa fa-info-circle" aria-hidden="true"></i></a>&nbsp;
                                    <div class="modal fade" id="update-form-{{$order->id}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-postion-20pc modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h5 style="font-weight: bold" class="modal-title">Cập nhật trạng thái cho đơn hàng</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Trang thái hiện tại: <b id="order-status-mess-{{$order->id}}"></b>
                                                    </p>
                                                    <form class="form" style="padding-left: 30%">
                                                        <div class="checkbox">
                                                            <label class="order-inprocess-box">
                                                                <input type="radio" class="order-delivered" name="status" value="0"> Đang chờ xử lý 
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="order-delivering-box">
                                                                <input type="radio" class="order-delivered" name="status" value="1"> Đang giao 
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="order-delivered-box">
                                                                <input type="radio" class="order-delivered" name="status" value="2"> Đã giao 
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="order-canceled-box">
                                                                <input type="radio" class="order-undelivered" name="status" value="3"> Đã hủy
                                                            </label>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default close-2" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary update-form-submit" data-id="{{$order->id}}">Lưu thay đổi</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
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
    @include ('admin.orders.notification_form')
</div>

<div class="row">
    <div class="col-lg-6 col-sm-offset-5">
        {{ $orders->render() }}
    </div>

</div>

@endsection