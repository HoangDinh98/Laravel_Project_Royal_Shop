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
                    <li>{{'Giá gốc: '.Helper::vn_currencyunit($product->price) }}</li>
                    <li>{{'Khuyến mãi : '.$product->promotion->value. ' %'}}</li>
                    <li>{{'Giá khuyến mãi: '.Helper::vn_currencyunit($product->price*(1 - 0.01*$product->promotion->value)) }}</li>

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
        </p></br>
    </div>
</section>

<!--Comment-->
<section>
    <div>

        @if(Auth::check())
        <h4>Viết bình luận
            <span class="glyphicon glyphicon-pencil"></span>
        </h4>
        <br>
        <form action="{{ route('product.addcomment', $product->id) }}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">                         
            <div id="img_avatar">
                <img src="{{ asset(Auth::user()->avatar()->path) }}" width="10%" height="10%" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%;">
                {{Auth::user() ? Auth::user()->name : 'Uncategorized'}}
            </div>
            <div class=" row {{ $errors->has('content') ? 'has-error' : '' }}">
                <textarea id="text_content" name="content" cols="20"  placeholder="Nhập bình luận" value="{{ old('content') }}" ></textarea>
                <span class="text-danger">{{ $errors->first('content') }}</span>
            </div> 


            <button type="submit" class="btn btn-primary" style="margin-left: 2%;">Gửi</button>

        </form> 
        @else
        <h3>Đăng nhập để bình luận</h3>
        @endif
    </div>


    <div id ="comment">
        @if(count($comments) ==0)
        <h4>Không có bình luận nào </h4>
        @else
        @if($comments)
        <h4> Có {{count($comments)}} bình luận</h4>
        @foreach($comments as $comment)
        @if($comment -> status == 0)
        <script language="javascript">
            alert('Bình luận của bạn đang được duyệt');
        </script>
        @elseif( $comment-> status == 1)
        <div>
            @if($comment->user)                               
            <img src="{{ asset($comment->user->avatar()->path) }}" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%;">
            {{$comment->user ? $comment->user->name : 'Uncategorized'}}<br>
            @endif
            <p class="content_comment" >{{$comment->content}}</p>
            <a class="content_comment" href="product.deletecomment  {{ $comment->id}}">Xóa</a>
            <p class="content_comment"><span class="glyphicon glyphicon-time"></span>{{$comment->created_at}} {{$comment->update_at }}</p>
        </div>
        @else
        <h4> Nội dung không phù hợp</h4>
        @endif
        @endforeach
        @endif
        @endif
    </div>

</section>

<!--Các sản phẩm có liên quan-->
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
                                    <span class="priceTag">
                                        <small class="oldPrice">{{ Helper::vn_currencyunit($product->price) }}</small>
                                        <span class="newPrice">{{ Helper::vn_currencyunit($product->price) }}</span>
                                    </span>
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



           