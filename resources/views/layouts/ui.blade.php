<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Royal shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- styles -->
        <link rel="stylesheet/less" type="text/css" href="{{ asset('UI/themes/less/bootstrap.less') }} ">
        <script src="themes/js/less/less.js" type="text/javascript"></script>

        <!-- favicon-icons -->
        <link rel="shortcut icon" href="{{ asset('UI/themes/images/favicon.ico') }}">
    </head>
    <body>
        <!-- Facebook script -->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
        </script>

        @include('layouts.iucomponents.header')
        <!-- ======================================================================================================================== -->
        <div class="container">

            <!--Put content in here-->
            <!--**************************************-->
            @yield('content')
            <!--**************************************-->
            <!--**************************************-->


            <section id="scn">
                <h3 class="title"><span>WELCOME !</span></h3>
                <div class="row">
                    <div class="span4">
                        <h1><i class="icon-heart"></i> </h1>
                        <h4>Who we are?</h4>	
                        <p>Bootstrapapge.com helping you to design you a professional website.Converting PSD to XHTML & CSS. Even more in Graphic Design such as Coverpage, Logo etc. </p>
                        <p>We are helping you to design you a professional website.Converting PSD to XHTML & CSS. Even more in Graphic Design such as Coverpage </p>
                    </div>
                    <div class="span4">
                        <div class="seperator">
                            <h1><i class="icon-truck iconShipping"></i> </h1>		
                            <h4>Shipping Information</h4>		
                            <p>If you are looking for upgrade your website for mobiles and tablets, Even if you do not have any website. Remember! bootsttrappage.com will come to make your dreams true.</p>
                            <p class="shipping"><span class="shippingCall">Free Shipping On Orders Over $400</span></p>
                        </div>
                    </div>
                    <div class="span4">
                        <h1><i class="icon-comments-alt"></i> </h1>
                        <h4>Find us in</h4>
                        <p class="findUs">
                            <a href="#"><i class="icon-facebook"></i> </a>
                            <a href="#"><i class="icon-twitter"></i> </a>
                            <a href="#"><i class="icon-google-plus"></i> </a>
                        </p>
                        <h4>Subscribe us</h4>	
                        <div class="caption">
                            <p> Subscribe us for our newsletters</p>
                            <form class="">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" id="userEmail" placeholder="eg: info:bootstrappage.com">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn btn-success ">subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <hr class="soften"/>
            <section id="client">
                <h3 class="title"><span>BRANDS</span></h3>
                <div id="clients" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="span12">
                                <img src="{{ asset('UI/themes/images/clients/1.png') }}" alt="#" />
                                <img src="{{ asset('UI/themes/images/clients/2.png') }}" alt="#" />
                                <img src="{{ asset('UI/themes/images/clients/3.png') }}" alt="#" />
                                <img src="{{ asset('UI/themes/images/clients/4.png') }}" alt="#" />
                                <img src="{{ asset('UI/themes/images/clients/5.png') }}" alt="#" />
                                <img src="{{ asset('UI/themes/images/clients/6.png') }}" alt="#" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="span12">
                                <img src="{{ asset('UI/themes/images/clients/1.png') }}" alt="#" />
                                <img src="{{ asset('UI/themes/images/clients/8.png') }}" alt="#" />
                                <img src="{{ asset('UI/themes/images/clients/9.png') }}" alt="#" />
                                <img src="{{ asset('UI/themes/images/clients/10.png') }}" alt="#" />
                                <img src="{{ asset('UI/themes/images/clients/11.png') }}" alt="#" />
                                <img src="{{ asset('UI/themes/images/clients/12.png') }}" alt="#" />
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#clients" data-slide="prev">‹</a>
                    <a class="right carousel-control" href="#clients" data-slide="next">›</a>
                </div>
            </section>
        </div>
        <!-- Footer
        ================================================== -->
        <footer class="footer">
            <div class="container">
                <h5>Accepted Payment Methods </h5>
                <p><a href="#"><img src="{{ asset('UI/themes/images/payment_methods.png" alt="payment methods') }}"/></a></p>
                <hr class="soften"/>
                <div class="footerMenu">
                    <a href="register.php"> REGISTRATION</a> | 
                    <a href="about_us.php"> ABOUT US</a> | 
                    <a  href="topology.php" >TOPOLOGY</a> | 
                    <a href="contact_us.php">CONTACT </a>
                    <p class="pull-right"><a href="#">Terms and condition.php</a> &copy; Copyright 2013 Sell Anything. </p>
                </div>
            </div>
        </footer>
        <span id="toTop" style="display: none;"><span><i class="icon-angle-up"></i></span></span>

        <!--  javascript
            ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{ asset('UI/themes/js/jquery-1.8.3.min.js') }}"></script>
        <script src="{{ asset('UI/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('UI/themes/js/smart.js') }}"></script>

        <link href="{{asset('confirm-form/notifier.style.css')}}" rel="stylesheet">
        <script src="{{asset('confirm-form/notifier.script.js')}}"></script>
    </body>
</html>