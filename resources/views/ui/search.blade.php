@extends ('layouts.ui')
@section('content')
<section id="featuredProduct">
    <!-- Dot Indicators -->
    <h3 class="title"><span>Kết quả tìm kiếm cho "{{$keyword}}"</span></h3>
    @if(count($products) ==0)
    <p> Có <b>{{count($products)}}</b> kết quả cho từ khóa "{{$keyword}}"</p>
    @else
    <p> Có <b>{{count($products)}}</b> kết quả cho từ khóa "{{$keyword}}"</p>
    <div class="item active"> <div class="row">
            <div class="item"><div class="row">
                    @foreach($products as $product)
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
                    @endforeach


                </div>
            </div>
        </div>
    </div>


    @endif

</section>

@include('ui.sticky_cart')

@endsection