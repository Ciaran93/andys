<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use PHPMailer\PHPMailer\PHPMailer;


class ReservationController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){

        $reservations = Reservation::orderByRaw('created_at DESC')->get();
        return view('admin.reservation.viewAll')->with(compact('reservations'));

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

            echo 'success';

            $this->sendEmailReservation($request);

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

        $mail->isSMTP();
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
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo ' email sent';

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

        $mail->isSMTP();
        $mail->Host = 'auth.smtp.1and1.co.uk';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@andysmonaghan.com';
        $mail->Password = env('EMAIL_PASSWORD', '');
        $mail->SMTPSecure = 'tls';
        
        $mail->From = 'info@andysmonaghan.com';
        $mail->FromName = "Andy's Monaghan";
        $mail->addAddress('mccaugheyciaran@gmail.com');
        
        $mail->isHTML(true);
        
        $mail->Subject = 'Reservation has been recieved.';
        $mail->Body    = view('email.emailHost')->with(compact('request'));
        
        $mail->send();
    }


    // function exportReservations(){
    //     $reservations = Reservation::all()->toArray();
        
    //     $filename = 'resevations.csv';
    //     $file = fopen($filename,"w");

    //     foreach($reservations as $reservation){
            
    //         fputcsv($file, $reservation);
    //     }

    //     header('Content-Type: text/csv; charset=utf-8');
    //     header('Content-Disposition: attachment; filename="'.$filename.'";');
    //     exit();
    //     fclose($file);

    //     // return $this->index();

    // }
}
