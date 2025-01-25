<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\View;

class BlueMail extends Model
{

    public function __construct(){

    }


    public static function generalEmail($email, $feedback)
    {    

        // dd($feedback);

        $subject = $feedback['subject'];
        $htmlBody = $feedback['message'];

        $to_name = env('WEBSITE_NAME'). " ";

        $responce = self::sendBlueEmail($email, $to_name, $subject, $htmlBody);

        return $responce;

    }

    public static function sendBlueEmail($to_email, $to_name, $subject, $htmlBody, $typeEmail = 1)
    {
        
        $fullHTML = "";

        $htmlHeader = View::make('emails.header')->render();
        // $htmlHeader = "";

        $htmlFooter = View::make('emails.footer')->render();
        // $htmlFooter = "";

        $fullHTML.= $htmlHeader.$htmlBody.$htmlFooter;


        // dd($fullHTML);
        // return $fullHTML;

        $data = array(
            "sender" => array(
                "email" => env('BREVO_EMAIL'),
                "name" => env('ADMIN_NAME'),         
            ),
            "to" => array(
                array(
                    "email" => $to_email,
                    "name" => $to_name, 
                )
                ,
                // can copy/paste array above
            ),
            "subject" => $subject,
            "htmlContent" => $fullHTML
    
        );
    
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, env('API_URL'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Api-Key: '.env('API_KEY');
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
        $response = curl_exec($ch);

        // dd($response);
    
        if (curl_errno($ch)) {
            $responce = 'Error:' . curl_error($ch);
        }
        else{
            $responce = 1;

        }
        curl_close($ch);

        return $response;
    }


}