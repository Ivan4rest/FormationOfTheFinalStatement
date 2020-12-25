<?php if((isset($_COOKIE['admin']) == FALSE) && (isset($_COOKIE['student']) == FALSE) && (isset($_COOKIE['teacher']) == FALSE)){ ?>
	<html>
		<head lang="ru">
			<meta charset="UTF-8">
			<title>Практика Лесных Ивана 1.1 группа</title>
			<link href="css\mystyle.css" rel="stylesheet" type="text/css"/>
		</head>
		<body>
			<div class="wrapper">
				<div class="centering">
					<form class="input_form" action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/validation/registration_validation.php" method="post">
						<p class="input_title">Регистрация</p><br/>			
						<div class="input_cell">
							ФИО<br/><input type="text" name="fio_input" class="input_data" required=""/>
						</div><br/>			
						<div class="input_cell">
							<label for="student_radio">Студент</label><input type="radio" name="position_input" id="student_radio" value="students" checked=""/>
							<label for="teacher_radio">Преподаватель</label><input type="radio" name="position_input" id="teacher_radio" value="teachers"/>
						</div><br/>	
						<div class="input_cell">
							Текущий курс<br/><input type="text" name="course_input" class="input_data" placeholder="Только для студентов"/>
						</div><br/>
						<div class="input_cell">
							Группа<br/><input type="text" name="group_input" class="input_data" placeholder="Только для студентов"/>
						</div><br/>
						<div class="input_cell">
							Кафедра<br/><input type="text" name="department_input" class="input_data" placeholder="Только для преподавателей"/>
						</div><br/>
						<div class="input_cell">
							Email<br/><input type="text" name="email_input" class="input_data" required=""/>
						</div><br/>
						<div class="input_cell">
							Придумайте Логин<br/><input type="text" name="login_input" class="input_data" required=""/>
						</div><br/>
						<div class="input_cell">
							Придумайте Пароль<br/><input type="text" name="password_input" class="input_data" required=""/>
						</div><br/>
						<div class="input_cell">
							<a href="login_page.php" class="centering mylink">Уже зарегистрирован</a>
						</div><br/>
						<button type="submit" class="mybtn">Зарегистрироваться</button>
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