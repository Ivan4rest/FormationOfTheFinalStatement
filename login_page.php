<?php if((isset($_COOKIE['student']) == FALSE) && (isset($_COOKIE['teacher']) == FALSE)){ ?>
	<html>
		<head lang="en">
			<meta charset="UTF-8">
			<title>Практика Лесных Ивана 1.1 группа</title>
			<link href="css\mystyle.css" rel="stylesheet" type="text/css"/>
		</head>
		<body>
			<div class="wrapper">
				<div class="centering">
					<form class="input_form" action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/validation/authorization_validation.php" method="post">
						<p class="input_title">Вход</p><br/>
						<div class="input_cell">
							Логин<br/><input name="login_input" class="input_data" required=""/>
						</div><br/>
						<div class="input_cell">
							Пароль<br/><input name="password_input" class="input_data" type="password" required=""/>
						</div><br/>
						<div class="input_cell">
							<a href="index.php" class="centering mylink">Зарегистрироваться</a>
						</div><br/>
						<button type="submit" class="mybtn">Войти</button>
					</form>
				</div>							
			</div>
		</body>
	</html>
<?php
	}else{
		header('Location: http://www2.cs.vsu.ru/~lesnyh_i_e/practice/main_page.php');
	} 
?>