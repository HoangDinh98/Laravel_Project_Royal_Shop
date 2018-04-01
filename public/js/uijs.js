/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($) {
    $(document).ready(function () {

        var navDiv = '#nav';

        $('#nav-wrapper').css('min-height', $(navDiv).height());
        //$('#nav-wrapper').height($('#nav').height() );

        $(navDiv).affix({
            offset: $(navDiv).position()
        });

    });

})(jQuery);


$(document).ready(function () {
    $('.addcart').click(function () {
        var pro_id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "addcart",
            data: {
                'id': pro_id
            },
            success: function (data) {
                console.log(data);
//                var result = $.parseJSON(data);
                if (data.error == 1) {
                    $("#error-content").empty();
                    $("#error-content").append(data.message);
                    $("#error-show").click();

                } else {
                    $("#p-num").html(data.totalQty);
                    /////////////////////////////
                    $("#product-img-modal").attr("src", $("#product-img-" + pro_id).attr("src"));
                    $("#product-name-modal").text(data.name);
                    $("#product-price-modal").text(data.price + " đ");
                    $("#temp-money").text(data.totalPrice + " đ");
                    $("#total-money").text(data.totalPrice + " đ");
                    $("#product-totalQty-modal").text(data.totalQty);

                    $("#notify-modal").modal('show');
//                    $("#model-show").click();
                    /////////////////////////////////
                }
            }
        });
    });

    $('.plus').click(function () {
        var pro_id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "cart/plus",
            data: {
                'id': pro_id
            },
            success: function (data) {
                console.log(data);
                $("#product-qty-" + pro_id).html(data.qty);
                $("#sum-price-" + pro_id).html(data.sum_price + " đ");
                $("#notify-num-box").text(data.totalQty);
                $("#temp-money").text(data.totalPrice + ' đ');
                $("#total-money").text(data.totalPrice + ' đ');

                if (data.qty >= 5) {
                    $('#plus-' + pro_id).addClass('disabled');
                }
                if ($('#minus-' + pro_id).hasClass('disabled')) {
                    $('#minus-' + pro_id).removeClass('disabled');
                }
            }
        });
    });

    $('.minus').click(function () {
        var pro_id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "cart/minus",
            data: {
                'id': pro_id
            },
            success: function (data) {
                console.log(data);
                $("#product-qty-" + pro_id).html(data.qty);
                $("#sum-price-" + pro_id).html(data.sum_price + " đ");
                $("#notify-num-box").text(data.totalQty);
                $("#temp-money").text(data.totalPrice + ' đ');
                $("#total-money").text(data.totalPrice + ' đ');

                if (data.qty <= 1) {
                    $('#minus-' + pro_id).addClass('disabled');
                }

                if ($('#plus-' + pro_id).hasClass('disabled')) {
                    $('#plus-' + pro_id).removeClass('disabled');
                }
            }
        });
    });

    $('.remove').click(function () {
        var pro_id = $(this).data('id');
        var image = $("#product-img-" + pro_id).attr("src");
        var name = $("#product-name-" + pro_id).text();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.Notifier("Cảnh báo",
                "Bạn thự sự muốn xóa sản phẩm này?" + "<br><b>\"" + name + "\"</b>",
                "warning",
                {
                    vertical_align: "center",
                    rtl: false,
                    has_icon: false,
                    image: image,
                    btns: [
                        {
                            label: "Xác nhận",
                            type: "success",
                            onClick: function () {
                                $.ajax({
                                    type: "POST",
                                    url: "cart/remove",
                                    data: {
                                        'id': pro_id
                                    },
                                    success: function (data) {
                                        console.log(data);
                                        $("#notify-num-box").text(data.totalQty);
                                        $("#temp-money").text(data.totalPrice + ' đ');
                                        $("#total-money").text(data.totalPrice + ' đ');
                                        $("#row-id-" + pro_id).remove();
                                        if(data.totalQty <= 0) {
                                            $("#check-out-container").empty();
                                        }
                                        $("#notification-content").empty();
                                        $("#notification-content").show();
                                        $("#notification-content").append("<div class='alert alert-success'>"
                                                + "<button data-dismiss='alert' class='close'>×</button>"
                                                + "Bạn đã xóa sản phẩm <b>" + data.productName + "</b> khỏi giỏ hàng thành công </div>");
                                        $("#notification-content").delay(10000).fadeOut();
                                    }
                                });
                                return true;
                            }
                        },
                        {
                            label: "Hủy",
                            type: "default",
                            onClick: function () {
                            }
                        }
                    ],
                    callback: function () { }
                });
    });

});

//$(document).ready(function () {
//    $("#notification-content").delay(10000).fadeOut();
//});
