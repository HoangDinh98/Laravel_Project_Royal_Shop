@extends ('layouts.ui')

@section('content')

@include('layouts.iucomponents.carousel')

@php 
    $step = 0
@endphp

<section id="hot-products">
    <h3 class="title"><span>Sản phẩm mới</span></h3>
    
    <div id="myCarouselOne" class="carousel slide">
        <!-- Dot Indicators -->
        @php 
            $step = 0
        @endphp
        
        <div class="carousel-inner">
            @foreach($products as $product)
            
            @if($step == 0) 
                {!!  '<div class="item active"> <div class="row">'  !!}
             @elseif ($step != 0 && $step % 4 == 0) 
                    {!!  '<div class="item"><div class="row">'  !!}
             @endif
                    <div class="span3">
                        <div class="well well-small">
                            <span class="newTag"></span>
                            <span class="priceTag">
                                <small class="oldPrice">{{ number_format($product->price) }}<small> đ</small></small>
                                <span class="newPrice">{{ number_format($product->price) }}<small> đ</small></span>
                            </span>
                            <a class="displayStyle" href="#"><img id="product-img-{{$product->id}}" src="{{ $product->thumbnail() ? asset($product->thumbnail()->path): 'http://placehold.it/200x200' }}"></a>
                            <h5>{{ $product->name }}</h5>
                            <p>
                                <a class="btn btn-warning addcart" data-id="{{$product->id}}">Thêm vào <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="{{ route('product.index', $product->id)}}">Chi tiết</a>
                            </p>
                            <p><span class="price">{{ number_format($product->price) }}<small> đ</small></span></p>

                        </div>
                    </div>
             @if ($step % 4 == 3 || $step == $products->count()-1) 
             {!!  '</div></div>' !!}
             @endif
             
            @php
                $step++
            @endphp
            
         @endforeach
            
        </div>
        
       
      
        <a class="left carousel-control" href="#myCarouselOne" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#myCarouselOne" data-slide="next">›</a>
    </div>
        
</section>

<section id="new-products">
    <h3 class="title"><span>Sản phẩm bán chạy</span></h3>
    
    <div id="new-products-Carousel" class="carousel slide">
        <!-- Dot Indicators -->
        @php 
            $step = 0
        @endphp
        
        <div class="carousel-inner">
            @foreach($products as $product)
            
            @if($step == 0) 
                {!!  '<div class="item active"> <div class="row">'  !!}
             @elseif ($step != 0 && $step % 4 == 0) 
                    {!!  '<div class="item"><div class="row">'  !!}
             @endif
                    <div class="span3">
                        <div class="well well-small">
                            <span class="newTag"></span>
                            <span class="priceTag">
                                <small class="oldPrice">{{ number_format($product->price) }}<small> đ</small></small>
                                <span class="newPrice">{{ number_format($product->price) }}<small> đ</small></span>
                            </span>
                            <a class="displayStyle" href="#"><img id="product-img-{{$product->id}}" src="{{ $product->thumbnail() ? asset($product->thumbnail()->path): 'http://placehold.it/200x200' }}"></a>
                            <h5>{{ $product->name }}</h5>
                            <p>
                                <a class="btn btn-warning addcart" data-id="{{$product->id}}">Thêm vào <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="{{ route('product.index', $product->id)}}">Chi tiết</a>
                            </p>
                            <p><span class="price">{{ number_format($product->price) }}<small> đ</small></span></p>

                        </div>
                    </div>
             @if ($step % 4 == 3 || $step == $products->count()-1) 
             {!!  '</div></div>' !!}
             @endif
             
            @php
                $step++
            @endphp
            
         @endforeach
            
        </div>
        
       
      
        <a class="left carousel-control" href="#myCarouselOne" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#myCarouselOne" data-slide="next">›</a>
    </div>
        
</section>

<section id="orther-products">
    <h3 class="title"><span>Sản phẩm khác</span></h3>
    
    <div id="orther-products-Carousel" class="carousel slide">
        <!-- Dot Indicators -->
        @php 
            $step = 0
        @endphp
        
        <div class="carousel-inner">
            @foreach($products as $product)
            
            @if($step == 0) 
                {!!  '<div class="item active"> <div class="row">'  !!}
             @elseif ($step != 0 && $step % 4 == 0) 
                    {!!  '<div class="item"><div class="row">'  !!}
             @endif
                    <div class="span3">
                        <div class="well well-small">
                            <span class="newTag"></span>
                            <span class="priceTag">
                                <small class="oldPrice">{{ number_format($product->price) }}<small> đ</small></small>
                                <span class="newPrice">{{ number_format($product->price) }}<small> đ</small></span>
                            </span>
                            <a class="displayStyle" href="#"><img id="product-img-{{$product->id}}" src="{{ $product->thumbnail() ? asset($product->thumbnail()->path): 'http://placehold.it/200x200' }}"></a>
                            <h5>{{ $product->name }}</h5>
                            <p>
                                <a class="btn btn-warning addcart" data-id="{{$product->id}}">Thêm vào <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="{{ route('product.index', $product->id)}}">Chi tiết</a>
                            </p>
                            <p><span class="price">{{ number_format($product->price) }}<small> đ</small></span></p>

                        </div>
                    </div>
             @if ($step % 4 == 3 || $step == $products->count()-1) 
             {!!  '</div></div>' !!}
             @endif
             
            @php
                $step++
            @endphp
            
         @endforeach
            
        </div>
        
       
      
        <a class="left carousel-control" href="#myCarouselOne" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#myCarouselOne" data-slide="next">›</a>
    </div>
        
</section>

@include('ui.sticky_cart')

@include('ui.notify_modal')
@include('ui.error_modal')

@endsection

@section('extraNotify')
@if( session('shippingSuccess'))
    @include('ui.shipping_success')
@endif
@endsection