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
                            <span class="newTag"></span>
                            <span class="priceTag">
                                <small class="oldPrice"><small>$</small>{{ $product->price }}</small>
                                <span class="newPrice"><small>$</small>{{ $product->price }}</span>
                            </span>
                            <a class="displayStyle" href="#"><img src="{{ $product->thumbnail() ? asset($product->thumbnail()->path): 'http://placehold.it/200x200' }}"></a>
                            <h5>{{ $product->name }}</h5>
                            <p>
                                <a class="btn btn-warning addcart" data-id="{{$product->id}}"> Thêm vào giỏ hàng <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="{{ route('product.index', $product->id)}}">Xem chi tiết</a>
                            </p>
                            <p><span class="price"><small>$</small>{{ $product->price }}</span></p>

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