@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <button onClick="toggleRervationTable();" id='show-table-button'>View Past Reservations</button>

        @isset($reservations)
            <h4>Reservations</h4>

                <table class="table table-striped  table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>People</th>
                        <th>Message</th>
                    </tr>
                </thead>

               <tbody id="upcomming_reservations_table">
                @foreach ($reservations as $reservation)
                    @if(!$reservation->reservation_passed)
                            <tr>
                                <td>{{ $reservation->name }} </td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->telephone }}</td>
                                <td>{{\Carbon\Carbon::parse($reservation->date)->format('d/m/Y') }}</td>
                                <td>{{ $reservation->time }}</td>
                                <td>{{ $reservation->number_of_people }}</td>
                                <td>{{ $reservation->message }}</td>
                            </tr>
                    @endif
                @endforeach
                </tbody>

                <tbody  id="reservation_passed_table" style="display:none;">
                @foreach ($reservations as $reservation)
                    @if($reservation->reservation_passed)
                            <tr>
                                <td>{{ $reservation->name }} </td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->telephone }}</td>
                                <td>{{\Carbon\Carbon::parse($reservation->date)->format('d/m/Y') }}</td>
                                <td>{{ $reservation->time }}</td>
                                <td>{{ $reservation->number_of_people }}</td>
                                <td>{{ $reservation->message }}</td>
                            </tr>
                    @endif
                @endforeach
                </tbody>
                </table>
            <!-- <a type="submit" href="/admin/reservations/export" class="button">Export To Excel</a> -->
        @endisset
                
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>

function toggleRervationTable(){

    $('#reservation_passed_table').toggle();
    $('#upcomming_reservations_table').toggle();

    if($('#show-table-button').text() == 'View Past Reservations'){
        $('#show-table-button').text('View Upcoming Reservations');
    } else {
        $('#show-table-button').text('View Past Reservations');
    }
    
}

</script>