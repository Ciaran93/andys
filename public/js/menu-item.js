

$( document ).ready(function(){
    $('#section_id').change(function(){

          $.ajax({
                    url:'/admin/ajax/menu-section-types/getAll',
                    dataType:'json',
                    type:'get',
                    data: {
                    },
                    success:  function (response) {
                        console.log(response);
                        
                        addMenuSectionTypeSelect(response);
                    },              
            });
          
    });
});

function comfirmDelete(){
    if (confirm("Click OK to continue?")){
        $('form#delete').submit();
    }
}


function addMenuSectionTypeSelect(data){

    // var types = JSON.parse(data);
    
    // remove the options
    $('#menu_section_type_select').children('option:not(:first)').remove();
    $('#menu_section_type_select').show();

    // add the new options
    data.forEach(type => {
        
        $('#menu_section_type_select').append($('<option>', {
            value: type.id,
            text: type.name
        }));
    });

    

}