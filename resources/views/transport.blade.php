<!DOCTYPE html>

<html>

	<head>
		
		<meta charset="utf-8">
		<meta name="description" content="Курсы детского питания" />
		<meta name="keywords" content="детское питание, курсы, обучение" />
		<meta name="Viewport" content="width=device-width">
	
		<link href="{{ asset('icon.ico') }}" rel="shortcut icon" type="image/x-icon">
		<link href="{{ asset('css/stylemsp.css') }}" rel="stylesheet">	
		
		
		<title>Консультант по прикорму: Полина Дворецкая</title>
		
	</head>

	<body>
		
		@if(isset($error_am))
            <script type="text/javascript"> window.onload = function() {	alert("Некорректная сумма: введите целое число!");	};</script>
		@endif
		
		<header>
			<h1>
				Оплата
          </h1>
		</header>


		<main>
			<p class="price">Введите в текстовое поле нужную сумму в российских рублях и нажмите кнопку «Оплатить». Оплатить можно с любой карты VISA или MasterCard. Используется сервис «Яндекс.деньги».</p>
			<form method="POST" action="{{route('transportingPost')}}" enctype="multipart/form-data" class="mailForm">
			{{ csrf_field() }}
				<div class="myForm">
					<input type="number" name="mySum" placeholder="Сумма, RUB" required><br><br>
					<input class="button" type="submit" value="Оплатить"><br><br>
				</div>
			</form><br><br>

		</main>
		
	</body>
	
</html>