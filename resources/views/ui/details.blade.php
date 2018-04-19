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
                    <li>{!! 'Giá bán: <b style="font-size:20px; color: #DF1212">'.Helper::vn_currencyunit($product->price*(1 - 0.01*$product->promotion->value)).'</b>' !!}</li>

                </ul>
                <br>
                <br>
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
                <img src="{{Auth::user()->avatar() ? asset(Auth::user()->avatar()->path) : 'http://placehold.it/70x70'}}" width="10%" height="10%" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%;">
                {{Auth::user() ? Auth::user()->name : 'Uncategorized'}}
            </div>
            <div class=" row {{ $errors->has('content') ? 'has-error' : '' }}">
                <textarea id="text_content" cols="20" name="content"  placeholder="Nhập bình luận" value="{{ old('content') }}" ></textarea>
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
        @endif

        @if(count($comments)>0)
        <h4> Có {{count($comments)}} bình luận</h4>
        @foreach($comments as $comment)

        @if( $comment->status== 0 && $comment->user_id == Auth::user()->id)
        <div class="comment-content">
            @if($comment->user)                               
            <img src="{{ $comment->user->avatar()? asset($comment->user->avatar()->path) : 'http://placehold.it/70x70' }}" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%;">
            {!! $comment->user ? '<b>'.$comment->user->name.'</b><br>'.$comment->updated_at : 'Uncategorized' !!}
            <span style="margin-left: 20px; color: #909090">Đang chờ duyệt</span><br><br>
            @endif
            <p class="content_comment" >{{$comment->content}}</p>
            <a class="content_comment" href="{{ route('product.deletecomment',$comment->id) }}">
                Xóa Bình luận này
            </a>
        </div>
        @endif

        @if( $comment->status== 1)
        <div class="comment-content">
            @if($comment->user)                               
            <img src="{{ $comment->user->avatar()? asset($comment->user->avatar()->path) : 'http://placehold.it/70x70' }}" width="50px" height="50px" style="border-radius:50%;-moz-border-radius:50%;border-radius:50%;">
            {!! $comment->user ? '<b>'.$comment->user->name.'</b><br>'.$comment->updated_at : 'Uncategorized' !!}<br><br>
            @endif
            <p class="content_comment" >
                {{$comment->content}}
            </p>
            @if($comment->user_id == Auth::user()->id)
            <a class="content_comment" href="{{ route('product.deletecomment',$comment->id) }}">
                Xóa Bình luận này
            </a>
            @endif
        </div>
        @endif
        @endforeach
        
        @endif
    </div>

</section>

<!--Các sản phẩm có liên quan-->



<section class="product-show">
    <h3 class="title"><span>Sản phẩm liên quan</span></h3>

    <div id="slide-product-related" class="carousel slide">
        @php 
        $step = 0
        @endphp
        <div class="carousel-inner">
            @foreach($related_products as $product)

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

            @if ($step % 4 == 3 || $step == $related_products->count()-1) 
            {!!  Helper::product_group_end() !!}
            @endif
            
            @php
            $step++
            @endphp
            
            @endforeach
        </div>
        @if($step > 4) 
        <a class="left carousel-control" href="#slide-product-related" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#slide-product-related" data-slide="next">›</a>
        @endif
    </div>
</section>

@include('ui.sticky_cart')

@include('ui.notify_modal')
@include('ui.error_modal')

@endsection



