<?php
	if(isset($_COOKIE['teacher']) == FALSE){
		header('Location: http://www2.cs.vsu.ru/~lesnyh_i_e/practice/index.php');
	}
	else{
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
							<?php
								$mysqli = new mysqli('www2.cs.vsu.ru', 'lesnyh_i_e', 'NewPass19', 'lesnyh_i_e');
								$id = $_POST['input_student_id'];
								$result = $mysqli->query("SELECT * FROM `grades` WHERE `id_student` = '$id' ORDER BY `course`");									
							?>
							<label class="label"><?=$_POST['input_student_fio']?>, <?=$_POST['input_student_course']?> Курс, <?=$_POST['input_student_group']?> Группа</label>
							<table class="table_output" border="3">
								<tr class="title_table_output"><td>Курс</td><td>Предмет</td><td>Оценка</td><td>Препадователь</td><td>Комментарий</td></tr>
								<?php
									while($grades = mysqli_fetch_array($result)):
										$teacher_id = $grades['id_teacher'];
										$result2 = $mysqli->query("SELECT * FROM `teachers` WHERE `id` = '$teacher_id'");
										$teacher_fio = $result2->fetch_assoc();
								?>										
									<tr><td><?=$grades['course']?></td><td><?=$grades['subject']?></td><td><?=$grades['grade']?></td><td><?=$teacher_fio['fio']?></td><td><?=$grades['comment']?></td></tr>
								<?php endwhile;?>									
							</table>
							<?php
								$mysqli->close();
							?>															
						</div>
					</div>
				</div>
				<div class="footer">
					<div class="inner_footer centering">Практическая работа Лесных Ивана группа 1.1</div>
				</div>													
			</div>
		</body>
	</html>
<?php } ?>