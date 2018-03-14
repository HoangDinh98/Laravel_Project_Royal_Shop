     <div class="nav-collapse">
                    <div id="nav" style="display: block; clear: both">
                        <ul id="topMenu" class="nav nav-custom">
                            <li class="active"><a href="#">Home</a></li>
                            @foreach ( $categories as $key =>$category)
                            <li class="dropdown-submenu"><a href="#">{{ $category->name }}</a>
                                <ul class="dropdown-menu">
                                    <li class=""><a href="#">Link</a></li>
                                    <li class=""><a href="#">Link</a></li>
                                    <li class=""><a href="#">Link</a></li>
                                    <li class="dropdown-submenu"><a href="#">Link</a>
                                </ul>
                            </li>   
                            @endforeach
                        </ul>
                    </div>
                </div>
