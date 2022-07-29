let $ = require('jquery');
let bCpt = 0;
const showBloc = (blocIndex)=>{
    const blocs = $(".__slide_item");
    const dot = $('.dot');
    $(blocs[blocIndex]).removeClass('__slide_item').addClass('__active_slide');
    $(dot[blocIndex]).removeClass('dot').addClass('dot_active')
}
const nextBloc = (blocIndex)=>{
    let active_bloc = $('.__active_slide');
    let active_dot = $('.dot_active');
    $(active_bloc).removeClass('__active_slide').addClass('__slide_item');
    $(active_dot).removeClass('dot_active').addClass('dot')
    showBloc(blocIndex);
}
const prevBloc = (blocIndex)=>{
    let active_bloc = $('.__active_slide');
    let active_dot = $('.dot_active');
    $(active_bloc).removeClass('__active_slide').addClass('__slide_item');
    $(active_dot).removeClass('dot_active').addClass('dot')
    showBloc(blocIndex);
}
$(document).ready(function (){
    showBloc(0);
    const nbBlocs = $('#items').data('nb_img')
    $(".__right").click(function (){
        bCpt += 1;
        nextBloc(bCpt%nbBlocs);
        if(bCpt >= nbBlocs)
            bCpt = 0;
    })
    $(".__left").click(function (){
        bCpt -= 1
        if(bCpt < 0){
            bCpt = nbBlocs-1;
        }
        prevBloc(bCpt);
    })
})