<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buy;

class TransportController extends Controller
{
    public function index() {
		if(!empty($_GET["error_am"])) {
			return view ('transport')->with(['error_am' =>"yes" ]);
		}
		return view ('transport');		
	}
	
	public function index1() {
		$pr = $_POST["mySum"];
		if($this->isNotUnsignedInt($pr)) {
			
			return redirect()->route('transporting', ["error_am" => "yes"]);
		}
		return view ('pay2')->with(['payType' => "AC", 'idBuy' => "66666", 'pr' => round($pr/32.66, 2), 'kurs' => "Простая оплата", "y" => "Банковскую карту", "img" => "BK.png"]);

	}
	
	public function isNotUnsignedInt($pr) {
		if(!is_numeric($pr)) return true;
		$pr = (int)$pr;
		if($pr <= 0) return true;
		return false;
	}
	
}
