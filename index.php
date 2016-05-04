<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Шахматы</title>
		<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8" >
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/styles.css" type="text/css"  rel="stylesheet">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="js/script.js"></script>
	</head>
	<body>
		<div id="content">
			<div id="chess-box">
				<div class="chess-head">
					<h1>Игра в одном окне</h1>
					<div id="new">
						<h2>Настройка новой игры</h2>
						<div class="param">
							<label>Число игроков</label>
							<div class="slider" id="players"></div>
						</div>
						<div class="param">
							<label>Ширина доски</label>
							<div class="slider" id="deskwidth"></div>
						</div>
						<div class="param">
							<label>Высота доски</label>
							<div class="slider" id="deskheight"></div>
						</div>
						<div class="buttons">
							<button>Создать</button>
						</div>
					</div>
<!--					<div id="tools">
						<a href="javascript:void()" id="chess-logout">Выйти из игры</a>
						<a href="javascript:void()" id="chess-login">Играть</a>
						<a href="javascript:void()" id="chess-pat">Пат</a>
					</div>-->
				</div>
				<div id="desk">

				</div>
				<div id="log-box">
					<ul id="users">
						<li class="active">Белые</li>
						<li>Черные</li>
					</ul>
					<div id="log">
						
					</div>
				</div>
			</div>
			<div id="info">
				<h2 id="tab1">Прогресс</h2>
				<div id="tab1c">
					<h3>Сделано</h3>
					<ul>
						<li>База фронтэнда. Доступно конфигурирование игры. Адаптивность интерфейса. Нестандартные размеры - подготовка к реаизации разичных видовшахмат отичных от классических</li>
					</ul>
					<h3>В процессе</h3>
					<p>Построение фронтенда</p>
					<ul>
					</ul>
					<h3>Сделать</h3>
					<ul>
						<li>Адаптивность доски к любым разрешениям</li>
						<li>Базовые варианты ходов фигурами</li>
						<li>Атака пешкой</li>
						<li>Превращение пешки в фигуру</li>
						<li>Рокировка</li>
						<li>Доступ к доске дргим посетителям</li>
						<li>Скины для доски</li>
					</ul>
				</div>
				<h2 id="tab2">Об игре</h2>
				<div id="tab2c">
					<p>Игра пишется вкачестве разминки мозга, ни на какие изюминки для игроков не претендует</p>
					<p>Задача максимум: игра в шахматы проверяющая валидность ходов сделанных игроками. Дожна позволять играть как в одном окне браузера, так и в двух. Доступ к доске осуществлять по ссылке. Играть могут только двое игроков. Остальные зрители.</p>
					<p>С технической стороны. Хранение игр опционально в файах или в БД. Обмен ходами и обновление игровой ситуации опционально: обновление по временному интервалу, long pool или сокеты. Адаптивность игры к любым устройствам. Испоьзоать при создании: PHP (без фреймворков) и JavaScript (c jQuery). Вариации размера доски.</p>
				</div>
				<article>Исходники <a href="https://github.com/Voral/SampleChess">на GitHub</a></article>
			</div>
		</div>
	</body>
</html>