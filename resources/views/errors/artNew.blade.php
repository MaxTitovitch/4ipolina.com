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
			@if(isset($art->price2))
			<form action="/pay/{{$art->id}}" id="myForm" method="get">

				<label for = "im1">
					<p class="price">
						<input id="im1" name="browser" type="radio"  value=1>
						Стоимость «Без обратной связи»:  <b class="pr">{{  round(32.66*$art->price) }}</b> RUB (<b class="pr">{{  $art->price }}</b> BYN)
					</p>
				</label>
				
				<label for = "im2">
					<p class="price">
						<input id="im2" name="browser" type="radio"  value=2>
						Стоимость «С обратной связью»:  <b class="pr">{{  round(32.66*$art->price2) }}</b> RUB (<b class="pr">{{  $art->price2 }}</b> BYN)
					</p>
				</label>
				
				<label for = "im3">
					<p class="price">
						<input id="im3" name="browser" type="radio"  value=3 checked>
						Стоимость «Все включено»: <b class="pr">{{  round(32.66*$art->price3) }}</b> RUB (<b class="pr">{{  $art->price3 }}</b> BYN)
					</p>
				</label>
					<button class = "button" type="submit">Купить</button>
			</form>
			@else
			<form action="/pay/{{$art->id}}" id="myForm" method="get">
				<label for = "im1">
					<p class="price">
						<input id="im1" name="browser" type="radio"  value=1 checked>
						Стоимость: <b class="pr">{{  round(32.66*$art->price) }}</b> RUB (<b class="pr">{{  $art->price }}</b> BYN) <br>
					</p>
				</label>
				<button class = "button" type="submit">Купить</button>
			</form>
			@endif

          <a class="button" href="{{route('welcome')}}">
				Назад
			</a>				
             
            @if($art->id !=5)
			<hr>	
			<img class="autor" src = {{ asset( "autor.jpg" ) }}><br><br>
			@endif
		
		</main>

		
	
	</body>
	
</html>