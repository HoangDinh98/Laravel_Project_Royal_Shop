<script src="{{ asset('UI/themes/js/jquery-1.8.3.min.js') }}"></script>
<link href="{{asset('confirm-form/notifier.style.css')}}" rel="stylesheet">
<script src="{{asset('confirm-form/notifier.script.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $.Notifier("Royal Shop - Thông báo",
            "Bạn đã đặt hàng <b>thành công</b><br>Cảm ơn bạn đã mua hàng của Shop<br>Để xác nhận việc đặt hàng," + 
                    " chúng tôi sẽ liên hệ với bạn qua SĐT: <b>{{ $phone }}</b>",
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
                    window.location.href = 'home';
                    }
            }
            ],
            callback: function () {
            window.location.href = 'home';
            }
    });
    });
</script>

