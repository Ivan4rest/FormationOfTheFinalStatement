<?php
	if((isset($_COOKIE['admin']) == FALSE) && (isset($_COOKIE['student']) == FALSE) && (isset($_COOKIE['teacher']) == FALSE)){
		header('Location: http://www2.cs.vsu.ru/~lesnyh_i_e/practice/index.php');
	}elseif(isset($_COOKIE['admin']) && (isset($_COOKIE['student']) == FALSE) && (isset($_COOKIE['teacher']) == FALSE)){
?>
	<html>
		<head lang="ru">
			<meta charset="UTF-8">
			<title>Практика Лесных Ивана 1.1 группа</title>
			<link href="css\mystyle.css" rel="stylesheet" type="text/css"/>
		</head>
		<body>
			<div class="wrapper">				
				<div class="header">
					<div class="inner_header">
						<div class="clearfix">
							<div class="wrap_header_btn float_left">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/main_page.php">
									<button type="submit" class="btn_header">Главная</button>
								</form>								
							</div>
							<div class="wrap_header_btn float_left">								
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/add_subject.php">
									<button type="submit" class="btn_header">Добавить предмет</button>
								</form>								
							</div>
							<div class="wrap_header_btn float_right">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/exit.php">
									<button type="submit" class="btn_header">Выйти</button>
								</form>
							</div>
							<div class="wrap_header_btn float_right">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/my_page.php">
										<button type="submit" class="btn_header">Мой профиль</button><br/>
								</form>
							</div>													
						</div>
					</div>
				</div>
				<div class="clearfix">
					<div class="content">
						<div class="inner_content">
							<h1>
								Здравствуйте, это веб-приложение для создания итоговых ведомостей.<br>
								В качестве администратора вы можете добавлять предметы для студентов и преподавателей, также можете изменять личные данные.
							</h1>
						</div>
					</div>
				</div>
				<div class="footer">
					<div class="inner_footer centering">Практическая работа Лесных Ивана группа 1.1</div>
				</div>
			</div>
		</body>
	</html>
<?php
	}elseif((isset($_COOKIE['admin']) == FALSE) && isset($_COOKIE['student']) && (isset($_COOKIE['teacher']) == FALSE)){
?>
	<html>
		<head lang="ru">
			<meta charset="UTF-8">
			<title>Практика Лесных Ивана 1.1 группа</title>
			<link href="css\mystyle.css" rel="stylesheet" type="text/css"/>
		</head>
		<body>
			<div class="wrapper">				
				<div class="header">
					<div class="inner_header">
						<div class="clearfix">
							<div class="wrap_header_btn float_left">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/main_page.php">
									<button type="submit" class="btn_header">Главная</button>
								</form>								
							</div>
							<div class="wrap_header_btn float_left">								
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/my_grades.php">
									<button type="submit" class="btn_header">Мои оценки</button>
								</form>								
							</div>
							<div class="wrap_header_btn float_left">							
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/search_input_data.php">
									<button type="submit" class="btn_header">Найти преподавателя</button>
								</form>
							</div>
							<div class="wrap_header_btn float_right">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/exit.php">
									<button type="submit" class="btn_header">Выйти</button>
								</form>
							</div>
							<div class="wrap_header_btn float_right">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/my_page.php">
										<button type="submit" class="btn_header">Мой профиль</button><br/>
								</form>
							</div>													
						</div>
					</div>
				</div>
				<div class="clearfix">
					<div class="content">
						<div class="inner_content">
							<h1>
								Здравствуйте, это веб-приложение для создания итоговых ведомостей.<br>
							</h1>
							<h2>
								В качестве студента вы можете:
								<ul>									
									<li>просматривать свои оценки;</li>
									<li>искать преподавателей;</li>
									<li>изменять свои личные данные.</li>
								</ul>
							</h2>
						</div>
					</div>
				</div>
				<div class="footer">
					<div class="inner_footer centering">Практическая работа Лесных Ивана группа 1.1</div>
				</div>
			</div>
		</body>
	</html>	
<?php 
	}elseif((isset($_COOKIE['admin']) == FALSE) && (isset($_COOKIE['student']) == FALSE) && isset($_COOKIE['teacher'])){
?>
	<html>
		<head lang="ru">
			<meta charset="UTF-8">
			<title>Практика Лесных Ивана 1.1 группа</title>
			<link href="css\mystyle.css" rel="stylesheet" type="text/css"/>
		</head>
		<body>
			<div class="wrapper">
				<div class="header">
					<div class="inner_header">
						<div class="clearfix">
							<div class="wrap_header_btn float_left">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/main_page.php">
									<button type="submit" class="btn_header">Главная</button>
								</form>
							</div>
							<div class="wrap_header_btn float_left">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/my_grades.php">
									<button type="submit" class="btn_header">Мои оценки</button>
								</form>
							</div>
							<div class="wrap_header_btn float_left">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/add_grade.php">
									<button type="submit" class="btn_header">Добавить оценку</button>
								</form>
							</div>
							<div class="wrap_header_btn float_left">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/search_input_data.php">
									<button type="submit" class="btn_header">Найти студента</button>
								</form>
							</div>
							<div class="wrap_header_btn float_right">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/exit.php">
									<button type="submit" class="btn_header">Выйти</button>
								</form>
							</div>
							<div class="wrap_header_btn float_right">
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/my_page.php">
										<button type="submit" class="btn_header">Мой профиль</button><br/>
								</form>
							</div>													
						</div>
					</div>
				</div>
				<div class="clearfix">									
					<div class="content">
						<div class="inner_content">
							<h1>
								Здравствуйте, это веб-приложение для создания итоговых ведомостей.<br>
							</h1>
							<h2>
								В качестве преподавателя вы можете:
								<ul>									
									<li>просматривать свои оценки;</li>
									<li>добавлять оценки;</li>
									<li>искать студентов;</li>								
									<li>изменять свои личные данные.</li>
								</ul>
							</h2>
						</div>
					</div>
				</div>
				<div class="footer">
					<div class="inner_footer centering">Практическая работа Лесных Ивана группа 1.1</div>
				</div>
			</div>
		</body>
	</html>
<?php }?>