<?php
	$id = "";
	$fio = "";	
	$course = "";
	$group = "";
	$department = "";
	
	if(isset($_POST['id_input'])){
		$id = filter_var(trim($_POST['id_input']), FILTER_SANITIZE_STRING);
	}
	if(isset($_POST['fio_input'])){
		$fio = filter_var(trim($_POST['fio_input']), FILTER_SANITIZE_STRING);	
	}
	if(isset($_POST['course_input'])){
		$course = filter_var(trim($_POST['course_input']), FILTER_SANITIZE_STRING);
	}
	if(isset($_POST['group_input'])){
		$group = filter_var(trim($_POST['group_input']), FILTER_SANITIZE_STRING);
	}
	if(isset($_POST['department_input'])){
		$department = filter_var(trim($_POST['department_input']), FILTER_SANITIZE_STRING);
	}
	
	$mysqli = new mysqli('www2.cs.vsu.ru', 'lesnyh_i_e', 'NewPass19', 'lesnyh_i_e');
	
	if((isset($_COOKIE['student']) == FALSE) && (isset($_COOKIE['teacher']) == FALSE)){
		header('Location: /');
	}elseif(isset($_COOKIE['student']) && (isset($_COOKIE['teacher']) == FALSE)){		
		if($id == ""){
			if($department == ""){
				if($fio == ""){
					echo "Заполните хотя бы одно поле!";
				}else{
					$result = $mysqli->query("SELECT * FROM `teachers` WHERE `fio` = '$fio'");
				}
			}else{
				if($fio == ""){
					$result = $mysqli->query("SELECT * FROM `teachers` WHERE `department` = '$department'");
				}else{
					$result = $mysqli->query("SELECT * FROM `teachers` WHERE `fio` = '$fio' AND `department` = '$department'");
				}
			}
		}else{
			$result = $mysqli->query("SELECT * FROM `teachers` WHERE `id` = '$id'");
		}
	}elseif((isset($_COOKIE['student']) == FALSE) && isset($_COOKIE['teacher'])){
		if($id == ""){
			if($fio == ""){
				if($course == ""){
					if($group == ""){
						echo "Заполните хотя бы одно поле!";
						exit();
					}else{
						$result = $mysqli->query("SELECT * FROM `students` WHERE `group` = '$group'");
					}
				}else{
					if($group == ""){
						$result = $mysqli->query("SELECT * FROM `students` WHERE `course` = '$course'");
					}else{
						$result = $mysqli->query("SELECT * FROM `students` WHERE `course` = '$course' AND `group` = '$group'");
					}
				}
			}else{
				if($course == ""){
					if($group == ""){
						$result = $mysqli->query("SELECT * FROM `students` WHERE `fio` = '$fio'");
					}else{
						$result = $mysqli->query("SELECT * FROM `students` WHERE `fio` = '$fio' AND `group` = '$group'");
					}
				}else{
					if($group == ""){
						$result = $mysqli->query("SELECT * FROM `students` WHERE `fio` = '$fio' AND `course` = '$course'");
					}else{
						$result = $mysqli->query("SELECT * FROM `students` WHERE `fio` = '$fio' AND `course` = '$course' AND `group` = '$group'");
					}
				}
			}
		}else{
			$result = $mysqli->query("SELECT * FROM `students` WHERE `id` = '$id'");
		}
	}
	$mysqli->close();

	if((isset($_COOKIE['student']) == FALSE) && (isset($_COOKIE['teacher']) == FALSE)){
		header('Location: http://www2.cs.vsu.ru/~lesnyh_i_e/practice/index.php');
	}elseif(isset($_COOKIE['student']) && (isset($_COOKIE['teacher']) == FALSE)){
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
							<table class="table_output" border="3">
								<tr class="title_table_output"><td>ID</td><td>Преподаватель</td><td>Кафедра</td><td>Email</td></tr>
								<?php
									while($teachers = mysqli_fetch_array($result)):										
								?>										
									<tr><td><?=$teachers['id']?></td><td><?=$teachers['fio']?></td><td><?=$teachers['department']?></td><td><?=$teachers['email']?></td></tr>
								<?php endwhile;?>									
							</table>
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
	}elseif((isset($_COOKIE['student']) == FALSE) && isset($_COOKIE['teacher'])){
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
							<table class="table_output" border="3">
								<tr class="title_table_output"><td>ID</td><td>Студент</td><td>Курс</td><td>Группа</td><td>Email</td></tr>
								<?php
									while($students = mysqli_fetch_array($result)):										
								?>										
									<tr>
										<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/view_grades.php" method="post">
											<td><label><?=$students['id']?></label><input class="input_table" type="hidden" name="input_student_id" readonly="readonly" value="<?=$students['id']?>"/></td>
											<td><label><?=$students['fio']?></label><input class="input_table" type="hidden" name="input_student_fio" readonly="readonly" value="<?=$students['fio']?>"/></td>
											<td><label><?=$students['course']?></label><input class="input_table" type="hidden" name="input_student_course" readonly="readonly" value="<?=$students['course']?>"/></td>
											<td><label><?=$students['group']?></label><input class="input_table" type="hidden" name="input_student_group" readonly="readonly" value="<?=$students['group']?>"/></td>
											<td><label><?=$students['email']?></label><input class="input_table" type="hidden" name="input_student_email" readonly="readonly" value="<?=$students['email']?>"/></td>											
											<td><button type="submit" class="btn_table">Посмотреть оценки</button></td>
										</form>
									</tr>
								<?php endwhile;?>									
							</table>							
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