<!DOCTYPE html>

<html>

	<head>
		
		<meta charset="utf-8">
		<meta name="description" content="Курсы детского питания" />
		<meta name="keywords" content="детское питание, курсы, обучение" />
		<meta name="Viewport" content="width=device-width">
	
		<link href="{{ asset('icon.ico') }}" rel="shortcut icon" type="image/x-icon">
		<link href="{{ asset('css/stylemsp.css') }}" rel="stylesheet">	
		
		<title>Купить курс "{{ $art->name }}"</title>
		
	</head>

	<body>
		<header>
			<h1>
			Купить курс "{{ $art->name }}" 
			<br>{{ $mes }}
          </h1>
		</header>
		<main>
		
			<p class="price">
				Стоимость: <b class="pr">{{  round(32.66*$pr) }}</b> RUB (<b class="pr">{{  $pr }}</b> BYN) <br>
				Заполните контактные данные и выберете наиболее удобный способ оплаты. <br>
				В случае успешной оплаты на ваш e-mail придёт подтверждающее письмо.<br>
				А затем, мы свяжимся с вами в ближайшее время.
			</p>

			<form method="POST" action="/pay2/{{$art->id}}" class="form">
			{{ csrf_field() }}
				<div class="myForm">
              <p class="price1">
              Форма заказа
              </p>
					<input type="text" name="name" size="21" placeholder="ФИО" required><br><br>
					<b>+</b><input type="number" name="number"  max="999999999999" name="phone" placeholder="Телефон" required> <br>
                    <i class="miMesNumb">*Вводите номер в международном формате</i><br><br>
					<input type="email" name="email" size="21" placeholder="email" required><br><br>
                    <input type="text" name="code" size="21" placeholder="Промокод"><br><br>
					
					<input type="hidden" name="kurs" value ='Курс "{{ $art->name }}", {{$mes}}'>
					<input type="hidden" name="pr" value ='{{$pr}}'>
					
					<label><input type="radio" name="paymentType" value="1" checked><b class="pay">Яндекс.Деньги</b></label><br><br>
					<label><input type="radio" name="paymentType" value="2"><b class="pay">Банк. карта</b></label><br><br>
					<input class="button" type="submit" value="Выбрать"><br><br>
				</div>
			</form>
			<br>
			
			<a class="button" href="{{route('welcome')}}" align ="center">
				Отмена
			</a>
		
		</main>

		
	
	</body>
	
</html>