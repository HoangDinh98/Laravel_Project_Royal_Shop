<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Fire Dragon</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <li class="active treeview">
                <a href="index_Op.html">
                    <i class="fa fa-dashboard"></i> <span>Admin Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes blue"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.products.index') }}"><i class="fa fa-circle-o"></i> Tất cả sản phẩm</a></li>
                    <li><a href="{{ route('admin.products.create') }}"><i class="fa fa-circle-o"></i> Thêm sản phẩm</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks green"></i>
                    <span>Danh mục Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-circle-o"></i> Tất cả danh mục</a></li>
                    <li><a href="{{ route('admin.categories.create') }}"><i class="fa fa-circle-o"></i> Thêm danh mục</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-percent red"></i>
                    <span>Khuyến mãi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.promotions.index') }}"><i class="fa fa-circle-o"></i> Tất cả khuyến mãi</a></li>
                    <li><a href="{{ route('admin.promotions.create') }}"><i class="fa fa-circle-o"></i> Thêm khuyến mãi</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gg-circle cyan"></i>
                    <span>Nhà cung cấp</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.providers.index') }}"><i class="fa fa-circle-o"></i> Tất cả nhà cung cấp</a></li>
                    <li><a href="{{ route('admin.providers.create') }}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="">
                <a href="{{ route('admin.orders.index') }}">
                    <i class="fa fa-shopping-cart yellow"></i> <span>Đơn hàng</span>
                </a>
                <!-- <ul class="treeview-menu">
                        <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> </a></li>
                        <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                        <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul> -->
            </li>
               <li class="">
                <a href="{{ route('admin.comments.index') }}">
                    <i class="fa fa-comments yellow"></i> <span>Bình luận</span>
                </a>
                <!-- <ul class="treeview-menu">
                        <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> </a></li>
                        <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                        <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul> -->
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle purple"></i> <span>Tài khoản người dùng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-circle-o"></i> Tất cả tài khoản</a></li>
                    <li><a href="{{ route('admin.users.create') }}"><i class="fa fa-circle-o"></i> Thêm mới tài khoản</a></li>
                </ul>
            </li>
            <li class="">
                <a href="{{ route('admin.media.index') }}">
                    <i class="fa fa-picture-o maroon"></i> <span>Media</span>
                </a>

            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

