$(document).ready(function () {
    $('#notify').delay(10000).fadeOut();
});

$(document).ready(function () {
    //Use this inside your document ready jQuery 
    $(window).on('popstate', function () {
        location.reload(true);
    });
});

function deleteA(para) {
    $('#' + para).submit();
}

$(".delete-fnt").click(function () {
    var types = ["Sản phẩm", "Danh mục", "Khuyến mãi", "Nhà cung cấp", "Đơn hàng", "Tài khoản", "Tập tin"];

    var type = types[$(this).attr("data-type")];
    var id = $(this).attr("data-id");
    var item_name = $("#name_" + id).text();

    $.Notifier("Cảnh báo",
            "Bạn thự sự muốn xóa " + type + " này?" + "<br><b>\"" + item_name + "\"</b>",
            "warning",
            {
                vertical_align: "center",
                rtl: false,
                btns: [
                    {
                        label: "Xác nhận",
                        type: "success",
                        onClick: function () {
                            event.preventDefault();
                            document.getElementById('fnt_' + id).submit();
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

$('.order-update-modal').on('click', function (e) {
    var order_id = $(this).data('id');
    var form_name = '#update-form-' + order_id;

    $(form_name + ' .order-inprocess-box').removeClass('disabled');
    $(form_name + ' .order-delivering-box').removeClass('disabled');
    $(form_name + ' .order-delivered-box').removeClass('disabled');
    $(form_name + ' .order-canceled-box').removeClass('disabled');

    $(form_name + ' .order-inprocess-box').html('<input class="order-inprocess" type="radio" name="status" value="0"> Chờ xử lý');
    $(form_name + ' .order-delivering-box').html('<input class="order-delivering" type="radio" name="status" value="1"> Đang giao');
    $(form_name + ' .order-delivered-box').html('<input class="order-delivered" type="radio" name="status" value="2"> Đã giao');
    $(form_name + ' .order-canceled-box').html('<input class="order-canceled" type="radio" name="status" value="3"> Đã hủy');

    $('input[name="status"]').prop('checked', false);
    var order_status = $('#order-status-' + order_id).attr('data-id');
    console.log('Form name = ' + form_name + '| status = ' + order_status);

    switch ($('#order-status-' + order_id).attr('data-id')) {
        case '0':
            $(form_name + ' .order-inprocess').prop('checked', true);
            break;
        case '1':
            $(form_name + ' .order-delivering').prop('checked', true);
            break;
        case '2':
            $(form_name + ' .order-delivered').prop('checked', true);
            break;
        default:
            $(form_name + ' .order-canceled').prop('checked', true);
    }

    $(form_name + ' input[name="status"]').filter(function () {
        return $(this).val() >= parseInt(parseInt(order_status) + 2);
    }).prop('disabled', true);

//    $('.form label').filter(function(){
//        return $(this).has('input:disabled');
//    }).addClass('disabled');

    $(form_name + ' .form label').has('input:disabled').addClass('disabled');

    $('#order-status-mess-' + order_id).text($('#order-status-' + order_id).text());

    $(form_name).modal('show');
});

$('.checkbox label').click(function () {
    if ($(this).hasClass('disabled')) {
        $(this).find('input[type="radio"]').prop('disabled', true);
    } else {
        $(this).find('input[type="radio"]').prop('checked', true);
    }
});

$('.update-form-submit').on('click', function () {
    var order_id = $(this).data('id');
    var status = $("input[name='status']:checked", "#update-form-" + order_id).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/admin/orders/updateindex",
        data: {
            'id': order_id,
            'status': status
        },
        success: function (data) {
//                    console.log(data);
            if (data.is_changed == 1) {
                $('#notification-form-content').html('Cập nhật thành công' + data.message);
                $('#update-form-' + order_id).modal('hide');

                $('#order-status-' + order_id).text(data.status_text);
                $('#order-status-' + order_id).attr('data-id', data.status);
                $('#notification-form').modal('show');

            } else {
                $('#notification-form-content').html('Không thay đổi');
                $('#update-form-' + order_id).modal('hide');
                $('#notification-form').modal('show');
            }
        }
    });
    return true;
});


//CUSTOMIZE FOR COMMENTS
$(' .comment-update-modal').on('click', function (e) {
    var comment_id = $(this).data('id');
    var form_name = '#update-form-' + comment_id;

    $(form_name + ' .comment-inprocess-box').html('<input class="comment-inprocess" type="radio" name="status" value="0"> Đang chờ duyệt');
    $(form_name + ' .comment-accepted-box').html('<input class="comment-accepted" type="radio" name="status" value="1"> Đã duyệt');
    $(form_name + ' .comment-unaccepted-box').html('<input class="comment-unaccepted" type="radio" name="status" value="2"> Không duyệt');

    $('input[name="status"]').prop('checked', false);
    var comment_status = $('#comment-status-' + comment_id).attr('data-id');
//    console.log('Form name = ' + form_name + '| status = ' + order_status);

    switch ($('#comment-status-' + comment_id).attr('data-id')) {
        case '0':
            $(form_name + ' .comment-inprocess').prop('checked', true);
            break;
        case '1':
            $(form_name + ' .comment-accepted').prop('checked', true);
            break;
        default:
            $(form_name + ' .comment-unaccepted').prop('checked', true);
    }
    $('#comment-status-mess-' + comment_id).text($('#comment-status-' + comment_id).text());

    $(form_name).modal('show');
});

$('.update-comment-submit').on('click', function () {
    var comment_id = $(this).data('id');
    var status = $("input[name='status']:checked", "#update-form-" + comment_id).val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/admin/comments/update",
        data: {
            'id': comment_id,
            'status': status
        },
        success: function (data) {
//                    console.log(data);
            if (data.is_changed == 1) {
                $('#notification-form-content').html('Cập nhật thành công' + data.message);
                $('#update-form-' + comment_id).modal('hide');
                $('#comment-status-' + comment_id).text(data.status_text);
                $('#comment-status-' + comment_id).attr('data-id', data.status);
                $('#notification-form').modal('show');
            } else {
                $('#notification-form-content').html('Không thay đổi');
                $('#update-form-' + comment_id).modal('hide');
                $('#notification-form').modal('show');
            }
        }
    });
});



