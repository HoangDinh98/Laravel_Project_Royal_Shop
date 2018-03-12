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


