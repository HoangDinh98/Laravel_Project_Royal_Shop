<div class="nav-collapse">
    <div id="nav" style="display: block; clear: both">
        <ul id="topMenu" class="nav nav-custom">
            <li class="active"><a href="{{ route('home.index')}}">Home</a></li>
            @foreach ( $categories as $key => $category)
            <li class="dropdown-submenu"><a href="#">{{ $category->name }}</a>
                @if ( count($category->children))
                <ul class="dropdown-menu">
                    @foreach($category->children AS $cate_child)
                        @if($cate_child->is_active == 1)
                            <li class=""><a href="{{ route('home.getProByCate', $cate_child->id) }}">{{$cate_child->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
                @endif
            </li>   
            @endforeach
            <li class="dropdown-submenu" ><a href="#">Giá</a>
                <ul class="dropdown-menu" >
                    <li class=""><a href="{{ route('home.getProByPrice', '_1') }}">Dưới 1 triệu VNĐ</a></li>
                    <li class=""><a href="{{ route('home.getProByPrice', '1-3') }}">Từ 1 triệu đến 3 triệu VNĐ</a></li>
                    <li class=""><a href="{{ route('home.getProByPrice', '3-6') }}">Từ 3 triệu đến 6 triệu VNĐ</a></li>
                    <li class=""><a href="{{ route('home.getProByPrice', '6-10') }}">Từ 6 triệu đến 10 triệu VNĐ</a></li>
                    <li class=""><a href="{{ route('home.getProByPrice', '+10') }}">Từ 10 triệu VNĐ trở lên</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div>
    <!--{{ print_r($categories)}}-->
</div>


