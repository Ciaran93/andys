@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        @isset($reservations)
            <h4>Reservations</h4>

                <table class="table table-striped">
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

               <tbody>
                @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->name }} </td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->telephone }}</td>
                            <td>{{ $reservation->date }}</td>
                            <td>{{ $reservation->time }}</td>
                            <td>{{ $reservation->number_of_people }}</td>
                            <td>{{ $reservation->message }}</td>
                        </tr>
                @endforeach
                </tbody>
                </table>
            <!-- <a type="submit" href="/admin/reservations/export" class="button">Export To Excel</a> -->
        @endisset
                
@endsection