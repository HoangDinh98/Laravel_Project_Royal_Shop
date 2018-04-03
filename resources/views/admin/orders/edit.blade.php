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
                <table class="table table-condensed table-striped table-hover no-margin">
                    <caption style="font-size: 20px; background-color: #3f51b5; color: #FFFFFF; padding: 5px;
                             border-bottom: 2px solid;">
                        Thông tin tổng quát
                    </caption>
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
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@endsection