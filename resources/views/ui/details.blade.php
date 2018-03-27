@extends ('layouts.ui')

@section('content')



<section>
    <h3 class="title"><span>CHI TIẾT SẢN PHẨM</span></h3>
    <div class="row">
        <div class="span6">
            <div id="detailViewCarousel" class="carousel slide">
                <div class="displayStyle">
                    <ol class="carousel-indicators">
                        <li data-target="#detailViewCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#detailViewCarousel" data-slide-to="1"></li>
                        <li data-target="#detailViewCarousel" data-slide-to="2"></li>
                        <li data-target="#detailViewCarousel" data-slide-to="3"></li>
                        <li data-target="#detailViewCarousel" data-slide-to="4"></li>
                        <li data-target="#detailViewCarousel" data-slide-to="5"></li>
                    </ol>




                    <!--                    quy định ảnh slide của sản phẩm-->

                    <!-- Carousel items -->

                    <!--                    Bỏ ảnh theo id vào chỗ này-->
                    @foreach($product->photos AS $photo)
                    <div class="carousel-inner">
                        <div class="active item"><img src="{{ $photo->path ? asset($photo->path): 'http://placehold.it/200x200' }}" alt="#" />
                        </div>
                        <div class="item"><img src="{{ $photo->path ? asset($photo->path): 'http://placehold.it/200x200' }}" alt="#" /></div>
                        <div class="item"><img src="{{ $photo->path ? asset($photo->path): 'http://placehold.it/200x200' }}" alt="#" /></div>
                        <div class="item"><img src="{{ $photo->path ? asset($photo->path): 'http://placehold.it/200x200' }}" alt="#" /></div>
                        <div class="item"><img src="{{ $photo->path ? asset($photo->path): 'http://placehold.it/200x200' }}" alt="#" /></div>
                        <div class="item"><img src="{{ $photo->path ? asset($photo->path): 'http://placehold.it/200x200' }}" alt="#" /></div>
                    </div>

                    @endforeach

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
                            <li>{{'Giá gốc: '.$product->price. ' VNĐ'}}</li>
                            <li>{{'Khuyến mãi : '.$product->promotion->value. ' %'}}</li>
                            <li>{{'Giá khuyến mãi: '.$product->price*(1 - 0.01*$product->promotion->value).' VND'}}</li>

                        </ul>
                        <p><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-empty"></i></p>
                        <form class="form-horizontal qtyFrm">
                            <div class="control-group">
                                <div class="">
                                    <input type="number" class="span1" placeholder="Qty."> 
                                </div>
                            </div>
                        </form>
                        <a class="btn btn-warning" href="checkout.php"> THÊM VÀO GIỎ NGAY </a>
                    </div>
                    <br>

                </div>
                <div class="span12">
                    <hr class="soften"/>
                    <p>
                        {!! $product->description !!}
                        Ngoài hình ảnh, họa tiết, một trang sức hoàn hảo phải phụ thuộc rất nhiều vào công nghệ chế tác.
                        Những mẫu trang sức áp dụng kỹ thuật chế tác công nghệ cao sẽ đem đến một làn gió mới, hiện đại, tạo nên kiểu dáng mềm mại, uyển chuyển, làm nổi bật sự sang trọng cho người sở hữu.
                        Với hàng loạt mẫu thiết kế trang sức tinh xảo được lấy cảm hứng chủ đạo từ vẻ đẹp nồng nàn, huyền bí và quyến rũ nhất của phái đẹp - một nửa tuyệt vời của thế giới.
                    </p>
                </div>

                <!--Các sản phẩm có liên quan-->
                <h3 class="title"><span>CÁC SẢN PHẨM LIÊN QUAN</span></h3>
                <div class="span2">
                    <div class="carousel slide">
                        <div class="carousel-inner">
                            <div class="item">
                                <div class="item"><img src="themes/images/carousel/carousel1.jpg" alt="#" /></div>
                            </div>
                            <div class="item active">
                                <div class="item"><img src="themes/images/carousel/carousel1.jpg" alt="#" /></div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            </section>
            @endsection




