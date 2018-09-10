<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use PHPMailer\PHPMailer\PHPMailer;
use Log;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function index(){

        if (Auth::check()) {
            $reservations = Reservation::orderByRaw('created_at DESC')->get();
            $reservations = self::checkIfReservationHasPassed($reservations);
            return view('admin.reservation.viewAll')->with(compact('reservations'));
        } else {
            return redirect('login');
        }
    }

    public function checkIfReservationHasPassed($reservations = null){

        if($reservations != null){

            foreach($reservations as &$reservation){

                if($reservation->date <= date('Y-m-d')){
                    $reservation->reservation_passed = true;
                }

            }
            
            return $reservations;
        }

    }

    public function addReservation(Request $request){

        if($request->ajax()){


            $name = $request->name;
            $email = $request->email;
            $telephone = $request->telephone;
            $people = $request->people;
            $date = $this->formatDate($request->date);
            $time = $request->time;
            $message = $request->message;

            $reservation = new Reservation();
            $reservation->name = $name;
            $reservation->email = $email;
            $reservation->telephone = $telephone;
            $reservation->date = $date;
            $reservation->time = $time;
            $reservation->number_of_people = $people;
            if($message != null){
                $reservation->message = $message;
            }
            $reservation->save();

            $this->sendEmailReservation($request);
            echo 'success'; exit;

        }

    }


    private function sendEmailReservation($request){

        $name = $request->name;
        $email = $request->email;
        $telephone = $request->telephone;
        $people = $request->people;
        $date = $this->formatDate($request->date);
        $time = $request->time;
        $message = $request->message;

        $mail = new PHPMailer;

        $mail->Host = 'auth.smtp.1and1.co.uk';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@andysmonaghan.com';
        $mail->Password = env('EMAIL_PASSWORD', '');
        $mail->SMTPSecure = 'tls';
        
        $mail->From = 'info@andysmonaghan.com';
        $mail->FromName = "Andy's Monaghan";
        $mail->addAddress($email);
        
        $mail->isHTML(true);
        
        $mail->Subject = 'Thank you for your reservation';
        $mail->Body    = view('email.email')->with(compact('request'));
        
        if(!$mail->send()) {
            $message = 'Message could not be sent.';
            $message .= 'Mailer Error: ' . $mail->ErrorInfo;
        } else {

            $this->sendHostEmailReservation($request);
        }

    }

    function sendHostEmailReservation($request){
        $name = $request->name;
        $email = $request->email;
        $telephone = $request->telephone;
        $people = $request->people;
        $date = $this->formatDate($request->date);
        $time = $request->time;
        $message = $request->message;

        $mail = new PHPMailer;

        $mail->Host = 'auth.smtp.1and1.co.uk';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@andysmonaghan.com';
        $mail->Password = env('EMAIL_PASSWORD', '');
        $mail->SMTPSecure = 'tls';
        
        $mail->From = 'info@andysmonaghan.com';
        $mail->FromName = "Andy's Monaghan";
        $mail->addAddress('mccaugheyciaran@gmail.com');
        // $mail->addAddress('kevinredmondacd@hotmail.com');
        
        $mail->isHTML(true);
        
        $mail->Subject = 'Reservation has been received.';
        $mail->Body    = view('email.emailHost')->with(compact('request'));
        
        $mail->send();
    }


}
