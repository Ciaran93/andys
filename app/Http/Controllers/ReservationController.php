<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function email(Request $request){


        // var_dump($_POST);
        $name = $request->name;
        $email_address = $request->email;
        $date = $request->date;
        $time = $request->time;
        $message = $request->message;

        $to_email = 'mccaugheyciaran@gmail.com';
        $subject = 'RESERVATION REQUEST - ' . $date . ' - ' . $time;
        $body = "Reservation request has been recieved for $date - $time.";
        $body .= "\nName: ". $name;
        $body .= "\nDate: ". $date;
        $body .= "\nDate: ". $time;
        $body .= "\n$message";
        $headers = 'From: ' . $email_address;

        echo $name .'<br>';
        echo $body .'<br>';
        echo $headers .'<br>';

        
        if(mail($to_email,$subject,$body,$headers)){

            echo json_encode('success');

        } else {
            echo json_encode('fail');
            
        }

        $home = new HomeController();
        return $home->willBeIndex();


    }
}
