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
            <script type="text/javascript"> window.onload = function() {	alert("Неверный пароль!");	};</script>
		@endif
      
		<header>
			<h1>
				Консультант по прикорму: Полина Дворецкая <a class="none" href="https://www.instagram.com/4ipo_lina/">@4ipo_lina</a>
          </h1>
		</header>


		<main>
			<p class="price">Отправка письма для рассылки</p>
			<form method="POST" action="{{route('newMessagePost')}}" enctype="multipart/form-data" class="mailForm">
			{{ csrf_field() }}
					<input type="text" name="password" placeholder="Пароль" required><br><br>
					<input type="text" name="name" placeholder="Название" required><br><br>
					<textarea name="textik" placeholder="Текст" required></textarea><br><br>
					<label for = "password" class="myFile"> Pdf-файл </label><input type="file" name="myFile" required accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"><br><br>
					<label for = "password" class="myImg"> Картинка </label><input type="file" name="myImg" accept="image/*" /><br><br>

					<input class="button" type="submit" value="Отправить"><br><br>

			</form>
			
	
			
		</main>
		
	</body>
	
</html>