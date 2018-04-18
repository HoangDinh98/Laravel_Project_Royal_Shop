@extends ('layouts.ui')

@section('content')

@include('layouts.iucomponents.carousel')

@php 
    $step = 0
@endphp

<section id="new-products" class="product-show">
    <h3 class="title"><span>Sản phẩm theo danh mục</span></h3>
    
    <div id="myCarouselOne" class="carousel slide">
        <!-- Dot Indicators -->
       
      
        <div class="carousel-inner">
            @foreach($products as $product)

            @if($step == 0) 
            {!!  Helper::product_group_active()  !!}
            @elseif ($step != 0 && $step % 4 == 0) 
            {!!  Helper::product_group_notactive()  !!}
            @endif
            <div class="span3 product-box">
                <div class="well well-small">
                    <div class="displayStyle">
                        <div class="cptn18">
                            <a class="" href="{{ route('product.index', $product->id)}}">

                                <img id="product-img-{{$product->id}}" src="{{ $product->thumbnail() ? asset($product->thumbnail()->path): 'http://placehold.it/270x270' }}">
                                <h5>{{ $product->name }}</h5>
                                <div class="price-area">
                                    @php
                                    $current_price = $product->price*(1 - 0.01*$product->promotion->value)
                                    @endphp
                                    <span class="price">{{ Helper::vn_currencyunit($current_price) }}</span>
                                    @if($product->promotion->value > 0)
                                    <span><del>{{ Helper::vn_currencyunit($product->price) }}</del></span>
                                    <div class="corner-ribbon"><span>{{ '- '.$product->promotion->value.' %' }}</span></div>
                                    @endif
                                </div>
                            </a>
                            <div class="cptn">
                                <span class="btn btn-warning addcart" data-id="{{$product->id}}">Thêm vào <i class="icon-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($step % 4 == 3 || $step == $products->count()-1) 
            {!!  Helper::product_group_end() !!}
            @endif
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

