<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;

class ReservationController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){

        $reservations = Reservation::all();

        return view('admin.reservation.viewAll')->with(compact('reservations'));

    }



    public function addReservation(Request $request){

        if($request->ajax()){

            $name = $request->name;
            $email = $request->email;
            $telephone = $request->telephone;
            $date = $this->formatDate($request->date);
            $time = $request->time;
            $message = $request->message;

            $reservation = new Reservation();
            $reservation->name = $name;
            $reservation->email = $email;
            $reservation->telephone = $telephone;
            $reservation->date = $date;
            $reservation->time = $time;
            if($message != null){
                $reservation->message = $message;
            }
            $reservation->save();

            echo 'success';

        }

    }


    private function sendEmailReservation(){

        //TO DO

    }
}
