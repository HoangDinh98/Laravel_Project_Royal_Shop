$(document).ready(function () {
    $('#notify').delay(10000).fadeOut();
});

function deleteA(para) {
    $('#' + para).submit();
}

$(".delete-fnt").click(function () {
    var types = ["Sản phẩm", "Danh mục", "Khuyến mãi", "Nhà cung cấp", "Đơn hàng", "Tài khoản", "Tập tin"];
<<<<<<< Updated upstream
    
=======

>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======

$('#update-form .close').click( function() {
    $('#update-form').modal('hide');
});

$('#update-form .close-2').click( function() {
    $('#update-form').modal('hide');
});

$('#update-form').on('hide.bs.modal', function () {
    $(':input','#update-form').not(':button, :submit, :reset, :hidden').val('').removeAttr('checked').removeAttr('selected');
});

//$('#update-form').on('loaded.bs.modal', function () {
//    $('#update-form').trigger('reset');
//});

$('.order-update-modal').on('click', function (e) {
    var order_id = $(this).data('id');
//        var current_order_status = $('#order-status-' + order_id).attr('data-id');
//        console.log($('#order-status-' + order_id).attr('data-id') + ' ' + order_id);

    $('#order-delivered-box').empty();
    $('#order-delivered-box').append('<input id="order-delivered" type="radio" name="status" value="1"> Đã giao');

    $('#order-undelivered-box').empty();
    $('#order-undelivered-box').append('<input id="order-undelivered" type="radio" name="status" value="0"> Chưa giao');

    if ($('#order-status-' + order_id).attr('data-id') == 1) {
        $('#order-undelivered').removeAttr('checked');
        $('#order-delivered').attr('checked', 'checked');
    } else {
        $('#order-delivered').removeAttr('checked');
        $('#order-undelivered').attr('checked', 'checked');
    }

//        $('#update-form-submit').show();

    $('#update-form-submit').attr('data-id', order_id);
    $('#update-form').modal('show');
});

$('#update-form-submit').on('click', function () {
    var order_id = $(this).data('id');
    var status = $("input[name='status']:checked").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false
    });

    $.ajax({
        type: "POST",
        url: "orders/updateindex",
        data: {
            'id': order_id,
            'status': status
        },
        success: function (data) {
//                    console.log(data);
            if (data.is_changed == 1) {
                var recived;
                if (data.status == 1) {
                    recived = '<b> Chưa giao -> Đã giao</b>';
                } else {
                    recived = '<b> Đã giao -> Chưa giao</b>';
                }

                $('#notification-form-content').html('Cập nhật thành công' + recived);
                $('#update-form').modal('hide');
                $('#notification-form').modal('show');

                $('#order-status-' + order_id).text(data.message);
                $('#order-status-' + order_id).attr('data-id', data.status);
            } else {
                $('#notification-form-content').html('Không thay đổi');
                $('#update-form').modal('hide');
                $('#notification-form').modal('show');
            }
        },
        complete: function () {
            $(this).data('requestRunning', false);
        }
    });
    return true;
});
>>>>>>> Stashed changes
