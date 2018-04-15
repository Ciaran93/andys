
function validate(){

    var name = $('#name').val();
    var description = $('#description').val();

    var error = '';

    if(name == ''){
        error = '- Please enter a name';
    }

    if(description == ''){
        error += '\n- Please enter a description';
    }

    if(error != ''){
        alert(error);
        return false;
    }

    return true;

}


function confirmDelete(){

    if(confirm('Are you sure you want to delete this section?')){
        return true;
    }

    return false;
    
}


