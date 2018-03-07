@extends ('layouts.admin')

@section('content')

<h1>Khuyến mãi</h1>


<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Giá trị khuyến mãi</th>
            <th>Mô tả</th>
            <th>Hành động</th>
            <th>Created at</th>
            <th>Update</th>
    </thead>
    <tbody>
        @if($promotions)
        @foreach($promotions as $promotion)
        <tr>
            <td>{{$promotion->id}}</td>
            <td>{{$promotion->value}}</td>
            <td>{{$promotion->description}}</td>
            <td>{{$promotion->is_active}}</td>
            <td>{{$promotion->created_at->diffForhumans()}}</td>
            <td>{{$promotion->updated_at->diffForhumans()}}</td>

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

