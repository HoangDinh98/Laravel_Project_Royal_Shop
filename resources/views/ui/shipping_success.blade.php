

<script type="text/javascript">
    $(document).ready(function() {
    $.Notifier("Royal Shop - Thông báo",
            "Bạn đã đặt hàng <b>thành công</b><br>Cảm ơn bạn đã mua hàng của Shop<br>" + 
                    "<b>Đơn hàng của bạn sẽ được xử lý và gửi đi trong thời gian sớm nhất</b>",
            "success",
    {
    vertical_align: "center",
            rtl: false,
            has_icon: true,
            image: '',
            btns: [
            {
            label: "OK",
                    type: "success",
                    onClick: function () {
                    }
            }
            ],
            callback: function () {
            }
    });
    });
</script>

