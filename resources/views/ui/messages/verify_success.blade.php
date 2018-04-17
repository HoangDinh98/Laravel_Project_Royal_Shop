<script type="text/javascript">
    $(document).ready(function() {
    var nextaction = {{ session('verifyStatus')['err'] }};
    $.Notifier("Royal Shop - Thông báo",
            "{!! session('verifyStatus')['message'] !!}",
            "{{ session('verifyStatus')['err'] == 0 ? 'success' : 'warning' }}", {
            vertical_align: "center",
                    rtl: false,
                    has_icon: true,
                    image: '',
                    btns: [
                    {
                    label: "OK",
                            type: "success",
                            onClick: function () {
                            if (nextaction == 0) {
                            $("#login").modal("show");
                            }
                            }
                    }
                    ],
                    callback: function () {
                    if (nextaction == 0) {
                    $("#login").modal("show");
                    }
                    }
            });
    });
</script>