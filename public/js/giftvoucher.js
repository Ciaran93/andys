
// hide/show each table
function toggleVoucherTables(){
    $('#outstanding_voucher_table').toggle();
    $('#redeemed_voucher_table').toggle();

    if($('#show-table-button').text() == 'View Outstanding'){
        $('#show-table-button').text('View Redeemed');
    } else {
        $('#show-table-button').text('View Outstanding');
    }
}


// redeem voucher ajax function
function redeemVoucher(){

    var id = $('#voucher_id').val();
    var amount = $('#redeem_amount').val();

     $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $.post('/admin/ajax/redeemAjax', { id:id, amount:amount }, function(response){

        var response = JSON.parse(response);

        if(response.message == 'success'){

            $('#amount_row_' + id).text(response.data);
            $('#voucher_row_' + id).addClass('success');
            $('#voucher_row_' + id).removeClass('active');

        }
    });

}

//  show modal, set input
function showRedeemModal(id, row){

    // show modal
    $("#redeemModal").modal();

    //grab amount from the row
    var amount = $('#amount_row_'+id).text();
    //set the amount in the input
    $('#redeemModal #redeem_amount').val(amount);
    
    // calculate the remaining
    var remaining = $('#redeemModal #redeem_amount').val() - amount;
    $('#redeemModal #remaining_amount').text(remaining);

    // set the amount and voucher id to a hidden inputs to access later
    $('#redeemModal #remaining_amount_val').val(amount);
    $('#redeemModal #voucher_id').val(id);

    $('#voucher_row_' + id).addClass('active');

}


function loadChart(voucher_data){
    var data = JSON.parse($('#voucher_data').val());
    
    var labels = [];
    var chart_data = [];
    
    $.each(data, function (key, value) {

        $('#'+key).text(value);

        key = key.replace('_', ' ');
        key = capitalizeFirstLetter(key);
        labels.push(key);
        chart_data.push(value);
        
    });


    var ctx = document.getElementById("myChart").getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Votes',
                data: chart_data,
                backgroundColor: [
                    'rgba(63, 191, 63, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        }
    });

}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}