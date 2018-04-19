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
                <h1>Khuyến mãi</h1>

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Giá trị khuyến mãi</th>
                                <th>Mô tả</th>
                                <th>Hoạt động</th>
                        </thead>
                        <tbody>
                            @if($promotions)
                            @foreach($promotions as $promotion)
                            <tr>
                                <td>{{$promotion->id}}</td>
                                <td id="name_{{$promotion->id}}">{{$promotion->value.' %'}}</td>
                                <td>{{$promotion->description}}</td>
                                <td>{{$promotion->is_active?'1':'0'}}</td>
                                <td>
                                    <a class="button-a edit-button " href="{{ route('admin.promotions.edit', $promotion->id) }}" 
                                       title="Chỉnh sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;

                                    <a class="button-a delete-button delete-fnt" data-type="2" data-id="{{$promotion->id }}"
                                       title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;

                                    <form id="fnt_{{$promotion->id}}" action="{{ route('admin.promotions.destroy', $promotion->id) }}" method="POST" >
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    </form>
                                </td>
                            </tr>

                            @endforeach

                            @endif

                        </tbody>
                    </table>
                    <div style="text-align: center">
                        {{ $promotions->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection

