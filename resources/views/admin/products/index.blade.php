@extends('layouts.admin')


@section('content')
    
    @if (Session::has('deleted_product'))
    <div class="alert alert-success" id="notify">
        <button data-dismiss="alert" class="close">×</button>
        {!! Session::get('deleted_product') !!}
    </div>
    @endif
    <h1>Products Management</h1>

    <table class="table">
       <thead>
         <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Photos</th>
             <th>Provider</th>
             <th>Category</th>
             <th>Promotion</th>
             <th>Quantity</th>
             <th>Weight</th>
             <th>Price</th>
             <th>Description</th>
        
        </thead>
        <tbody>
        @if($products)
        @if (count($products) == 0)

          You have no product in this page!

          @else
            @foreach($products as $product)

            <tr>
                <td>{{$product->id}}</td>
                <td><a href="{{ url('admin/products/'. $product->id.'/edit') }}">{{$product->name}}</td>
                <td><img style="width:200px ; height:200px" 
                         src="{{ $product->thumbnail() ? asset($product->thumbnail()->path): 'http://placehold.it/200x200' }}" 
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
                <td><a href="{{ url('admin/products/'. $product->id.'/edit') }}">{{$product->description}}</a></td>


            </tr>

            @endforeach
            @endif
            @endif

        </tbody>
     </table>


      <div class="row">
        <div class="col-lg-6 col-sm-offset-5">
            {{ $products->render() }}
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