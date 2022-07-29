let $ = require('jquery');

const askForSwitchState = async (targetUrl)=>{
    const request = {
        method: 'POST',
        headers : { "Content-Type": "application/json" }
    };
    const response = await fetch(targetUrl, request);
    if(response.ok){
        const state = await response.json();
        if(state.state === true){
            $("#__taxi_availability").css({
                backgroundColor: "#ecf30c",
                color: "black",
                fontFamily: "Ubuntu"
            })
        }else{
            $("#__taxi_availability").css({
                backgroundColor: "#0D47A1",
                color: "white",
                fontFamily: "Ubuntu"
            })
        }
    }

}

$(document).ready(()=>{
    $("#__taxi_availability").click(function (){
        const url = $(this).data('url');
        $(this).data('state', 'true')
        askForSwitchState(url);
    })
})