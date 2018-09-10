@extends('layouts.app')
@section('content')

<script src="{{ asset('js/giftvoucher.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

<div class="container">

<button onClick="toggleVoucherTables();" id='show-table-button'>View Redeemed</button>
<button onClick="$('#stats').toggle();" id='show-table-button'>View Stats</button>

    <div class="row" id="stats" style="display:none">
        <div class="col-md-4 col-md-offset-2">
            <h3>Total Purchased: &euro;<span id="total_purchased"></span></h3>
            <h3>Total Redeemed: &euro;<span id="total_redeemed"></span></h3>
            <h3>Total Outstanding: &euro;<span id="total_outstanding"></span></h3>
        </div>
        <div class="col-md-3">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>

    <div class="row" id="outstanding_voucher_table">
        <div class="col-md-12">
        @isset($vouchers)
            <h4>Oustanding Vouchers</h4>
                <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Recipient</th>
                        <th>Amount<br>remaining</th>
                        <th>Purchased</th>
                        <th>Redeem</th>
                    </tr>
                </thead>

               <tbody>
                @foreach ($vouchers as $voucher)
                    @if(!$voucher->redeemed)
                            <tr id="voucher_row_{{ $voucher->id }}">
                                <td>{{ $voucher->id }} </td>
                                <td>{{ $voucher->name }} </td>
                                <td>{{ $voucher->email }}</td>
                                <td>{{ $voucher->recipient_name }}</td>
                                <td id="amount_row_{{ $voucher->id }}">{{ $voucher->remaining }}</td>
                                <td>{{\Carbon\Carbon::parse($voucher->created_at)->format('d/m/Y') }}</td>
                                <td><button id="redeem_button_{{ $voucher->id}}" class="btn btn-default" onClick="showRedeemModal({{$voucher->id}}, this)">Redeem</button> </td>
                            </tr>
                    @endif
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
        @endisset

    <div class="row" id="redeemed_voucher_table" style="display:none;">
        <div class="col-md-12">
        @isset($vouchers)
            <h4>Redeemed Vouchers</h4>

                <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Recipient</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Redeemed Date</th>
                    </tr>
                </thead>

               <tbody>
                @foreach ($vouchers as $voucher)
                    @if($voucher->redeemed)
                            <tr class="@if(true)  @endif">
                                <td>{{ $voucher->id }} </td>
                                <td>{{ $voucher->name }} </td>
                                <td>{{ $voucher->email }}</td>
                                <td>{{ $voucher->recipient_name }}</td>
                                <td>{{ $voucher->amount }}</td>
                                <td>{{\Carbon\Carbon::parse($voucher->created_at)->format('d/m/Y') }}</td>
                                <td>{{ $voucher->redeemed_date }}</td>
                            </tr>
                    @endif
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endisset

<div id="redeemModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">

            <div class="form-group">
                <label for="redeem_amount">Redeem Amount</label>
                &euro;<input type="numeric" name="redeem_amount" id="redeem_amount" class="form-control">
            </div>

            <div>Remaining: &euro;<span id="remaining_amount"></span></div>

            <input type="hidden" name="remaining_amount_val" id="remaining_amount_val">
            <input type="hidden" name="voucher_id" id="voucher_id">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="redeem-amount-btn" onClick="redeemVoucher();">Redeem</button>
      </div>
    </div>

  </div>
</div>

<input type="hidden" value="{{ $voucher_data }}" id="voucher_data">           
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){

        // on redeem amount key up, calculate remaining
        $('input[name=redeem_amount]').keyup(function(){
            
            var redeem_amount = $(this).val();
            var amount_before = $('#remaining_amount_val').val();
            var remaining = amount_before - redeem_amount;

            $('#redeemModal #remaining_amount').text(remaining);

            // if remaining is not a number, diable the submit button
            if(isNaN(remaining)){
                $('#redeem-amount-btn').prop('disabled', true);
            } else {
                $('#redeem-amount-btn').prop('disabled', false);
            }

        });

        loadChart();

    });

</script>