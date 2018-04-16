@extends ('layouts.ui')

@section('content')

@include('layouts.iucomponents.carousel')

@php 
    $step = 0
@endphp

<section id="featuredProduct">
    <h3 class="title"><span>Sản phẩm theo danh mục</span></h3>
    
    <div id="myCarouselOne" class="carousel slide">
        <!-- Dot Indicators -->
       
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
                                <small class="oldPrice">{{ Helper::vn_currencyunit($product->price) }}</small>
                                <span class="newPrice">{{ Helper::vn_currencyunit($product->price) }}</span>
                            </span>
                            <a class="displayStyle" href="#"><img id="product-img-{{$product->id}}" src="{{ $product->thumbnail() ? asset($product->thumbnail()->path): 'http://placehold.it/200x200' }}"></a>
                            <h5>{{ $product->name }}</h5>
                            <p>
                                <a class="btn btn-warning addcart" data-id="{{$product->id}}" > Thêm vào <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="{{ route('product.index', $product->id)}}">Chi tiết</a>
                            </p>
                            <p>
                                @php
                                    $current_price = $product->price*(1 - 0.01*$product->promotion->value)
                                @endphp
                                 
                                <span class="price" style="font-size: 16px">{{ Helper::vn_currencyunit($current_price) }}</span><br>
                                <span><del>{{ Helper::vn_currencyunit($product->price) }}</del></span>&nbsp;&nbsp;
                                <span>{{'- '.$product->promotion->value.' %'}}</span>
                            </p>
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

