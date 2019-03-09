$(function() {

    'use strict'

    $('input[name="hand"]:radio').change(function(){
        var radioval = $(this).val();
        if(radioval == 1){
            $('#gu').addClass('imgSelected');

            $('#ch').removeClass('imgSelected');
            $('#pa').removeClass('imgSelected');
       }else if(radioval == 2){
            $('#ch').addClass('imgSelected');

            $('#gu').removeClass('imgSelected');
            $('#pa').removeClass('imgSelected');
       }else if(radioval == 3){
            $('#pa').addClass('imgSelected');

            $('#gu').removeClass('imgSelected');
            $('#ch').removeClass('imgSelected');
       }
    });
});
