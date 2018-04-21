

function getMenuCategories(id){

    $('#category_id').show();
    $('#category_id').children('option:not(:first)').remove();

    var url = "/admin/ajax/getMenuCategories/"+id;

    $.ajax({
        url: url,
        dataType: 'JSON',
        success: function(response){
            response.forEach(element => {

                $('#category_id').append($('<option>', {
                    value: element.id,
                    text: element.name
                }));
                
                
            });
        }
    });

}


function comfirmDelete(){
    if (confirm("Click OK to continue?")){
        $('form#delete').submit();
    }
}

function validate(){

    var name = $('input[name="name"]').val();
    var description = $('input[name="description"]').val();
    var price = $('input[name="price"]').val();
    var section_id = $('#section_id').val();
    var category_id = $('#category_id').val();
    var error = '';

    if(name == ''){
        error += 'Please enter a name';
    }

    if(description == ''){
        error += '\nPlease enter a description';
    }

    if(price == ''){
        error += '\nPlease enter a price';
    }

    if(section_id <= 0){
        error += '\nPlease choose a menu section';
    }

    if(category_id <= 0){
        error += '\nPlease choose a category';
    }

    if(error != ''){
        alert(error);
        return false;
    }

    return true;
    
}