<a class="stickcart" href="{{ route('ui.cart')}}">
    <div>
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    </div>
    <span class="p-num" id="p-num">
        <p>
            {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}
        </p>
    </span>
    <!--<strong id="qty-p">0 sản phẩm</strong>-->
</a>