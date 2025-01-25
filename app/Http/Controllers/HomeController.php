<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BlueMail;

use Illuminate\Support\Facades\View;

use App\Http\Controllers\HelperController;

use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function __construct(){

        session_start();


    }

    public static function email(Request $request){

        $email = $request->email;

        $subject = $request->subject;

        $message = $request->message;
        
        $feedback = ['message' => $message, 'subject' => $subject];

        $responce = BlueMail::generalEmail($email, $feedback);


        return view('home')->with('success', 'Email has beed sent!');
        
    }







}
