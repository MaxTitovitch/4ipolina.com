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
		
		@if(isset($mes))
            @if($mes == 1)
            <script type="text/javascript"> window.onload = function() {	alert("Неверный пароль!");	};</script>
            @elseif($mes == 2)
            <script type="text/javascript"> window.onload = function() {	alert("Введите цифру от 1 до 99 !");	};</script>
            @endif 
		@endif
		
		<header>
			<h1>
				Консультант по прикорму: Полина Дворецкая <a class="none" href="https://www.instagram.com/4ipo_lina/">@4ipo_lina</a>
          </h1>
		</header>


		<main>
			<p class="price">Добавление нового промокода</p> <!-- ! -->
			<form method="POST" action="{{route('newCodePost')}}" enctype="multipart/form-data" class="mailForm">
			{{ csrf_field() }}
				<div class="myForm">
					<input type="text" name="password" placeholder="Пароль" required><br><br>
					<input type="text" name="promoCode" placeholder="Промокод" required><br><br>
					<input type="text" name="percent" placeholder="Скидка(%)" required><br><br>

					<input class="button" type="submit" value="Добавить"><br><br>
				</div>
			</form><br><br>
			
	
			
		</main>
		
	</body>
	
</html>