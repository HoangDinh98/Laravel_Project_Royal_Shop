@extends ('layouts.ui')

@section('content')

@include('layouts.iucomponents.carousel')

@php 
$step = 0;
@endphp

<section id="new-products" class="product-show">
    <h3 class="title"><span>Sản phẩm mới</span></h3>

    <div id="myCarouselOne" class="carousel slide">
        <!-- Dot Indicators -->
        @php 
        $step = 0
        @endphp
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

            @php
            $step++
            @endphp

            @endforeach
        </div>
        <a class="left carousel-control" href="#myCarouselOne" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#myCarouselOne" data-slide="next">›</a>
    </div>
</section>

<section id="hot-products">
    <h3 class="title"><span>Sản phẩm bán chạy</span></h3>

    @php 
    $step = 0
    @endphp
    @foreach($hot_products_id as $item)

    @if ($step == 0 || $step % 4 == 0) 
    {!! '<div class="row-fluid">' !!}
        @endif
        <div class="span3 product-box">
            <div class="well well-small">
                <div class="displayStyle">
                    <div class="cptn18">
                        <a class="" href="{{ route('product.index', $item->product->id)}}">
                            <img id="product-img-{{$item->product->id}}" src="{{ $item->product->thumbnail() ? asset($item->product->thumbnail()->path): 'http://placehold.it/270x270' }}">
                            <h5>{{ $item->product->name }}</h5>
                            <div class="price-area">
                                @php
                                $current_price = $item->product->price*(1 - 0.01*$item->product->promotion->value)
                                @endphp

                                <span class="price">{{ Helper::vn_currencyunit($current_price) }}</span>
                                @if($item->product->promotion->value > 0)
                                <span><del>{{ Helper::vn_currencyunit($item->product->price) }}</del></span>
                                <div class="corner-ribbon"><span>{{ '- '.$item->product->promotion->value.' %' }}</span></div>
                                @endif
                            </div>
                        </a>
                        <div class="cptn">
                            <span class="btn btn-warning addcart" data-id="{{$item->product->id}}">Thêm vào <i class="icon-shopping-cart"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($step % 4 == 3 || $step == $products->count()-1) 
        {!!  '</div>' !!}
    @endif

    @php
    $step++
    @endphp
    @endforeach
</section>

<section id="orther-products">
    <h3 class="title"><span>Sản phẩm khác</span></h3>
    @php 
    $step = 0
    @endphp

    @foreach($other_products as $product)
    @if ($step == 0 || $step % 4 == 0) 
    {!! '<div class="row-fluid">' !!}
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
        @if ($step % 4 == 3 || $step == $products->count()-2) 
        {!!  '</div>' !!}
    @endif

    @php
    $step++
    @endphp

    @endforeach
</section>

@include('ui.sticky_cart')

@include('ui.notify_modal')
@include('ui.error_modal')
@endsection

@section('extraNotify')
@if (session('shippingSuccess'))
@include('ui.shipping_success')
@endif

@if (session('registerStatus'))
@include('ui.messages.register_success')
@endif

@if (session('verifyStatus'))
@include('ui.messages.verify_success')
@endif

@endsection