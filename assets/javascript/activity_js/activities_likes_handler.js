let $ = require('jquery');
import Like from "./like";

const likesHandler = function (request, tag){
    fetch(request).
        then((response)=>{
            return response.json();
    }).then((response)=>{
        let likes = response.likes;
        $("#"+$(tag).data("token_likes")).html(likes);
        $("#"+$(tag).data("token_unlikes")).html(response.unlikes);
    })
}
$(document).ready(function (){
    $('.__likes').click(function (){
        let like = new Like(
            $(this).data("token_likes"),
            $(this).data("like"),
            $(this).data('route'),
            $(this).css("backgroundColor"));
        let request = like.likesHandler();
        $(this).css({
            "background-color":`${like.backgroundColor}`,
            "color":`${like.color}`
        })
        likesHandler(request, $(this));
    });
    $('.__unlikes').click(function (){
        let like = new Like(
            $(this).data("token_unlikes"),
            $(this).data("unlike"),
            $(this).data('route'),
            $(this).css("backgroundColor"));
        let request = like.likesHandler();
        $(this).css({
            "background-color":`${like.backgroundColor}`,
            "color":`${like.color}`
        })
        likesHandler(request, $(this));
    });
})