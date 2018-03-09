<header class="header">
    <h1 class="seo">Welcome to sell anything! :<em class="blink"> 50% </em> discount is available for more than <span class="blink"> 400 </span> items.</h1>
    <div class="container">
        <div class="row">
            <div class="offset6 span6 right-align loginArea">
                <a href="#login" role="button" data-toggle="modal"><span class="btn btn-mini"> Login  </span></a> 
                <a href="register.php"><span class="btn btn-mini btn-success"> Register  </span></a> 
                <a href="checkout.php"><span class="btn btn-mini btn-danger"> Cart [2] </span></a> 
            </div>
        </div>

        <!-- Login Block -->
        <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>Sell Anythings : Login Block</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal loginFrm">
                    <div class="control-group">								
                        <input type="text" id="inputEmail" placeholder="Email">
                    </div>
                    <div class="control-group">
                        <input type="password" id="inputPassword" placeholder="Password">
                    </div>
                    <div class="control-group">
                        <label class="checkbox">
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                </form>		
                <button type="submit" class="btn btn-success">Sign in</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>

        <div class="navbar">
            <div class="navbar-inner">
                <a class="brand" href="index.php"><img src="{{ asset('UI/themes/images/new_logo.png') }}" alt="Bootsshop"></a>
                <div class="nav-collapse">
                    <ul id="topMenu" class="nav pull-right">
                        <li class="">
                            <form class="form-inline navbar-search" method="post" action="products.php" style="padding-top:5px;">
                                <select class="span3" style="padding:11px 4px; height:auto">
                                    <option>All</option>
                                    <option>Clothes </option>
                                    <option>Women's Wear </option>
                                    <option>Men's Wear </option>
                                    <option>Kids Wear </option>
                                </select> 
                                <input class="span4" type="text" placeholder="eg. T-shirt" style="padding:11px 4px;">
                                <button type="submit" class="btn btn-warning btn-large" style="margin-top:0"> GO </button>
                            </form>
                        </li>
                    </ul>
                </div>
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
    </div>
</header>
