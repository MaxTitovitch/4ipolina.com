<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Message;

class MailOkController extends Controller
{
	public function index()
	{
      $this->sendMail($_POST["mail"]);
      if (!preg_match(" /^([a-z0-9_-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/ ", $_POST["mail"]) ) {
			$scriptMessage = 2;
            return  redirect()->route('welcome', ['scriptMessage'=> $scriptMessage]);
		}
      
        
        $lastMail = Mail::select(['id', 'mail'])->where('mail', $_POST["mail"])->first();
		if ($lastMail ===  NULL) {

			$mail= new Mail;
			$mail->mail = $_POST["mail"];
			$mail->save();
          
        }
        $scriptMessage = 1;      
      return  redirect()->route('welcome', ['scriptMessage'=> $scriptMessage]);
	}
  
  	public function sendMail($to){
      
		$messages = Message::select(['name', 'text', 'header'])->first();
		mail($to, $messages->name, $messages->text, $messages->header);

		}
  
}
