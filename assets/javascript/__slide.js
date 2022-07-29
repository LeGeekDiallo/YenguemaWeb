let $ = require('jquery');
$(document).ready(()=>{
    const features = $('.__features_display');
    let cpt = 0;
    $('.__active_features').fadeIn('slow');

    setInterval(()=>{
        let feature = features[cpt];
        let next_f = features[cpt+1];
        if($(feature).hasClass('__active_features')){
            $(feature).removeClass('__active_features')
            $(next_f).addClass('__active_features')
            $('.__active_features').fadeIn('slow');
        }
        cpt ++;
        if(cpt === features.length){
            let last_f = features[cpt];
            $(last_f).removeClass('__active_features')
            cpt = 0;
            let feature = features[cpt];
            $(feature).addClass('__active_features')
            $('.__active_features').fadeIn('slide');
        }
    }, 4000)



    $("#__arrow").click(function (){
        document.documentElement.scrollTop = 418;
        $("#test_animate").addClass(`animate__animated animate__zoomInUp`);
    })
})