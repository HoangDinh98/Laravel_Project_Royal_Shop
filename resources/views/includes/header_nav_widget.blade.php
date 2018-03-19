<div class="nav-collapse">
    <div id="nav" style="display: block; clear: both">
        <ul id="topMenu" class="nav nav-custom">
            <li class="active"><a href="#">Home</a></li>
            @foreach ( $categories as $key =>$category)
            <li class="dropdown-submenu"><a href="#">{{ $category->parent() .$category->parent_id }}</a>
                @if ( count($category->children))
                <ul class="dropdown-menu">
                    @foreach($category->children AS $cate_child)
                    <li class=""><a href="#">{{$cate_child->name}}</a></li>
                    @endforeach
                </ul>
                @endif
            </li>   
            @endforeach
        </ul>
    </div>
</div>

<div>
    <!--{{ print_r($categories)}}-->
</div>
