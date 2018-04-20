<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Royal shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- styles -->
        <link rel="stylesheet/less" type="text/css" href="{{ asset('UI/themes/less/bootstrap.less') }} ">
        <!--<link rel="stylesheet/less" type="text/css" href="{{ asset('UI/bootstrap/css/bootstrap.css') }} ">-->
        <script src="{{ asset('UI/themes/js/less/less.js') }}" type="text/javascript"></script>

        <!-- favicon-icons -->
        <!--<link rel="shortcut icon" href="{{ asset('UI/themes/images/favicon.ico') }}">-->
        <link rel="shortcut icon" href="{{ asset('UI/themes/images/SubLogo.png') }}">
        <link rel="stylesheet" href="{{asset('Admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    </head>
    <body>

        <div style="display: none">
            <link rel="stylesheet" href="{{asset('css/uistyle.css')}}">
            <link rel="stylesheet" href="{{asset('css/hover_animation.css')}}">
            <link rel="stylesheet" href="{{asset('css/cssxuyen.css')}}">
        </div>
        @include('layouts.iucomponents.header')
        <!-- ======================================================================================================================== -->
        <div id="maincontainer" class="container">

            <!--Put content in here-->
            <!--**************************************-->
            @yield('content')
            <!--**************************************-->
            <!--**************************************-->

            <section id="scn">
                <h3 class="title"><span>Thông tin website</span></h3>
                <div class="row">
                    <div class="span4">
                        <h1><i class="icon-heart"></i> </h1>
                        <h4>Về chúng tôi</h4>	
                        <p>Sở hữu những thiết kế độc đáo, khác biệt mang hơi thở của thời trang thế giới,Royal luôn tự tin là thương hiệu trang sức dẫn đầu xu hướng tại Việt Nam. 
                            Với sự tỉ mỉ, tinh xảo thể hiện trên từng chi tiết, từng giác cắt của sản phẩm, sắc trắng thuần khiết và độ bền vĩnh cửu của những tuyệt tác trang sức Bạch Kim kết hợp với Kim Cương tự nhiên đến từ Royal sẽ tôn vinh vẻ đẹp lịch lãm, thời thượng, phong cách cho mỗi quý ngài và nét thanh lịch, quý phái, sang trọng cho mỗi quý cô xinh đẹp, từ đó khẳng định cái tôi thời trang và đẳng cấp riêng biệt của họ.</p>
                        <p> </p>
                    </div>
                    <div class="span4">
                        <div class="seperator">
                            <h1><i class="icon-truck iconShipping"></i> </h1>		
                            <h4>Phương thức thanh toán</h4>		
                            <p>Nhân viên kinh doanh sẽ liên lạc với Quý khách để nhận thông tin địa chỉ thanh toán..</p>

                        </div>
                    </div>
                    <div class="span4">
                        <h1><i class="icon-comments-alt"></i> </h1>
                        <h4>Liên hệ với chúng tôi</h4>
                        <p class="findUs">
                            <a href="#"><i class="icon-facebook"></i> </a>
                            <a href="#"><i class="icon-twitter"></i> </a>
                            <a href="#"><i class="icon-google-plus"></i> </a>
                        </p>
                        <!--                        <h4>Subscribe us</h4>	-->
                        <!--                        <div class="caption">
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
                                                </div>-->
                    </div>
                </div>
            </section>
        </div>
        <!-- Footer
        ================================================== -->
        <footer class="footer">
            <div class="container">
                <!--                <h5>Accepted Payment Methods </h5>
                                <p><a href="#"><img src="{{ asset('UI/themes/images/payment_methods.png') }}" alt="payment methods" /></a></p>
                                <hr class="soften"/>
                                <div class="footerMenu">
                                    <a href="register.php"> REGISTRATION</a> | 
                                    <a href="about_us.php"> ABOUT US</a> | 
                                    <a  href="topology.php" >TOPOLOGY</a> | 
                                    <a href="contact_us.php">CONTACT </a>-->
                <p class="pull-right"> &copy; 2013 Bản quyền thuộc về Royal Shop. </p>
            </div>
        </div>
    </footer>
    <span id="toTop" style="display: none;"><span style="font-size: 30px;"><i class="fa fa-arrow-up"></i></span></span>

    <!--  javascript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('UI/themes/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('UI/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('UI/themes/js/smart.js') }}"></script>

    <link href="{{asset('confirm-form/notifier.style.css')}}" rel="stylesheet">
    <script src="{{asset('confirm-form/notifier.script.js')}}"></script>
    <script src="{{asset('js/uijs.js')}}"></script>
    <script src="{{asset('js/homejs.js')}}"></script>
    @yield('extraNotify')
</body>

<!--    @if (session('status'))
    <script>
        $('#login').modal('show');
    </script>
    session()->forget('status')
    @endif-->
</html>