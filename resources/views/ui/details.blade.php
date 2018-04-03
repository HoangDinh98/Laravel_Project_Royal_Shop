@extends ('layouts.ui')

@section('content')



<section>
    <h3 class="title"><span>Chi tiết sản phẩm</span></h3>
    <div class="row">
        <div class="span4">
            <div id="detailViewCarousel" class="carousel slide">
                <div class="displayStyle">
                    <ol class="carousel-indicators">
                        @php 
                        $step = count($product->photos)
                        @endphp

                        @for($i = 0; $i < $step; $i++)
                        <li data-target="#detailViewCarousel" data-slide-to="{{$i}}" class="{{ $i==0?'active':'' }}"></li>
                        @endfor
                    </ol>

                    <!--                    Bỏ ảnh theo id vào chỗ này-->
                    @php 
                    $step = 0
                    @endphp
                    <div class="carousel-inner">
                        @foreach($product->photos AS $photo)

                        <div class="item {{$step==0? 'active': ''}}"><img src="{{ $photo->path ? asset($photo->path): 'http://placehold.it/200x200' }}" alt="#" /></div>

                        @php
                        $step++
                        @endphp

                        @endforeach
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#detailViewCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#detailViewCarousel" data-slide="next">&rsaquo;</a>



                </div>
            </div>
        </div>

        <!--        Thông tin của sản phẩm-->
        <div class="span6">
            <div class="promoDetail">
                <h1>{!! $product->name !!}</h1>
                <br/>
                <ul>
                    <li>{{'Nhà cung cấp: '.$product->provider->name }}</li>
                    <li>{{'Trọng lượng: '.$product->weight.' gam'}}</li>
                    <li>{{'Giá gốc: '.number_format($product->price). ' VNĐ'}}</li>
                    <li>{{'Khuyến mãi : '.$product->promotion->value. ' %'}}</li>
                    <li>{{'Giá khuyến mãi: '.number_format($product->price*(1 - 0.01*$product->promotion->value)).' VND'}}</li>

                </ul>

                <form class="form-horizontal qtyFrm">
                    <div class="control-group">
                        <div class="">
                            <p>Số Lượng Đặt Mua</p>
                            <input type="number" class="span1" placeholder="SL: "> 
                        </div>
                    </div>
                </form>
                <a class="btn btn-warning addcart" data-id="{{$product->id}}"> THÊM VÀO GIỎ NGAY </a>
            </div>
            <br>

        </div>
    </div>
    <div class="span12">
        <hr class="soften"/>
        <p>
            {!!'<b>Mô tả sản phẩm</b>'. $product->description !!}
            Ngoài hình ảnh, họa tiết, một trang sức hoàn hảo phải phụ thuộc rất nhiều vào công nghệ chế tác.
            Những mẫu trang sức áp dụng kỹ thuật chế tác công nghệ cao sẽ đem đến một làn gió mới, hiện đại, tạo nên kiểu dáng mềm mại, uyển chuyển, làm nổi bật sự sang trọng cho người sở hữu.
            Với hàng loạt mẫu thiết kế trang sức tinh xảo được lấy cảm hứng chủ đạo từ vẻ đẹp nồng nàn, huyền bí và quyến rũ nhất của phái đẹp - một nửa tuyệt vời của thế giới.
        </p>
    </div>

    <!--Các sản phẩm có liên quan-->
</section>

<section id="orther-products">
    <h3 class="title"><span>Sản phẩm liên quan</span></h3>

    <div id="orther-products-Carousel" class="carousel slide">
        <!-- Dot Indicators -->
        @php 
        $step = 0
        @endphp

        <div class="carousel-inner">
            @foreach($related_products as $product)

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
                                    <a class="displayStyle" href="#"><img id="product-img-{{$product->id}}" src="{{ $product->thumbnail() ? asset($product->thumbnail()->path): 'http://placehold.it/200x200' }}"></a>
                                    <h5>{{ $product->name }}</h5>
                                    <p>
                                        <a class="btn btn-warning addcart" data-id="{{$product->id}}">Thêm vào <i class="icon-shopping-cart"></i></a> 
                                        <a class="btn" href="{{ route('product.index', $product->id)}}">Chi tiết</a>
                                    </p>
                                    <p><span class="price"><small>$</small>{{ $product->price }}</span></p>

                                </div>
                            </div>
                            @if ($step % 4 == 3 || $step == $related_products->count()-1) 
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




