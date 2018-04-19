@extends ('layouts.ui')

@section('content')

@include('layouts.iucomponents.carousel')



<section id="new-products" class="product-show">
    <h3 class="title"><span>Sản phẩm theo danh mục</span></h3>
    <div id="myCarouselOne" class="carousel slide">
    <div class="item active"> 
            <div class="item"><div class="row">
            @foreach($products as $product)
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
            @endforeach
        </div>
                <div class="pagination pagination-centered">
                    {{$products-> appends (Request :: except ('page')) -> render()}}
    </div>
            </div>
        </div>
    </div>
        
</section>
@include('ui.sticky_cart')
@include('ui.notify_modal')
@include('ui.error_modal')
@endsection

