

function emailReservation(){


    if(validateReservationForm()){
        
        name =      $('input[name="name"]').val();
        email =     $('input[name="email"]').val();
        date =      $('input[name="date"]').val();
        time =      $('input[name="time"]').val();
        message =   $('input[name="message"]').val();

        var obj = JSON.stringify({data: "data"});

        var url = "/ajax/email/";




        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: JSON.stringify({data: "data"}),
            success: function(response){

                if(response == 'success'){

                    $('#reservation_form').hide();
                    $('#email_success').show();
                }
            }
        });

    }

}


function validateReservationForm(){


    name = $('input[name="name"]').val();
    email = $('input[name="email"]').val();
    date = $('input[name="date"]').val();
    time = $('input[name="time"]').val();
    message = $('input[name="message"]').val();

    var error = '';
    
    if(name == ''){
        error += 'Please enter a name';
    }

    if(email == ''){
        error += '\nPlease enter an email';
    }

    if(date == ''){
        error += '\nPlease enter a date';
    }

    if(time == ''){
        error += '\nPlease enter a time';
    }

    if(error != ''){
        alert(error);
        return false;
    }

    return true;

}