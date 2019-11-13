<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Code;

class NewCodeController extends Controller
{
    public function index() {
		if(!empty($_GET['mes'] )) {
		   if($_GET['mes'] == 1) {
			  return view ('newCode')->with(['mes' =>1 ]);
			} elseif($_GET['mes'] == 2){
			  return view ('newCode')->with(['mes' => 2 ]);
		   }

		}
		return view ('newCode');		
	}
	
	public function index1() {
		if ($_POST['password'] != "1234567879qwerty") {
			return redirect()->route('newCode', ['mes'=> 1]);
		}
		if($_POST['percent'] >= 100 or $_POST['percent'] <= 0) {
			return redirect()->route('newCode', ['mes'=> 2]);
		}
		$percent = $_POST['percent'];
		$promoCode = $_POST['promoCode'];
		$this->newPCode($percent, $promoCode);
		
		return redirect()->route('welcome');
	}
	
	public function newPCode($percent, $promoCode) {
		$code = new code;
		
		$code->percent = $percent;
		$code->code = $promoCode;
		
		$code->save();
		
	}
	
}
