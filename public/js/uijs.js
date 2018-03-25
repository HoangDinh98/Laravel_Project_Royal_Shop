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
                $("#p-num").html(data.name);
            }
        });
    });
});


