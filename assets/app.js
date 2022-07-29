/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import './styles/css/main.css';
import './styles/css/mediaQueries.css';
import './styles/css/bootstrap.css';
import './styles/css/mdb.css';
import  'animate.css';
import './styles/css/yenguema.scss';


import Sale from "./javascript/car/Sale";

let $ = require('jquery');
$(document).ready(function (){
    setInterval(function (){
        $(".__alert-success").fadeOut();
    }, 2500)

    $('#sale_state_btn').click(function (){
        const route = $(this).data('route');
        const id = $(this).data('id');
        const sale = new Sale(id, route);
        fetch(sale.saleHandle()).
        then((response)=>{
            return response.json();
        }).then((response)=>{
            if (response.status === "Ok"){
                $(this).html(response.sale_state ? 'Vendu':'Non vendu')
            }
        })
    })

})
// start the Stimulus application
//import './bootstrap';
