const $ = require('jquery')
const errorNbImages = $("#img_number_error");
let nbImagesToLoad = errorNbImages.data('nbimagestoload');
const askForDelete = async (targetUrl, imageComponent)=>{
    const request = {
        method: 'POST',
        headers : { "Content-Type": "application/json" }
    };
    const response = await fetch(targetUrl, request);
    if(response.ok){
        const state = await response.json();
        if(state.status === 'Ok'){
            imageComponent.remove();
            nbImagesToLoad = 4-state.nb_images;
        }
    }
}
const askForRemoveService = async (targetUrl, serviceComponent)=>{
    const request = {
        method: 'POST',
        headers : { "Content-Type": "application/json" }
    };
    const response = await fetch(targetUrl, request);
    if(response.ok){
        const state = await response.json();
        if(state.status === 'Ok'){
            serviceComponent.remove();
        }
    }
}
const imageNumberControl = ()=>{
    $("#activity_form_activityImages").change(function () {
        if(nbImagesToLoad===0){
            errorNbImages.html("Nombre total d'images atteint, supprimer pour ajouter de nouvelles !").css({
                'fontFamily': 'Ubuntu',
                'color': '#e50b0b'
            })
            $("#act_validate_btn").attr('type', 'button');
        }else {
            if (this.files.length > nbImagesToLoad) {
                errorNbImages.html(`${nbImagesToLoad} images au maximum`).css({
                    'fontFamily': 'Ubuntu',
                    'color': '#e50b0b'
                })
                $("#act_validate_btn").attr('type', 'button')
            } else {
                $("#act_validate_btn").attr('type', 'submit');
                errorNbImages.html("")
            }
        }
    })
}
$(document).ready(function (){
    $('.delete_btn').click(function () {
        let targetUrl = $(this).data('urldelete');
        let image = $("#img"+$(this).data('number'));
        askForDelete(targetUrl, image);
    })
    imageNumberControl();
    $('.delete_service_btn').click(function () {
        let targetUrl = $(this).data('urldelete');
        let service = $("#service"+$(this).data('number'));
        askForRemoveService(targetUrl, service);
    })
})