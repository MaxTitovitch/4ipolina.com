<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Buy;

class OkController extends Controller
{
	public function index()
	{
     
      if($_POST['label'] != ""){
			$sha = sha1(
				$_POST['notification_type'] . '&'. 
				$_POST['operation_id'] . '&' . 
				$_POST['amount'] . '&' . 
				$_POST['currency'] . '&' . 
				$_POST['datetime'] . '&' . 
				$_POST['sender'] . '&' . 
				$_POST['codepro'] . '&' . 
				'7Y7L0bGO9L6G93VDLZss/LZg' . '&' . 
				$_POST['label']
			);

            if ($sha != $_POST['sha1_hash'] or $_POST['codepro'] === true) exit("");

			$id = $_POST['label'];
			
			if($id != "66666") {
				$buy = Buy::select(['id', 'name', 'number', 'email', 'kurs', 'paymentType', 'pr'])->where('id', $id)->first();
				
				$this->sendMail($buy['name'], $buy['number'], $buy['email'], $buy['kurs'], $buy['paymentType'], $buy['pr']);
				
				Buy::destroy($id);
			} else {
				$this->sendMail("Ананимный отправитель", "Нету", "Нету", "Простая оплата", "Банковскую карту", $_POST['amount'] );
			}
          }
	}

	public function indexa()
	{
			$id = $_POST['item_number'];
			
			$buy = Buy::select(['id', 'name', 'number', 'email', 'kurs', 'paymentType', 'pr'])->where('id', $id)->first();
			
			$this->sendMail($buy['name'], $buy['number'], $buy['email'], $buy['kurs'], $buy['paymentType'], $buy['pr']);
			Buy::destroy($id);
	}
	
	private function sendMail($name, $number, $email, $kurs, $paymentType, $pr) 
	{

		$headers  = 'MIME-Version: 1.0' . "\r\n" . "Content-type: text/html; charset=utf-8 \r\n" ;

        $mesUser = "<H2>Здраствуйте, $name</h2> <br>Вы купили курс на сайте 4ipolina.com. Информация о заказе:<br>";
		$miMessage1 = "<H2>Здраствуйте, Полина!</h2> У вас купили курс на сайте 4ipolina.com через $paymentType.<br>";
      
		$miMessage = "<b>Имя пользователя</b>: $name.<br>";
		$miMessage .= "<b>Адрес электронной почты</b>: $email.<br>";
		$miMessage .= "<b>Номер телефона</b>: +$number.<br>";
		$miMessage .= "<b>Оплаченая сумма</b>: $pr RUB.<br>";
        $miMessage .= "<b> $kurs.<br>";
        $miMessage .= "<i>Письмо создано автоматически на сайте 4ipolina.com!</i>";      
      
        $miMessage1 .= $miMessage;
        $mesUser .= $miMessage . "<br><i>Мы свяжемся с вами в ближайшее время</i>";
      
		mail($email, 'Ваш заказ', $mesUser, $headers);
        mail('Polina-Dvoretskaya@mail.ru', 'Новый заказ', $miMessage1, $headers);
        mail('maxtitovitch@mail.ru', 'Новый заказ', $pr);
	}
	
}
