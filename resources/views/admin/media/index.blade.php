@extends('layouts.admin')

@section('content')
@if (Session::has('delete_photo'))
<div class="alert alert-success" id="notify">
    <button data-dismiss="alert" class="close">×</button>
    {!! Session::get('delete_photo') !!}
</div>
@endif
<div class="box">
    <h1>Quản lý hình ảnh</h1>
    <div class="box-header">
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Chính/Phụ<th>
                        <th></th>
                </thead>
                <tbody>
                    @if($photos)
                    @if (count($photos) == 0)

                    You have no photo in this page!

                    @else
                    @foreach($photos as $photo)

                    <tr>
                        <td>{{$photo->id}}</td>
                        @foreach($products as $product)
                        @if($product->id == $photo->product_id)
                        <td><a href="{{ url('admin/media/'. $photo->product_id.'/product')}}">{{$photo->product ? $photo->product->name:'No'}}</a></td>
                        @endif
                        @endforeach
                        <td><img style="width:70px ; height:70px" 
                                 src="{{ asset($photo->path)}}" 
                                 height="10" alt="" class="img-responsive img-rounded">
                        <td>{{$photo->is_thumbnail}}</td>
                        <td>
                            <a class="button-a delete-button delete-fnt" data-type="6" data-id="{{$photo->id }}"
                               title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;

                            <form id="fnt_{{$photo->id}}" action="{{ route('admin.media.destroy', $photo->id) }}" method="POST" >
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            </form>
                        </td>


                    </tr>
                    @endforeach
                    @endif
                    @endif
                </tbody>
            </table>




            <div class="row">
                <div class="col-lg-6 col-sm-offset-5">
                    {{ $photos->render() }}
                </div>

            </div>
        </div>
    </div>
</div>

@section('$products')
@if($products)   
@foreach($products as $product)

<li><a href="{{ url('admin/media'. $product->id.'/product') }}">{{$product->name}}</a></li>

@endforeach
@endif
@endsection

@stop
