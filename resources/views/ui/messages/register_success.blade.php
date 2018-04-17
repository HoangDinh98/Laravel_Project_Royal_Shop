<script type="text/javascript">
    $(document).ready(function() {
    $.Notifier("Royal Shop - Thông báo",
            "Bạn đã đăng ký tài khoản <b>thành công</b><br>" + 
                    "Chúng tôi đã gửi 1 email xác nhận đến địa chỉ <b> {!! session('registerStatus') !!}</b><br>" + 
                    "Bạn vui lòng kiểm tra Email và xác minh tài khoản để sử dụng dịch vụ!",
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