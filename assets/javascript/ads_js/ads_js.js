let $ = require('jquery');
function fileControl(){
    $("input:file").change(function () {
        let files = this.files;
        let fileLength = files.length;
        if(fileLength > 5){
            $("#submit_btn").attr('type', 'button')
            $('.__alert_max_image').html("5 images au maximum").css({
                'font-family':'Ubuntu',
                'color':'red'
            })
        }else {
            $("#submit_btn").attr('type', 'submit')
            $('.__alert_max_image').html("")
        }

    });
}


$(document).ready(function (){
    $("#ads_adCategory").change(function (){
        let value_select = $(this).val();
        if(value_select === 'motos' || value_select === 'vélos' || value_select === 'véhicules'){
            $('#__if_cat_eq_vehicle').css({
                'display':'flex',
            });
        }else {
            $('#__if_cat_eq_vehicle').css({
                'display':'none'
            });
        }
    })
    fileControl();
})