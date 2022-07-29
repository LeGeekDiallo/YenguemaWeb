let $ = require('jquery')
$(document).ready(function () {
    let route = function (){
        $(".__route").click(function (){
            localStorage.setItem("route", $(this).attr("href"));
        })
    }
    route();
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.documentElement.scrollTop > 20) {
            $(".topBtn").css("display", "block");
        } else {
            $(".topBtn").css("display", "none");
        }
    }

    $(".topBtn, .__district").click(function () {
        topFunction();
    });
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

})