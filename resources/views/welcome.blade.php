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
      
      @if(!empty($mes))
            @if($mes == 1)
                      <script type="text/javascript"> window.onload = function() {	alert("Вы успешно получили рассылку!");	};</script>
            @elseif($mes == 2)
                       <script type="text/javascript"> window.onload = function() {	alert("Ошибка! Введён некорректный email!");	};</script>
            @endif   

      @endif
	
		<header>
			<h1>
				Консультант по прикорму и питанию детей Полина Дворецкая  <a class="none" href="https://www.instagram.com/4ipo_lina/">@4ipo_lina</a>
              <br>
              <div class="miList" align="left">   <p align="left">Мои курсы это:</p>
                    <img class="romb" width="10%" src = "../public/pom.png"> Вся обратная связь лично от меня, а не от помощников и кураторов<br>
                    <img class="romb" width="10%" src = "../public/pom.png"> Обновления и upgrade с каждым новым потоком<br>
                    <img class="romb" width="10%" src = "../public/pom.png"> Все материалы курсов и уроков остаются вам навсегда<br>
                
              </div>
          </h1>
		</header>
      
         <!--<header class="red">
      
              <form method="POST" action="/mailOk" class="formEmail">
                      {{ csrf_field() }}
                    <label class="email">
                      <b class="cr">БЕСПЛАТНАЯ рассылка "Причины отказа от еды"</b><br>
                      <i class="cri">(Если письмо не пришло в течение часа, пожалуйста, проверьте папку «Спам» в Вашем почтовом ящике)</i><br>
                    </label >
                <input type="email" name="mail" placeholder="email" required >
					<input class="button buttonEmail" type="submit" value="Получить">
			</form>
      
      </header>-->

		<main>
			@foreach($structs as $struct)
			<div class="maincol">
				<h2 class="name">
					{{ $struct->name }}
				</h2>
				<p >
					<a class="button" href="{{ route('showFacts', ['id' => $struct->id] ) }}">
						Подробнее...
					</a>
				</p>
			</div>
			@endforeach
	
			
		</main>
	
	</body>
	
</html>