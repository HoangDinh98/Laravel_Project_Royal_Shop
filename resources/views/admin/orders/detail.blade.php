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
                <h3 class="box-title">ĐƠN ĐẶT HÀNG</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-condensed table-striped table-hover no-margin">
                    <caption style="font-size: 20px; background-color: #3f51b5; color: #FFFFFF; padding: 5px;
                             border-bottom: 2px solid;">
                        Thông tin tổng quát
                        <a class="btn btn-warning order-update-modal" data-id="{{$order->id}}" style="float: right">
                            Cập nhật trạng thái
                        </a>
                    </caption>
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên khách hàng</th>
                            <th>Số ĐT</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Ngày đặt</th>
                            <th>Cập nhật</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->customer_name}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            <td id="order-status-{{$order->id}}" data-id="{{$order->status}}">
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
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <br>
                <br>
                @php
                $no = 0;
                $totalPrice = 0;
                @endphp
                <table class="table table-condensed table-striped table-hover no-margin">
                    <caption style="font-size: 20px; background-color: #3f51b5; color: #FFFFFF; padding: 5px;
                             border-bottom: 2px solid;">
                        Thông tin chi tiết
                    </caption>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th class="number-box">Số lượng</th>
                            <th class="number-box">Giá gốc (đ)</th>
                            <th class="number-box">Giá bán (đ)</th>
                            <th class="number-box">Thành tiền (đ)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items AS $item)
                        <tr>
                            <td>{{++$no}}</td>
                            <td>{{$item->product->name}}</td>
                            <td class="number-box">{{$item->quantity}}</td>
                            <td class="number-box">{{Helper::vn_currency($item->original_price)}}</td>
                            <td class="number-box">{{Helper::vn_currency($item->price)}}</td>
                            <td class="number-box">{{Helper::vn_currency($item->quantity * $item->price)}}</td>
                            @php
                            $totalPrice += $item->quantity * $item->price
                            @endphp
                        </tr>
                        @endforeach
                        <tr style="background-color: #8fC1F5; color: #090909; font-weight: bold;">
                            <td colspan="5" style="text-align: right" >Tổng tiền</td>
                            <td style=" text-align: right;">{{ Helper::vn_currency($totalPrice) . " đ" }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

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
    @include ('admin.orders.notification_form')
    
</div>

@endsection