<?php
	$fio = filter_var(trim($_POST['fio_input']), FILTER_SANITIZE_STRING);
	$position = filter_var(trim($_POST['position_input']), FILTER_SANITIZE_STRING);
	$course = filter_var(trim($_POST['course_input']), FILTER_SANITIZE_STRING);
	$group = filter_var(trim($_POST['group_input']), FILTER_SANITIZE_STRING);
	$email = filter_var(trim($_POST['email_input']), FILTER_SANITIZE_STRING);
	$department = filter_var(trim($_POST['department_input']), FILTER_SANITIZE_STRING);
	$login = filter_var(trim($_POST['login_input']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password_input']), FILTER_SANITIZE_STRING);
	
	if((mb_strlen($fio) < 1) || (mb_strlen($fio) > 100)){
		echo "Недопустимая длинна ФИО";
		exit();
	}else if(mb_strlen($position) < 1){
		echo "Укажите студент или преподаватель";
		exit();
	}else if((mb_strlen($login) < 1) || (mb_strlen($login) > 100)){
		echo "Недопустимая длинна логина";
		exit();
	}else if((mb_strlen($password) < 1) || (mb_strlen($password) > 100)){
		echo "Недопустимая длинна пароля";
		exit();
	}else if(($position == "students") && (mb_strlen($course) < 1 || mb_strlen($course) > 2)){
		echo "Недопустимая значение поля Курс";
		exit();
	}else if(($position == "students") && (mb_strlen($group) < 1 || mb_strlen($group) > 2)){
		echo "Недопустимая значение поля Группа";
		exit();
	}else if((mb_strlen($email) < 1) || (mb_strlen($email) > 100)){
		echo "Недопустимая длинна email";
		exit();
	}else if(($position == "teachers") && (mb_strlen($department) < 1 || mb_strlen($department) > 1000)){
		echo "Недопустимая значение поля Кафедра";
		exit();
	}
	$password = md5($password.$login);
	$mysqli = new mysqli('www2.cs.vsu.ru', 'lesnyh_i_e', 'NewPass19', 'lesnyh_i_e');
	if($position=="students"){
		$mysqli->query("INSERT INTO `students` (`fio`, `course`, `group`, `email`, `login`, `password`) VALUES('$fio', '$course', '$group', '$email', '$login', '$password')");
		$result = $mysqli->query("SELECT * FROM `students` WHERE `login` = '$login' AND `password` = '$password'");
		$student = $result->fetch_assoc();
		setcookie('student', $student['id'], time() + 3600, "/");
	}else if($position=="teachers"){
		$mysqli->query("INSERT INTO `teachers` (`fio`, `email`, `department`, `login`, `password`) VALUES('$fio', '$email', '$department', '$login', '$password')");
		$result = $mysqli->query("SELECT * FROM `teachers` WHERE `login` = '$login' AND `password` = '$password'");
		$teacher = $result->fetch_assoc();
		setcookie('teacher', $teacher['id'], time() + 3600, "/");
	}		
	$mysqli->close();
	
	header('Location: http://www2.cs.vsu.ru/~lesnyh_i_e/practice/index.php');
	exit();
?>