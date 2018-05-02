

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

    $('#date').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    $('#time').datetimepicker({
        format: 'LT',
        stepping: 15
    });

    $('#reservation').click(function(){

        if(validateReservationForm()){
            var name = $('#name').val();
            var email = $('#email').val();
            var telephone = $('#telephone').val();
            var date = $('#date').val();
            var time = $('#time').val();
            var message = $('#message').val();

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

            $.post('admin/ajax/addReservation', { name:name, email:email, date:date, time:time, message:message, telephone:telephone }, function(data){

                if(data == 'success'){
                    $('#reservation_form').hide();
                    $('#success_div').show();
                }

            });
        }
    });

});



function validateReservationForm(){

    var name = $('#name').val();
    var email = $('#email').val();
    var telephone = $('#telephone').val();
    var date = $('#date').val();
    var time = $('#time').val();

    var message = '';

    if(name == ''){
        message += '- Please enter your name';
    }

    if(email == ''){
        message += '\n- Please enter your email';
    }

    if(telephone == ''){
        message += '\n- Please enter your telephone';
    }

    if(date == ''){
        message += '\n- Please enter a date';
    }

    if(time == ''){
        message += '\n- Please enter a time';
    }

    if(message != ''){
        alert(message);
        return false;
    }

    return true;
}



