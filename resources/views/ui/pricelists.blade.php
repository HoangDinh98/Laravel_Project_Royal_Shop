@extends ('layouts.ui')
@section('content')
<section id="featuredProduct">
    <h3 class="title"><span>Các sản phẩm</span></h3>
    <div style="margin-bottom: 15px">
        {!! $approxprice !!}
    </div>
<!--    <div>
        {{ var_dump($priceproducts) }}
    </div>-->
    <div class="item active"> 
        <div class="item">
            <div class="row">
                    @foreach($priceproducts as $product)
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
            </div>
        </div>
    <div class="pagination pagination-centered">
        {{$priceproducts-> appends (Request :: except ('page')) -> render()}}
    </div>
</section>
@include('ui.sticky_cart')
@include('ui.notify_modal')
@include('ui.error_modal')
@endsection

