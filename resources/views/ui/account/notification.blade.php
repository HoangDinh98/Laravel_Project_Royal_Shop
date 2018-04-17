

<script type="text/javascript">
    $(document).ready(function () {
        $.Notifier("Royal Shop - Thông báo", "{!! session('notification') !!}",
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

