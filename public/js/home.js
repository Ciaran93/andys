$(function () {
    $('#date').datetimepicker();
});

function openMenu(menuName) {
    var i;
    var x = document.getElementsByClassName("Menu");
    
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    document.getElementById(menuName).style.display = "block"; 
}

$( document ).ready(function(){

    var menu = $('.Menu').attr('id');

    if(typeof menu != 'undefined'){
        openMenu(menu);
    }

});