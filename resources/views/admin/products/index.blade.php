@extends('layouts.admin')


@section('content')

@if (Session::has('delete_product'))
<div class="alert alert-success" id="notify">
    <button data-dismiss="alert" class="close">×</button>
    {!! Session::get('delete_product') !!}
</div>
@endif

<div class="box">
    <h1 style="padding-left: 10px;"> Quản lý sản phẩm</h1>
    <div class="box-header">
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh chính</th>
                        <th>Nhà cung cấp</th>
                        <th>Phân loại</th>
                        <th>Khuyến mãi</th>
                        <th>Số lượng</th>
                        <th>Khối lượng</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>

                </thead>
                <tbody>
                    @if($products)
                    @if (count($products) == 0)

                    You have no product in this page!

                    @else
                    @foreach($products as $product)

                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td><img style="width:70px ; height:70px" 
                                 src="{{ $product->thumbnail() ? asset($product->thumbnail()->path): 'http://placehold.it/70x70' }}" 
                                 height="10" alt="" class="img-responsive img-rounded"></td>
                        @foreach($providers as $provider)
                        @if($provider->id == $product->provider_id)
                        <td><a href="{{ url('admin/products/'. $product->provider_id.'/provider')}}">{{$product->provider ? $product->provider->name:'Uncategorized'}}</a></td>
                        @endif
                        @endforeach

                        <td>{{$product->category ? $product->category->name : 'Uncategorized'}}</td>
                        <td>{{$product->promotion ? $product->promotion->value : 'Uncategorized'}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->weight}}</td>
                        <td>{{$product->price}}</td>
                    <td style="width: 100px;">{!! strip_tags($product->description) !!}</a></td>
                        <td>
                            <div style="display: block; width: max-content"> 
                                <a class="button-a edit-button " href="{{ route('admin.products.edit', $product->id) }}" 
                                   title="Chỉnh sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;

                                <a class="button-a delete-button delete-fnt" data-type="0" data-id="{{$product->id }}"
                                   title="Xóa"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp;
                            </div>
                            <form id="fnt_{{$product->id}}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" >
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
        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-offset-5">
                {{ $products->render() }}
            </div>

        </div>
    </div>
</div>
@section('$providers')
@if($providers)   
@foreach($providers as $provider)

<li><a href="{{ url('admin/products/'. $provider->id.'/provider') }}">{{$provider->name}}</a></li>

@endforeach
@endif
@endsection

@stop