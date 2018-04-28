$(function () {
    $('#date').datetimepicker();
});

function openMenu(menuName) {
    var i;
    var menu = document.getElementsByClassName("Menu");
    
    for (i = 0; i < menu.length; i++) {
        menu[i].style.display = "none"; 
        $('#btn_'+menu[i].id).removeClass('hover');

    }
    document.getElementById(menuName).style.display = "block"; 

    $('#btn_'+menuName).addClass('hover');
}



$( document ).ready(function(){

    var menu = $('.Menu').attr('id');

    if(typeof menu != 'undefined'){
        openMenu(menu);
    }

});