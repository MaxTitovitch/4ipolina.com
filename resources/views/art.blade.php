<!DOCTYPE html>

<html>

	<head>
		
		<meta charset="utf-8">
		<meta name="description" content="Курсы детского питания" />
		<meta name="keywords" content="детское питание, курсы, обучение" />
		<meta name="Viewport" content="width=device-width">
	
		<link href="{{ asset('icon.ico') }}" rel="shortcut icon" type="image/x-icon">
      <link href="{{ asset('css/stylemsp.css') }}" rel="stylesheet">	
		

		<title>{{ $art->name }}</title>
		
	</head>

	<body>

		<header>
			<h1>
			{{ $art->name }}
			<h1>
		</header>
		<main>
	
			<p class="text">
				{!! nl2br($art->text) !!}
			</p>
			<img src = {{ asset( $art->image ) }}><br><br>
			

			@foreach($prices as $price)
				<div class="maincol">
					<br>
					<div class="name">
						{{$price->pName}}
					</div><br>
					<div class="grand">
						{!! nl2br($price->pText) !!}
					</div><br>
					<b class="pr">{{  round(32.66*$price->price) }}</b> RUB (<b class="pr">{{  $price->price }}</b> BYN)<br>
					
					<form action="/pay/{{$art->id}}" id="myForm" method="get">
						<input id="im1" name="price" type="hidden"  value="{{$price->price}}">
						<input id="im2" name="mes" type="hidden"  value="{{$price->pName}}">
						<button class = "button bchose" type="submit">Выбрать</button>
					</form>
					
				</div>
			@endforeach
			

			<a class="button" href="{{route('welcome')}}">
				Назад
			</a>				
             
            @if($art->id !=6)
			<hr>	
			<img class="autor" src = {{ asset( "autor.jpg" ) }}><br><br>
			@endif
		
		</main>

		
	
	</body>
	
</html>