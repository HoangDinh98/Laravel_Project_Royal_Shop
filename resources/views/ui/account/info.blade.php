@extends ('layouts.ui')

@section('content')

<section class="main-content">
    <h3 class="title"><span>Thông tin Tài khoản</span></h3>
    <div class="row">
        <div class="span4">
            <div class="accordion-group user-info">
                <div class="accordion-inner">
                    <h4>Thông tin cá nhân <a href="{{ route('user.profile', $user->id) }}" style="float: right; font-size: 14px">Chỉnh sửa</a></h4>

                    <p id="user-name">
                        <span>
                            <img src="{{$user->avatar() ? asset($user->avatar()->path):'http://placehold.it/70x70' }}" style="height: 70px; width: 70px; border-radius: 50%; border: 2px solid #AFAFFF">
                        </span><h5>{{ $user->name}}</h5>
                    Email: {{ $user->email}}<br>
                    {{ $user->phone ? 'SĐT: '.$user->phone : '' }}
                    </p>
                </div>
            </div>
        </div>
        <div class="span8">
            <div class="accordion-group add-info">
                <div class="accordion-inner">
                    <h4>Địa chỉ</h4>
                    <div class="row-fluid">
                        <div class="span6">
                            <h5 class="orange1">Địa chỉ nhận hàng mặc định</h5>
                            <p>
                                {{$user->name}}<br>
                                {{ $user->default_add_received }}<br>
                                {{ $user->phone ? 'SĐT: '.$user->phone : '' }}
                            </p>
                        </div>
                        <div class="span6 default-add-payment">
                            <h5 class="orange1">Địa chỉ thanh toán mặc định</h5>
                            <p>
                                {{$user->name}}<br>
                                {{ $user->default_add_received }}<br>
                                {{ $user->phone ? 'SĐT: '.$user->phone : '' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($user->orders->count() == 0)
        <div class="span12" style="margin-top: 20px">
            <p>
                Bạn chưa có đơn hàng nào
            </p>
        </div>
        @endif

        @if($user->orders->count() > 0)
        <!--        <div class="span12" style="margin-top: 20px">
                    <a>
                        <b>Xem tất cả đơn hàng ({{ $user->orders->count() }})</b>
                    </a>
                </div>-->

        <div class="span12" style="margin-top: 10px">
            <div class="accordion-group">
                <div class="accordion-inner">
                    <h4>Đơn hàng gần đây</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Đơn hàng số #</th>
                                <th>Ngày đặt</th>
                                <th>Sản phẩm</th>
                                <th>Tổng số lượng</th>
                                <th>Trạng thái</th>
                                <th class="number-box">Tổng tiền</th>
                                <th class="number-box" style="width: 20px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->orderslimit(5) AS $order)
                            <tr>
                                <td>{{ Helper::order_no($order->id) }}</td>
                                <td>{{ Helper::vn_date($order->created_at) }}</td>
                                <td>
                                    @foreach ($order->items AS $item)
                                    <a class="not-underline" href="{{ route('product.index', $item->product_id)}}">
                                        <img src="{{ $item->product->thumbnail() ? asset($item->product->thumbnail()->path) : 'http://placehold.it/40x40' }}"
                                             width="40px" height="40px" style="border-radius: 3px;"
                                             title="{{ $item->product->name }}">
                                    </a>
                                    @endforeach
                                </td>
                                <td>{{ $order->totalQty[0]['totalQty'] }}</td>
                                <td>
                                    @switch($order->status)
                                    @case (0)
                                    {{'Đang xử lý'}}
                                    @break
                                    @case (1)
                                    {{'Đang giao'}}
                                    @break
                                    @case (2)
                                    {{'Đã nhận'}}
                                    @break
                                    @default
                                    {{'Đã hủy'}}
                                    @endswitch
                                </td>
                                <td class="number-box">{{ Helper::vn_currencyunit($order->totalPrice[0]['totalPrice']) }}</td>
                                <td>
                                    <a href="{{ route('user.orderdetail', $order->id)}}">
                                        QUẢN LÝ
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

    </div>
</section>

@include('ui.sticky_cart')

@endsection

