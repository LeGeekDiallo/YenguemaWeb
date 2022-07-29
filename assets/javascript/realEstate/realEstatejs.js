let $ = require('jquery');

$(document).ready(()=>{

    const features = $('.__real_image_features');
    const recentProps = $('.__recent_prop_bloc');
    const recentSaleProps = $('.__recent_sale_prop_bloc');
    let cpt = 0;
    let rCpt = 0;
    let rSCpt = 0;

    const showBloc = (blocIndex)=>{
        const blocs = $(".__real_image_features");
        $(blocs[blocIndex]).removeClass('__real_image_features').addClass('__image_active');
    }
    const showRecentPropBloc = (blocIndex)=>{
        const recentPropBlocs = $(".__recent_prop_bloc");
        $(recentPropBlocs[blocIndex]).removeClass('__recent_prop_bloc').addClass('__recent_prop_bloc_active');
    }
    const showRecentSalePropBloc = (blocIndex)=>{
        const recentPropBlocs = $(".__recent_sale_prop_bloc");
        $(recentPropBlocs[blocIndex]).removeClass('__recent_sale_prop_bloc').addClass('__recent_sale_prop_bloc_active');
    }
    const nextBloc = (blocIndex)=>{
        let active_bloc = $('.__image_active');
        $(active_bloc).removeClass('__image_active').addClass('__real_image_features');
        showBloc(blocIndex);
    }
    const nextRecentPropBloc = (blocIndex)=>{
        let activeRecentPropBloc = $('.__recent_prop_bloc_active');
        $(activeRecentPropBloc).removeClass('__recent_prop_bloc_active').addClass('__recent_prop_bloc');
        showRecentPropBloc(blocIndex);
    }
    const nextRecentSalePropBloc = (blocIndex)=>{
        let activeRecentPropBloc = $('.__recent_sale_prop_bloc_active');
        $(activeRecentPropBloc).removeClass('__recent_sale_prop_bloc_active').addClass('__recent_sale_prop_bloc');
        showRecentSalePropBloc(blocIndex);
    }
    showBloc(0);
    showRecentPropBloc(rCpt);
    showRecentSalePropBloc(rSCpt);
    setInterval(()=>{
        cpt ++;
        nextBloc(cpt%features.length);
        if(cpt >= features.length)
            cpt = 0;

    }, 3500)

    const recentPropsTimer = setInterval(()=>{
        if(recentProps.length > 1) {
            rCpt++;
            nextRecentPropBloc(rCpt % recentProps.length);
        }
    }, 5000);
    setInterval(()=>{
        if(recentSaleProps.length > 1) {
            rSCpt++;
            nextRecentSalePropBloc(rCpt % recentSaleProps.length);
        }
    }, 5000);

    const x = window.matchMedia("(max-width: 575px)")

    if(x.matches){
        clearInterval(recentPropsTimer);
        $('.__recent_prop_bloc_active').removeClass('__recent_prop_bloc_active').addClass('__recent_prop_bloc');
        $('.__recent_sale_prop_bloc_active').removeClass('__recent_sale_prop_bloc_active').addClass('__recent_sale_prop_bloc');
        $('.__recent_prop_bloc, .__recent_sale_prop_bloc').css({
            display: "grid",
            gridTemplateColumns: "repeat(1, 1fr)",
            gridGap: "7px",
            animationName: "slideInRight",
            animationDuration: "2.5s"
        })
    }
})