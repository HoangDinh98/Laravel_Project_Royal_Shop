@extends ('layouts.admin')

@section('content')

<div class="row-fluid">
    <div class="span12">
        <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home" style="font-size: 18px; width: 30px;"></i></a><span class="divider">&nbsp;</span></li>
            <li><a href="#">Khuyến mãi</a><span class="divider-last">&nbsp;</span></li>
        </ul>
    </div>
</div>

<div>
    <a class="create-button" href="./create.blade.php">Thêm mới khuyến mãi</a>
</div>

<div class="widget-body">
    <table class="table table-condensed table-striped table-hover no-margin">
        <thead>
            <tr>
                <!--<th style="display: none"></th>-->
                <th>STT</th>
                <th>Giá trị khuyến mãi</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
    </table>
</div>

@endsection

