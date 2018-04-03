<div id="notify-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="false" >
    <div class="modal-header">
        <a href="#notify-modal" id="model-show" style="display: none" role="button" data-toggle="modal"></a>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="notify-title">1 sản phẩm đã được thêm vào giỏ hàng của bạn</h4>
    </div>
    <div class="modal-body">
        <div class="row-fluid" id="notify-content">
            <div class="span6 product-info">
                <div class="image">
                    <img id="product-img-modal" src="http://placehold.it/70x70">
                </div>
                <div class="name-box">
                    <p id="product-name-modal">Test</p>
                    <p><span id="product-price-modal">1200000 đ</span></p>    
                </div>

            </div>
            <div class="span6 cart-info">
                <div>Giỏ hàng của bạn có <b id="product-totalQty-modal">6</b> sản phẩm <a href="{{ route('cart') }}"><i class="fa fa-edit"></i></a></div>
                <div class="temp-money">Tạm tính: <span id="temp-money">1200000 đ</span></div>
                <div class="total-money">Tổng tiền: <span id="total-money">1200000 đ</span></div>
            </div>
        </div>
        <div class="action">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tiếp tục mua hàng</button>
            <a class="btn btn-success" href="{{ route('checkout') }}">Thanh Toán</a>
        </div>
    </div>
</div>