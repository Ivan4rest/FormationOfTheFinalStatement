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
							<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/validation/change_data_validation.php" method="POST">
								<?php
									$mysqli = new mysqli('www2.cs.vsu.ru', 'lesnyh_i_e', 'NewPass19', 'lesnyh_i_e');
									$id = $_COOKIE['admin'];
									$result = $mysqli->query("SELECT * FROM `admins` WHERE `id` = '$id'");
									$admin = $result->fetch_assoc();
								?>																
								<div class="input_cell">
									Логин<br/><input type="text" name="login_input" class="input_data" value="<?= $admin['login']?>"/>
								</div><br/>
								<div class="input_cell">
									Новый пароль<br/><input type="text" name="password_input" class="input_data"/>
								</div><br/>
								<?php
									$mysqli->close();
								?>
								<button type="submit" class="mybtn">Изменить данные</button>
							</form>
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
							<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/validation/change_data_validation.php" method="POST">
								<?php
									$mysqli = new mysqli('www2.cs.vsu.ru', 'lesnyh_i_e', 'NewPass19', 'lesnyh_i_e');
									$id = $_COOKIE['student'];
									$result = $mysqli->query("SELECT * FROM `students` WHERE `id` = '$id'");
									$student = $result->fetch_assoc();
								?>
								<div class="input_cell">
									ФИО<br/><input type="text" name="fio_input" class="input_data" value="<?= $student['fio']?>"/>
								</div><br/>	
								<div class="input_cell">
									Текущий курс<br/><input type="text" name="course_input" class="input_data" value="<?= $student['course']?>"/>
								</div><br/>
								<div class="input_cell">
									Группа<br/><input type="text" name="group_input" class="input_data" value="<?= $student['group']?>"/>
								</div><br/>
								<div class="input_cell">
									Email<br/><input type="text" name="email_input" class="input_data" value="<?= $student['email']?>"/>
								</div><br/>
								<div class="input_cell">
									Логин<br/><input type="text" name="login_input" class="input_data" value="<?= $student['login']?>"/>
								</div><br/>
								<div class="input_cell">
									Новый пароль<br/><input type="text" name="password_input" class="input_data"/>
								</div><br/>
								<?php
									$mysqli->close();
								?>
								<button type="submit" class="mybtn">Изменить данные</button>
							</form>
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
							<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/validation/change_data_validation.php" method="POST">
								<?php
									$mysqli = new mysqli('www2.cs.vsu.ru', 'lesnyh_i_e', 'NewPass19', 'lesnyh_i_e');
									$id = $_COOKIE['teacher'];
									$result = $mysqli->query("SELECT * FROM `teachers` WHERE `id` = '$id'");
									$teacher = $result->fetch_assoc();
								?>
								<div class="input_cell">
									ФИО<br/><input type="text" name="fio_input" class="input_data" value="<?= $teacher['fio']?>"/>
								</div><br/>																	
								<div class="input_cell">
									Кафедра<br/><input type="text" name="department_input" class="input_data" value="<?= $teacher['department']?>"/>
								</div><br/>
								<div class="input_cell">
									Email<br/><input type="text" name="email_input" class="input_data" value="<?= $teacher['email']?>"/>
								</div><br/>
								<div class="input_cell">
									Логин<br/><input type="text" name="login_input" class="input_data" value="<?= $teacher['login']?>"/>
								</div><br/>
								<div class="input_cell">
									Новый пароль<br/><input type="text" name="password_input" class="input_data"/>
								</div><br/>
								<?php
									$mysqli->close();
								?>
								<button type="submit" class="mybtn">Изменить данные</button>
							</form>
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