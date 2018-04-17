@extends ('layouts.ui')

@section('content')

@include('layouts.iucomponents.carousel')

@php 
    $step = 0
@endphp

<section id="featuredProduct">
    <h3 class="title"><span>Các sản phẩm dưới 1 triệu VNĐ</span></h3>
    
    <div id="myCarouselOne" class="carousel slide">
        <!-- Dot Indicators -->
       
        <div class="carousel-inner">
            @foreach($priceproducts as $product)
            
            @if($step == 0) 
                {!!  '<div class="item active"> <div class="row">'  !!}
             @elseif ($step != 0 && $step % 4 == 0) 
                    {!!  '<div class="item"><div class="row">'  !!}
             @endif
                              <div class="span3">                       
                                <div class="well well-small">
                                    <a class="displayStyle" href="{{ route('product.index', $product->id)}}"><img id="product-img-{{$product->id}}" src="{{ $product->thumbnail() ? asset($product->thumbnail()->path): 'http://placehold.it/250x250' }}"></a>
                                    <h5>{{ $product->name }}</h5>
                                    <p>
                                        @php
                                        $current_price = $product->price*(1 - 0.01*$product->promotion->value)
                                        @endphp

                                        <span><del>{{ Helper::vn_currencyunit($product->price) }}</del></span>&nbsp;&nbsp;
                                           <span>{{'- '.$product->promotion->value.' %'}}</span><br><br>
                                        <span class="price" style="font-size: 16px">{{ Helper::vn_currencyunit($current_price) }}</span>
                                    </p>
                                    <div class="addcart">
                                        <a class="btn btn-warning addcart" data-id="{{$product->id}}">Thêm vào giỏ hàng <i class="icon-shopping-cart"></i></a> 
                                    </div>                    
                                </div>                       
                            </div>
             @if ($step % 4 == 3 || $step == $priceproducts->count()-1) 
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

