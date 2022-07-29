let $ = require('jquery');
let bCpt = 0;

const validator = ()=>{
    const bloc_active = document.querySelector('.__bloc_active');
    let fields = bloc_active.querySelectorAll('input[type=text], input[type=tel]');
    for(let field=0; field<fields.length; field++){
        if($(fields[field]).val() === "") {
            $(fields[field]).focus()
            return false
        }
    }
    return true;
}
const showBloc = (bCpt)=>{
    const blocs = $(".__bloc");
    $(blocs[bCpt]).removeClass('__bloc').addClass('__bloc_active');
}
const nextBloc = ()=>{
    let active_bloc = $('.__bloc_active');
    $(active_bloc).removeClass('__bloc_active').addClass('__bloc')
    bCpt += 1
    showBloc(bCpt);
}
const prevBloc = ()=>{
    let active_bloc = $('.__bloc_active');
    $(active_bloc).removeClass('__bloc_active').addClass('__bloc')
    bCpt -= 1
    showBloc(bCpt);
}
$(document).ready(function (){
    showBloc(0)
    $("#submit_btn").click(function (){
        const blocs = $(".__bloc");
        if(bCpt < blocs.length && validator()) {
            nextBloc();
            $("#prev_btn").css({
                display: 'block'
            })
        }
        if(bCpt >= blocs.length){
            $("#submit_btn").attr('type', 'submit').html('Ajouter');
        }
    })
    $("#prev_btn").click(function (){
        if(bCpt > 0) {
            prevBloc();
        }
        if(bCpt === 0){
            $(this).css({
                display: 'none'
            })
        }
    })

})