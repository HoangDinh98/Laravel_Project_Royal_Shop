<section id="mainCarousel">
    <div class="displayStyle">
        <div id="myCarousel" class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <div class="span12">
                            <img src="{{ asset('/images/slideshow/banner1.png') }}" alt="#" />
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="span12">
                            <img src="{{ asset('/images/slideshow/banner2.png') }}" alt="#" />
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="span12">
                            <img src="{{ asset('/images/slideshow/banner4.png') }}" alt="#" />
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
        </div>
    </div>
</section>

