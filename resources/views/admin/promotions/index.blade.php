@extends ('layouts.admin')

@section('content')
@if(Session::has('deleted_promotion'))


<p class="bg-danger">{{session('deleted_promotion')}}</p>


@endif

<h1>Khuyến mãi</h1>


<table class="table">
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
            <td>{{$promotion->value}}</td>
            <td>{{$promotion->description}}</td>
            <td>{{$promotion->is_active?'1':'0'}}</td>
            <td><a href="{{ url('admin/promotions/'. $promotion->id.'/edit') }}">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Chỉnh sửa" />
                    </div></a>
            </td>
            <td> <form action="{{ route('admin.promotions.destroy', $promotion->id) }}" method="POST" >
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="Delete" />

                    </div>
                </form>
            </td>
        </tr>

        @endforeach

        @endif

    </tbody>
</table>


<div class="row">
    <div class="col-lg-6 col-sm-offset-5">
        {{ $promotions->render() }}
    </div>

</div>



@endsection

