@extends ('layouts.ui')

@section('content')

@include('layouts.iucomponents.carousel')

@php 
    $step = 0
@endphp

<section id="featuredProduct">
    <h3 class="title"><span>New Products</span></h3>
    
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
                                <small class="oldPrice"><small>$</small>{{ $product->price }}</small>
                                <span class="newPrice"><small>$</small>{{ $product->price }}</span>
                            </span>
                            <a class="displayStyle" href="#"><img src="{{ $product->thumbnail() ? asset($product->thumbnail()->path): 'http://placehold.it/200x200' }}"></a>
                            <h5>{{ $product->name }}</h5>
                            <p>
                                <a class="btn btn-warning" href="#" > Add to <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="{{ route('product.index', $product->id)}}">view details</a>
                            </p>
                            <p><span class="price"><small>$</small>{{ $product->price }}</span></p>

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

@endsection

