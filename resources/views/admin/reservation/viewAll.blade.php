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
                        <th>Message</th>
                        <th>Accept</th>
                        <th>Decline</th>
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
                            <td>{{ $reservation->message }}</td>
                            <td><a href="/admin/editItem/" class="button">Accept</a></td>
                            <td><a href="/admin/delete/" class="button" onclick="comfirmDelete();">Decline</a></td>
                        </tr>
                @endforeach
                </tbody>
                </table>

        @endisset
                
@endsection