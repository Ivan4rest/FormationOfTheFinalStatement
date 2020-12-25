<?php
	if(isset($_COOKIE['teacher']) == FALSE){
		header('Location: http://www2.cs.vsu.ru/~lesnyh_i_e/practice/index.php');
	}
	else{
?>
	<html>
		<head lang="ru">
			<meta charset="UTF-8">
			<title>Практика Лесных Ивана 1 группа</title>
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
								$id_teacher = $_COOKIE['teacher'];
								
								$subject = "";
								$course = "";
								$group = "";
								
								if(isset($_POST['select_subject'])){
									$subject = $_POST['select_subject'];
								}
								if(isset($_POST['select_course'])){
									$course = $_POST['select_course'];
								}
								if(isset($_POST['select_group'])){
									$group = $_POST['select_group'];
								}
								
								if($subject == ""){
									$result_subject = $mysqli->query("SELECT * FROM `subjects` WHERE `id_teacher` = '$id_teacher' GROUP BY `subject`");
							?>
								<div class="centering myselect">
									<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/add_grade.php" method="post">									
										<label for="select_subject">Выберите предмет: </label>
										<select id="select_subject" name="select_subject">
										<?php while($subjects = mysqli_fetch_array($result_subject)): ?>
											<option><?=$subjects['subject']?></option>								
										<?php endwhile;?>						
										</select>
										<button type="submit" class="mybtn">Далее</button>
									</form>
								</div>
							<?php		
								}elseif($course == ""){
									$result_course = $mysqli->query("SELECT * FROM `subjects` WHERE `id_teacher` = '$id_teacher' AND `subject` = '$subject' GROUP BY `course`");
							?>
								<div class="centering myselect">
									<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/add_grade.php" method="post">
										<input type="hidden" name="select_subject" value="<?=$subject?>"/>
										<label for="select_course">Выберите курс: </label>
										<select id="select_course" name="select_course">										
										<?php while($courses = mysqli_fetch_array($result_course)): ?>										
											<option><?=$courses['course']?></option>								
										<?php endwhile;?>						
										</select>
										<button type="submit" class="mybtn">Далее</button>
									</form>
								</div>
							<?php
								}elseif($group == ""){
									$result_group = $mysqli->query("SELECT `group` FROM `subjects` WHERE `id_teacher` = '$id_teacher' AND `subject` = '$subject' AND `course` = '$course' GROUP BY `group`");
							?>
								<div class="centering myselect">
									<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/add_grade.php" method="post">
										<input type="hidden" name="select_subject" value="<?=$subject?>"/>
										<input type="hidden" name="select_course" value="<?=$course?>"/>
										<label for="select_group">Группа: </label>
										<select id="select_group" name="select_group">							
										<?php while($groups = mysqli_fetch_array($result_group)): ?>										
											<option><?=$groups['group']?></option>								
										<?php endwhile;?>						
										</select>
										<button type="submit" class="mybtn">Далее</button>
									</form>
								</div>
							<?php
								}else{									
									$result = $mysqli->query("SELECT * FROM `students` WHERE `course` = '$course' AND `group` = '$group' ORDER BY `fio`");								
							?>
								<form action="http://www2.cs.vsu.ru/~lesnyh_i_e/practice/validation/add_grade_validation.php" method="post">
									<input type="hidden" name="select_subject" value="<?=$subject?>"/>
									<input type="hidden" name="select_course" value="<?=$course?>"/>
									<input type="hidden" name="select_group" value="<?=$group?>"/>
									<label class="label centering"><?="Предмет:".$subject." Курс:".$course." Группа:".$group?></label>
									<table class="table_output" border="3">
										<tr class="title_table_output"><td>Студент</td><td>Оценка</td><td>Комментарий</td></tr>
										<?php											
											while($students = mysqli_fetch_array($result)){
										?>
											<tr><td><?=$students['fio']?></td><td><input type='text' class="input_table" name="<?="input_grade_".$students['id']?>"/></td><td><input type='text' class="input_table" name="<?="input_comment_".$students['id']?>"/></td></tr>
										<?php } ?>									
									</table>									
									<button type="submit" class="mybtn">Поставить оценки</button>									
								</form>
							<?php
								}
								$mysqli->close();
							?>																
						</div>
					</div>
				</div>
				<div class="footer">
					<div class="inner_footer centering">Practice Ivan Lesnykh group 1.1</div>
				</div>					
			</div>
		</body>
	</html>
<?php }?>