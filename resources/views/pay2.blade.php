<!DOCTYPE html>

<html>

	<head>
		
		<meta charset="utf-8">
		<meta name="description" content="Курсы детского питания" />
		<meta name="keywords" content="детское питание, курсы, обучение" />
		<meta name="Viewport" content="width=device-width">
	
		<link href="{{ asset('icon.ico') }}" rel="shortcut icon" type="image/x-icon">
		<link href="{{ asset('css/stylemsp.css') }}" rel="stylesheet">	
		
		<title>Купить курс {{ $kurs }}</title>
		
	</head>

	<body>
	
		<header>
			<h1>
			Купить {{ $kurs }}
			<h1>
        </header>
		<main>
		
			<p class="price">
				Стоимость: <b class="pr">{{  round(32.66*$pr) }}</b> RUB (<b class="pr">{{  $pr }}</b> BYN) <br>
				Нажмите на кнопку оплаты
			</p>
				
			<div class="col">
				<br><br>
				Оплата через {{$y}}
				<br><br>
					<img class="img" src = {{ asset( $img ) }}>
				<br><br>
				<form method="POST" action="https://money.yandex.ru/quickpay/confirm.xml">
					<input type="hidden" name="receiver" value="410017316711554"> 
					<input type="hidden" name="label" value="{{$idBuy}}"> 
					<input type="hidden" name="quickpay-form" value="donate"> 
					<input type="hidden" name="targets" value="Консультант прикорма"> 
					<input type="hidden" name="sum" value="{{round(32.66*$pr)}}" data-type="number">   
					<input type="hidden" name="successURL" value="http://4ipolina.com/ok">  
					<input type="hidden" name="paymentType" value="{{$payType}}">
					<input type="submit" value="Оплатить" class="button"><br><br>
				</form>
			</div>
			<br>
			
			<a class="button" href="{{route('welcome')}}">
				Отмена
			</a>
		
		</main>
			
		
		
	
	</body>
	
</html>