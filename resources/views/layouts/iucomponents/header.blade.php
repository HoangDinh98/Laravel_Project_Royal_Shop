@if (session('status'))
<script>
    alert("{{session('status')}}");
</script>
@endif

<header class="header">
    <div class="container">
        <div class="row">
            <div class="offset6 span6 right-align loginArea">

                @if (Auth::check())
                <div class = "btn-group" >
                    <a class = "btn btn-mini dropdown-toggle" data-toggle ="dropdown" href = "#" >{{ Auth::user()->name }}</a>
                    <ul class = "dropdown-menu" >
                        <li><a href="">Trang cá nhân</a></li>
                        @if(Auth::user()->role_id == 1)
                        <li><a href="{{ route('admin.categories.index') }}" target="_blank">Quan trị trang</a></li>
                        @endif
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <span id="user_btn">
                    <a id="user_menu" href="#login" role="button" data-toggle="modal"><span class="btn btn-mini"> Login  </span></a>
                </span>
                <a href="{{ route('user.register') }}"><span class="btn btn-mini btn-success"> Đăng ký  </span></a>
                @endif

            </div>
        </div>

        <!-- Login Block -->
        <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
            <div class="modal-header">
                <button id="btn_close" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>Royal Shop : Đăng nhập</h3>
            </div>
            <div class="modal-body">
                <form class="loginFrm">
                    <div id="email_box" class="control-group input-box" >								
                        <input type="email" id="email" placeholder="Email" required autofocus>
                        <span id="email_Err" class="text-danger">{{ $errors->first('emailErr') }}</span>
                    </div>

                    <div id="pass_box" class="control-group input-box">
                        <input type="password" id="password" placeholder="Mật khẩu">
                        <span id="pass_Err" class="text-danger">{{ $errors->first('passwordErr') }}</span>
                    </div>
                    <div class="control-group">
                        <label class="checkbox">
                            <input type="checkbox"> Ghi nhớ tôi
                        </label>
                    </div>
                    <div class="control-group">
                        <button type="button" class="btn btn-success btn_login">Đăng nhập</button>
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
                    </div>
                </form>		

            </div>
        </div>
        <div class="navbar">
            <div class="navbar-inner">
                <a class="brand" href="index.php"><img src="{{ asset('UI/themes/images/new_logo.png') }}" alt="Bootsshop"></a>
                <div class="search-box">
                    <form action="{{ route('home.search') }}" class="search-form " method="GET"style="padding-top:5px;">
                        <input class="" type="text" name="keyword" placeholder="Nhập từ khóa" style="padding:11px 4px;"value="{{ old('keyword') }}">
                        <button type="submit" class="btn btn-warning btn-large search-box-logo">
                            <i class="icon-search"></i>
                        </button>
                        <div>{{ $errors->has('keyword') ? '' : '' }}</div>
                        <span class="text-danger">{!! $errors->first('keyword') !!}</span>
                    </form>
                </div>


                @include('includes.nav')

                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
    </div>
</header>
