@extends ('layouts.ui')

@section('content')

@include('layouts.iucomponents.carousel')

<section>
    <h3 class="title"><span>Các Sản Phẩm Liên Quan</span></h3>
    <div class="row">
        <div class="span6">
            <div id="detailViewCarousel" class="carousel slide">
                <div class="displayStyle">
<!--                    <ol class="carousel-indicators">
                        <li data-target="#detailViewCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#detailViewCarousel" data-slide-to="1"></li>
                        <li data-target="#detailViewCarousel" data-slide-to="2"></li>
                        <li data-target="#detailViewCarousel" data-slide-to="3"></li>
                        <li data-target="#detailViewCarousel" data-slide-to="4"></li>
                        <li data-target="#detailViewCarousel" data-slide-to="5"></li>
                    </ol> -->
                    <!-- Carousel items -->
<!--                    <div class="carousel-inner">
                        <div class="active item"><img src="themes/images/carousel/carousel2.jpg" alt="#" /></div>
                        <div class="item"><img src="themes/images/carousel/carousel1.jpg" alt="#" /></div>
                        <div class="item"><img src="themes/images/carousel/carousel3.jpg" alt="#" /></div>
                        <div class="item"><img src="themes/images/carousel/carousel4.jpg" alt="#" /></div>
                        <div class="item"><img src="themes/images/carousel/carousel5.jpg" alt="#" /></div>
                        <div class="item"><img src="themes/images/carousel/3.jpg" alt="#" /></div>
                    </div>-->
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#detailViewCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#detailViewCarousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
        </div>

        <div class="span6">
            <div class="promoDetail">
                <h1>Ladies Pullover Doll Collar  <span>3/4 Sleeves Chiffon Blouse Blue M</span></h1>
                <p>Sourcingmap</p>
                <br/>
                <ul>
                    <li>Size: Medium, Colour: Blue</li>
                    <li>In stock. Dispatched from and sold by sourcingmap.</li>
                    <li>US Size : 8;UK Size : 10;EU Size : 38</li>
                    <li>Bust Girth : 36 inches;Waist Girth : 28 inches;Hip Girth : 38.5 inches</li>
                    <li>Shoulder Width: 15.7inches, Sleeve Length: 16inches, Total Length: 22.8inches, Net Weight: 82g</li>
                </ul>
                <h3><small class="oldPrice">$18.00</small>NEW Price: $9.00 </h3>
                <p><i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star"></i> <i class="icon-star-empty"></i></p>
                <form class="form-horizontal qtyFrm">
                    <div class="control-group">
                        <div class="">
                            <input type="number" class="span1" placeholder="Qty."> 
                        </div>
                    </div>
                </form>
                <a class="btn btn-warning" href="checkout.php"> ADD TO CART NOW </a>
            </div>
            <br>
         
    </div>

    <h3 class="title"><span>Related products</span></h3>
        <div class="span2">
            <div class="carousel slide">
                <div class="carousel-inner">
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma3.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item active">
                        <a href="details.php"><img src="themes/images/clothes/sma2.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma1.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma6.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma5.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma4.jpg" alt="#">
                            View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="span2">
            <div class="carousel slide">
                <div class="carousel-inner">
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma2.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item active">
                        <a href="details.php"><img src="themes/images/clothes/sma1.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma6.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma5.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma4.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma3.jpg" alt="#">
                            View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="span2">
            <div class="carousel slide">
                <div class="carousel-inner">
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma1.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item active">
                        <a href="details.php"><img src="themes/images/clothes/sma6.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma5.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma4.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma3.jpg" alt="#">
                            View Details</a>
                    </div>
                    <div class="item">
                        <a href="details.php"><img src="themes/images/clothes/sma2.jpg" alt="#">
                            View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection




