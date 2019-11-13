<?php

namespace App\Http\Controllers;

use App\Struct;
use App\Buy;
use App\Code;

class ArtController extends Controller
{
	public function index($id)
	{
		$art = Struct::select(['id', 'name', 'text', 'image', 'price', 'price2', 'price3', 'price4'])->where('id', $id)->first();
		$prices = $art->prices()->get();
		//dump($prices);
		if ($art === NULL) {
			return redirect()->route('welcome');
		}
		return view ('art')->with(['art' => $art, 'prices' => $prices]);
	}

	
	public function show($id)
	{
		$art = Struct::select(['id', 'name', 'text', 'price', 'price2', 'price3', 'price4'])->where('id', $id)->first();
		if ($art === NULL) {
			return redirect()->route('welcome');
		}

		if(($pr = $_GET['price']) == NULL || ($mes = $_GET['mes']) == NULL){
			return redirect()->route('welcome');
		}
			
	
		return view ('pay')->with(['art' => $art, 'pr' => $pr, 'mes' => $mes]);
	}
	
	public function show2($id)
	{
        $pr = $_POST["pr"];
        $code = $_POST["code"];
        $kurs = $_POST["kurs"];
     
      	$pr = $this->pr($pr, $code, $kurs);
      
		$idBuy = $this->inDB($_POST["name"], $_POST["number"], $_POST["email"], $kurs, $pr, $_POST["paymentType"]);
		
		switch ($_POST["paymentType"]) {
			case 1: return $this->go(1, $idBuy, $pr, $kurs, $code ); break;
			case 2: return $this->go(2, $idBuy, $pr, $kurs, $code ); break;
			case 3: return $this->go(3, $idBuy, $pr, $kurs, $code ); break;
		}
	}
	
     private function go($payType, $idBuy, $pr, $kurs, $code) {       
		if($payType == 1)
			return view ('pay2')->with(['payType' => "PC", 'idBuy' => $idBuy, 'pr' => round( $pr, 2), 'kurs' => $kurs, "y" => "Яндекс Деньги", "img" => "YD.png"]);
		elseif($payType == 2)
			return view ('pay2')->with(['payType' => "AC", 'idBuy' => $idBuy, 'pr' => round( $pr, 2), 'kurs' => $kurs, "y" => "Банковскую карту", "img" => "BK.png"]);
        else 
           return redirect()->route('welcome');              
	}
  
    	private function pr($pr, $code, &$kurs) {
		$codes = Code::all();

		foreach($codes as $val){
			if($val->code == $code) {
				$kurs .= " Применён промокод: " . $val->code . " -" . $val->percent . "%" ;
				return $pr -( $pr*($val->percent)*0.01);
			}
			//dump($val->code);
		}
		
		return $pr;
	}
	
	private function inDB($name, $number, $email, $kurs, $pr, $paymentType){
		$bye= new Buy;
		
		$bye->name = $name;
		$bye->number = $number;
		$bye->email = $email;
		$bye->kurs = $kurs;
		$bye->pr =  round( $pr, 2);
		switch($paymentType) {
			case 1: $bye->paymentType ="Яндекс.Деньги"; break;
			case 2: $bye->paymentType ="Банковская карта"; break;
			case 3: $bye->paymentType ="Сервис PayPal"; break;
		}
		$bye->save();
		
		return $bye->id;
	}
	
}
