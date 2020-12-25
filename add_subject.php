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
						<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/validation/add_subject_validation.php" method="POST">
							<div class="input_cell">
								Предмет<br/><input type="text" name="subject_input" class="input_data" required=""/>
							</div><br/>
							<div class="input_cell">
								Курс<br/><input type="text" name="course_input" class="input_data" required=""/>
							</div><br/>
							<div class="input_cell">
								Группа<br/><input type="text" name="group_input" class="input_data" required=""/>
							</div><br/>
							<div class="input_cell">
								ID Преподавателя<br/><input type="text" name="id_teacher_input" class="input_data" required=""/>
							</div><br/>
							<button type="submit" class="mybtn">Добавить предмет</button>
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