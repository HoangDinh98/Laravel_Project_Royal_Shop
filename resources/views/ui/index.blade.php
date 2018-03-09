@extends ('layouts.ui')

@section('content')

@include('layouts.iucomponents.carousel')

<section id="featuredProduct">
    <h3 class="title"><span>New Products</span></h3>
    <div id="myCarouselOne" class="carousel slide">
        <!-- Dot Indicators -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="row">
                    <div class="span3">
                        <div class="well well-small">
                            <span class="newTag"></span>
                            <span class="priceTag">
                                <small class="oldPrice"><small>$</small>440.00</small>
                                <span class="newPrice"><small>$</small>400.00</span>
                            </span>
                            <a class="displayStyle" href="#"><img src="{{ asset('UI/themes/images/clothes/1.jpg') }}" alt="#"/></a>
                            <h5>Clothings</h5>
                            <p>
                                <a class="btn btn-warning" href="#" > Add to <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="details.php">view details</a>
                            </p>
                            <p><span class="price"><small>$</small>400.00</span></p>

                        </div>
                    </div>
                    <div class="span3">
                        <div class="well well-small">

                            <span class="priceTag">
                                <small class="oldPrice"><small>$</small>40.00</small>
                                <span class="newPrice"><small>$</small>20.00</span>
                            </span>
                            <a class="displayStyle" href="#"><img src="{{ asset('UI/themes/images/clothes/2.jpg') }}"  alt="#"/></a>
                            <h5>Clothings</h5>
                            <p>
                                <a class="btn btn-success" href="#" > Add to <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="details.php">view details</a>
                            </p>
                            <p>
                                <span class="price"><small>$</small>20.00</span>
                            </p>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="well well-small">
                            <span class="priceTag">
                                <small class="oldPrice"><small>$</small>1.00</small>
                                <span class="newPrice"><small>$</small>25.00</span>
                            </span>
                            <a class="displayStyle" href="#"><img src="{{ asset('UI/themes/images/clothes/3.jpg') }}" alt="#"/></a>
                            <h5>Clothings </h5>
                            <p>
                                <a class="btn btn-danger" href="#" > Add to <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="details.php">view details</a>
                            </p>
                            <p>
                                <span class="price"><small>$</small>25.00</span>
                            </p>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="well well-small">
                            <span class="priceTag">
                                <small class="oldPrice"><small>$</small>300.00</small>
                                <span class="newPrice"><small>$</small>250.00</span>
                            </span>
                            <span class="saleTag tagRight"></span>
                            <a class="displayStyle" href="#"><img src="{{ asset('UI/themes/images/clothes/4.jpg') }}" alt="#"/></a>
                            <h5>Clothings</h5>
                            <p>
                                <a class="btn btn-primary" href="#" > Add to <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="details.php">view details</a>
                            </p>
                            <p>
                                <span class="price"><small>$</small>250.00</span>
                            </p>
                        </div>
                    </div>			
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="span3">
                        <div class="well well-small">
                            <span class="newTag"></span>
                            <span class="priceTag">
                                <small class="oldPrice"><small>$</small>440.00</small>
                                <span class="newPrice"><small>$</small>400.00</span>
                            </span>
                            <a class="displayStyle" href="#"><img src="{{ asset('UI/themes/images/clothes/5.jpg') }}" alt="#"/></a>
                            <h5>Clothings</h5>
                            <p>
                                <a class="btn btn-warning" href="#" > Add to <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="details.php">view details</a>
                            </p>
                            <p><span class="price"><small>$</small>400.00</span></p>

                        </div>
                    </div>
                    <div class="span3">
                        <div class="well well-small">
                            <span class="priceTag">
                                <small class="oldPrice"><small>$</small>40.00</small>
                                <span class="newPrice"><small>$</small>20.00</span>
                            </span>
                            <a class="displayStyle" href="#"><img src="{{ asset('UI/themes/images/clothes/6.jpg') }}"  alt="#"/></a>
                            <h5>Clothings</h5>
                            <p>
                                <a class="btn btn-success" href="#" > Add to <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="details.php">view details</a>
                            </p>
                            <p>
                                <span class="price"><small>$</small>20.00</span>
                            </p>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="well well-small">
                            <span class="priceTag">
                                <small class="oldPrice"><small>$</small>1.00</small>
                                <span class="newPrice"><small>$</small>25.00</span>
                            </span>
                            <a class="displayStyle" href="#"><img src="{{ asset('UI/themes/images/clothes/7.jpg') }}" alt="#"/></a>
                            <h5>Clothings </h5>
                            <p>
                                <a class="btn btn-danger" href="#" > Add to <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="details.php">view details</a>
                            </p>
                            <p>
                                <span class="price"><small>$</small>25.00</span>
                            </p>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="well well-small">
                            <span class="priceTag">
                                <small class="oldPrice"><small>$</small>300.00</small>
                                <span class="newPrice"><small>$</small>250.00</span>
                            </span>
                            <span class="saleTag tagRight"></span>
                            <a class="displayStyle" href="#"><img src="{{ asset('UI/themes/images/clothes/8.jpg') }}" alt="#"/></a>
                            <h5>Clothings</h5>
                            <p>
                                <a class="btn btn-primary" href="#" > Add to <i class="icon-shopping-cart"></i></a> 
                                <a class="btn" href="details.php">view details</a>
                            </p>
                            <p>
                                <span class="price"><small>$</small>250.00</span>
                            </p>
                        </div>
                    </div>			
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarouselOne" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#myCarouselOne" data-slide="next">›</a>
    </div>
</section>

@endsection