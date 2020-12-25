<?php
	$mysqli = new mysqli('www2.cs.vsu.ru', 'lesnyh_i_e', 'NewPass19', 'lesnyh_i_e');
	
	$id = $_COOKIE['admin'];
	if(isset($_POST['subject_input'])){
		$subject = filter_var(trim($_POST['subject_input']), FILTER_SANITIZE_STRING);
	}
	if(isset($_POST['course_input'])){
		$course = filter_var(trim($_POST['course_input']), FILTER_SANITIZE_STRING);
	}
	if(isset($_POST['group_input'])){
		$group = filter_var(trim($_POST['group_input']), FILTER_SANITIZE_STRING);
	}
	if(isset($_POST['id_teacher_input'])){
		$id_teacher = filter_var(trim($_POST['id_teacher_input']), FILTER_SANITIZE_STRING);
	}
	
	if((mb_strlen($subject) < 1) || (mb_strlen($subject) > 100)){
		echo "Недопустимая длинна поля Предмет";
		exit();
	}else if(mb_strlen($course) < 1 || mb_strlen($course) > 2){
		echo "Недопустимая значение поля Курс";
		exit();
	}else if(mb_strlen($group) < 1 || mb_strlen($group) > 10){
		echo "Недопустимая значение поля Группа";
		exit();
	}else if(mb_strlen($id_teacher) < 1 || mb_strlen($id_teacher) > 11){
		echo "Недопустимая значение поля ID Преподавателя";
		exit();
	}
	
	$mysqli->query("INSERT INTO `subjects` (`subject`, `course`, `group`, `id_teacher`) VALUES('$subject', '$course', '$group', '$id_teacher')");
		
	$mysqli->close();
	
	header('Location: http://www2.cs.vsu.ru/~lesnyh_i_e/practice/add_subject.php');
	exit();
?>