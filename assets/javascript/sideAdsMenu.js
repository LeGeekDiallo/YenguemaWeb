let $ = require('jquery');
const realEstateDropDownSideMenu = $('.__dropdown_real_estate_side_menu');
const jobDropDownSideMenu = $('.__dropdown_job_side_menu');
const travelDropDownSideMenu = $('.__dropdown_travel_side_menu');
const eduDropDownSideMenu = $('.__dropdown_educ_side_menu');

setInterval(function (){
    $(".__alert-success").fadeOut();
}, 2500)
const dropDownMenu = (component)=>{
    let display = component.css('display')
    if(display === 'none')
        component.css({
            display: 'block'
        });
    else
        component.css({
            display: 'none'
        });
}
let reduceSideNaveByClickingAnyWhere = function(containerId){
    $(".service,.filter").click(function () {
        let display = $("#"+containerId).css("width");
        if(display === "0px"){
            $("#"+containerId).css("width", "75%");
            $(".closeBtn").toggle("slow");
        }else{
            $("#"+containerId).css("width", "0%");
        }
    })
}
const sideMenu = function(containerId){
    $("#__menu_btn").click(function () {
        let display = $("#"+containerId).css("display");
        if(display === "none"){
            $("#"+containerId).removeClass("__dropdown_container").addClass('__side_menu_display');
            $(".closeBtn").fadeOut("slow");
        }else{
            $("#"+containerId).removeClass("__side_menu_display").addClass('__dropdown_container');
        }
        reduceSideNaveByClickingAnyWhere(containerId);
    })
}
$(document).ready(function () {
    sideMenu("__dropdown_container");

    $('.drpbtn').click(()=>{
        dropDownMenu(eduDropDownSideMenu);
    })
    $('.job_drpbtn').click(()=>{
        dropDownMenu(jobDropDownSideMenu);
    })
    $('.travel_drpbtn').click(()=>{
        dropDownMenu(travelDropDownSideMenu);
    })
    $('.real_estate_dpd_btn').click(()=>{
        dropDownMenu(realEstateDropDownSideMenu);
    })
})