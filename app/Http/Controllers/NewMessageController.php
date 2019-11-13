<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;
use App\Message;

class NewMessageController extends Controller
{
	public function index(){
      if(!empty($_GET['mes'])){
          return view('newMessage')->with(['mes' => 1]);
      }
		return view('newMessage');
	}
	
	public function index1(){
		
		$password = $_POST["password"];
		if($password == "1234567879qwerty") {
			//				
			  $picture = ""; $image = "";
			  if (!empty($_FILES['myFile']['tmp_name'])) 
			  { 
				$path = $_FILES['myFile']['name']; 
				if (copy($_FILES['myFile']['tmp_name'], $path)) $picture = $path; 
			  } 
			  if (!empty($_FILES['myImg']['tmp_name'])) 
			  { 
				$img = $_FILES['myImg']['name']; 
				if (copy($_FILES['myImg']['tmp_name'], $img)) $image = $img; 
			  } 
			  $thm = $_POST["name"];
			  $msg = $_POST["textik"];;
			  $mail_to = "maxtitovitch@mail.ru";
			  
			  if(empty($picture)) 
					$this->sendMail($thm, $msg, 'MIME-Version: 1.0' . "\r\n" . "Content-type: text/html; charset=utf-8 \r\n"); 
			  else 
					$this->send_mail($thm, $msg, $picture, $image); echo "ds"; 
			   return redirect()->route('welcome');
		} else {
			
			return redirect()->route('newMessage', ['mes'=> 1]);
		}
		  
	}
  
    public function inDBMail($thema, $multipart,  $headers){
      
       Message::truncate();
       $message =  new Message;
      
       $message->name = $thema;
       $message->text = $multipart;
       $message->header = $headers;
      
       $message->save();
    }
	
	public function sendMail($name, $textik, $headers){
		
		$mails = Mail::all();
		$id = 1; $str = "";
		foreach($mails as $key => $val){
			$str .= $val->mail . ", ";
			if($id == 10 || empty($mails[$key+1])) {
				$str = substr($str,0,-2);
				mail($str, $name, $textik, $headers);
				$id = 0;
			}
			$id++;
		}
		//dump($str);
		//mail('sportcompanyminsk@gmail.com', $name, $textik, $headers);
	}
	
	private function send_mail($thema, $html, $path, $image) { 
		if ($path) {  
			$fp = fopen($path,"rb");   
			if (!$fp) { 
				print "Cannot open file";   
				exit();   
			}   
			$file = fread($fp, filesize($path));   
			fclose($fp);   
		}  
		if ($image) {  
			$fp1 = fopen($image,"rb");   
			if (!$fp1) { 
				print "Cannot open file";   
				exit();   
			}   
			$file1 = fread($fp1, filesize($image));   
			fclose($fp1);   
		}  
		$name = "Бесплатная программа.pdf"; // в этой переменной надо сформировать имя файла (без всякого пути)  
		$name1 = "img.jpg";
		$EOL = "\r\n"; // ограничитель строк, некоторые почтовые сервера требуют \n - подобрать опытным путём
		$boundary     = "--".md5(uniqid(time()));  // любая строка, которой не будет ниже в потоке данных.  
		$headers    = "MIME-Version: 1.0;$EOL";   
		$headers   .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";  
		$headers   .= "From: 4ipolina@server.com";  
		  
		$multipart  = "--$boundary$EOL";   
		$multipart .= "Content-Type: text/html; charset=utf-8$EOL";   
		$multipart .= "Content-Transfer-Encoding: base64$EOL";   
		$multipart .= $EOL; // раздел между заголовками и телом html-части 
      $multipart .= chunk_split(base64_encode(str_replace ( "~~~" , "<br> <img src='cid:img_1' /> <br>", ('<pre>' . $html . '</pre>'))));   

		$multipart .=  "$EOL--$boundary$EOL";   
		$multipart .= "Content-Type: application/octet-stream; name=\"$name\"$EOL";   
		$multipart .= "Content-Transfer-Encoding: base64$EOL";   
		$multipart .= "Content-Disposition: attachment; filename=\"$name\"$EOL";   
		$multipart .= $EOL; // раздел между заголовками и телом прикрепленного файла 
		$multipart .= chunk_split(base64_encode($file));   
		if(isset($file1)){
			$multipart .=  "$EOL--$boundary$EOL";   
			$multipart .= "Content-Type: application/octet-stream; name=\"$name1\"$EOL";   
			$multipart .= "Content-Transfer-Encoding: base64$EOL";   
			$multipart .= "Content-Disposition: attachment; filename=\"$name1\"$EOL";
			$multipart .= "Content-ID: <img_1>$EOL";
			$multipart .= $EOL; // раздел между заголовками и телом прикрепленного файла 
			$multipart .= chunk_split(base64_encode($file1)); 
		}
		$multipart .= "$EOL--$boundary--$EOL";   
		
        //$this->sendMail($thema, $multipart,  $headers); 
        $this->inDBMail($thema, $multipart,  $headers); 
		
		//mail($mail_to, $thema, $multipart, $headers);

	}

 
	
}
