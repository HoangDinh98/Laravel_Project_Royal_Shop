@extends ('layouts.ui')

@section('content')



<section>
    <h3 class="title"><span>ITEM DETAILS</span></h3>
    <div class="row">
        <div class="span6">
            
              

                    <!--                    quy định ảnh slide của sản phẩm-->
                     
                    <!-- Carousel items -->

                    <!--                    Bỏ ảnh theo id vào chỗ này-->
                    @foreach($product->photos AS $photo)
                    <div class="carousel-inner">
                        <div class="active item"><img src="{{ $photo->path ? asset($photo->path): 'http://placehold.it/200x200' }}" alt="#" /></div>
                        <div class="item"><img src="themes/images/carousel/carousel1.jpg" alt="#" /></div>
                    </div>
                    @endforeach

                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#detailViewCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#detailViewCarousel" data-slide="next">&rsaquo;</a>
             
           
        </div>

        <!--        Thông tin của sản phẩm-->
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
            <div class="">
                <strong>SHIPPING INFORMATIONS</strong>
                <p>If you are looking for upgrade your website for mobiles and tablets, Even if you do not have any website. </p> 
            </div>
        </div>

        <!--Các sản phẩm có liên quan-->
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
                </div>
            </div>
        </div>


    </div>
</section>
@endsection




