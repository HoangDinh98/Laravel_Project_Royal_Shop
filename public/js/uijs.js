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
            url: "/cart/addcart",
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
                    $("#product-price-modal").text(data.price);
                    $("#temp-money").text(data.totalPrice);
                    $("#total-money").text(data.totalPrice);
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
                $("#sum-price-" + pro_id).html(data.sum_price);
                $("#notify-num-box").text(data.totalQty);
                $("#product-totalQty").text(data.totalQty);
                $("#temp-money").text(data.totalPrice);
                $("#total-money").text(data.totalPrice);

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
                $("#sum-price-" + pro_id).html(data.sum_price);
                $("#notify-num-box").text(data.totalQty);
                $("#product-totalQty").text(data.totalQty);
                $("#temp-money").text(data.totalPrice);
                $("#total-money").text(data.totalPrice);

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
                                        $("#product-totalQty").text(data.totalQty);
                                        $("#temp-money").text(data.totalPrice);
                                        $("#total-money").text(data.totalPrice);
                                        $("#row-id-" + pro_id).remove();
                                        if (data.totalQty <= 0) {
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

$('#call-login').click(function () {
    $('#login').modal('show');
});

$('.btn-shippingAgree').click(function () {
    $('#shippingAgree-form').submit();
});

//$(document).ready(function () {
//    var image = $(".user-profile .avatar-box img");
//    
//    if( image.prop('naturalWidth') > image.prop('naturalHeight') ) {
//        image.css({"height":"100%", "width":"auto", "max-width":"none"});
//    } else {
//        image.css({"height":"auto", "width":"100%" });
//    }
//});

$(window).on("load", function () {
    var image = $(".user-profile .avatar-box img");
    image.css("opacity", "0");

    image.animate({opacity: '0.0', opacity: '1.0'}, 'slow');

    if (image.prop('naturalWidth') > image.prop('naturalHeight')) {
        image.css({"height": "100%", "width": "auto", "max-width": "none"});
    } else {
        image.css({"height": "auto", "width": "100%"});
    }
});

$("#avatar").change(function () {
    $("#avatar-source").html('Tệp sẽ được tải lên: <b>' + $("#avatar").val().split('\\').pop() + '</b>');
});

$(document).ready(function () {
    $(".profile-update input[type='text']").keyup(function () {
        $(".profile-update button[type='submit']").prop('disabled', false);
    });

    $(".profile-update input[type='file']").on('change', function () {
        $(".profile-update button[type='submit']").prop('disabled', false);
    });


});

$(document).ready(function () {
    $('.canceldorder').click(function () {
        $.Notifier("Cảnh báo",
                "Bạn thự sự muốn HỦY ĐƠN HÀNG này?",
                "warning",
                {
                    vertical_align: "center",
                    rtl: false,
                    has_icon: false,
                    btns: [
                        {
                            label: "Xác nhận",
                            type: "success",
                            onClick: function () {
                                $('#order-canceled').submit();
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

//////////////////////////
//////////////////////////
//PROCESS FOR CHANGE PASS

$(' .btn-change-pass').click(function () {
    $.post('changepass', $('#change-pass-form').serialize(), function (data) {
        if (data.hasError) {
            $('#old-pass-error').html(data.message);
            $('#old-pass-error').parent().addClass('has-error');
        } else if (!$.isEmptyObject(data.error)) {
            $('#old-pass-error').html('');
            $('#old-pass-error').parent().removeClass('has-error');
            printError(data.error);
        } else {
            notify(data.message);
        }
    });
});

function printError(msg) {
    console.log(msg);
    $('.input-box').removeClass('has-error');
    $('span[id*=pass-error]').html('');

    $.each(msg, function (key, value) {
        $('#' + key + '-error').html(value);
        $('#' + key + '-error').parent().addClass('has-error');
    });
}

function notify(message) {
//    location.reload();
//    $("#change-pass-form").trigger('reset');
    $("#change-pass-div").modal('hide');
    resetForm("#change-pass-form");

    $.Notifier("Thông báo",
            message,
            "success",
            {
                vertical_align: "center",
                rtl: false,
                has_icon: false,
                btns: [
                    {
                        label: "OK",
                        type: "success",
                        onClick: function () {}
                    }
                ],
                callback: function () {}
            });
}

function resetForm(formID) {
    $(formID).trigger('reset');
    $('[id*=-error]').html('');
    $(formID + ' .input-box').removeClass('has-error');
}


//$('#request-email').click(function () {
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//        }
//    });
//    
//    $.ajax({
//        type: 'GET',
////        url: $(form).attr('action'),
//        url: '/laravel_project_royal_shop/public/user/profile/requestmail',
//        success: function (data) {
//            console.log(data);
//        }
//    });
//});
//END PROCESS FOR CHANGE PASS
/////////////////////////////


//$(document).ready(function () {
//    $("#notification-content").delay(10000).fadeOut();
//});
