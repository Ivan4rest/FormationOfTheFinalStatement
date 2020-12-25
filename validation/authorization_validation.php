<?php

	$login = filter_var(trim($_POST['login_input']), FILTER_SANITIZE_STRING);	
	$password = filter_var(trim($_POST['password_input']), FILTER_SANITIZE_STRING);
	
	if((mb_strlen($login) < 1) || (mb_strlen($login) > 100)){
		echo "Недопустимая длинна логина";
		exit();
	}else if((mb_strlen($password) < 1) || (mb_strlen($password) > 100)){
		echo "Недопустимая длинна пароля";
		exit();
	}
	$password = md5($password.$login);
	
	$mysqli = new mysqli('www2.cs.vsu.ru', 'lesnyh_i_e', 'NewPass19', 'lesnyh_i_e');
	
	$result = $mysqli->query("SELECT * FROM `admins` WHERE `login` = '$login' AND `password` = '$password'");
	$admin = $result->fetch_assoc();
	
	$result = $mysqli->query("SELECT * FROM `students` WHERE `login` = '$login' AND `password` = '$password'");
	$student = $result->fetch_assoc();
	
	$result = $mysqli->query("SELECT * FROM `teachers` WHERE `login` = '$login' AND `password` = '$password'");
	$teacher = $result->fetch_assoc();
	
	if((count($admin) == 0) && (count($teacher) == 0)  && (count($student) == 0)){
		echo "Такой пользователь не найден, проверьте введенные данные";
		exit();
	}elseif((count($admin) != 0) && (count($teacher) == 0)  && (count($student) == 0)){
		setcookie('admin', $admin['id'], time() + 3600, "/");
	}elseif((count($admin) == 0) && (count($student) != 0) && (count($teacher) == 0)){
		setcookie('student', $student['id'], time() + 3600, "/");
	}elseif((count($admin) == 0) && (count($student) == 0) && (count($teacher) != 0)){
		setcookie('teacher', $teacher['id'], time() + 3600, "/");
	}
	
	$mysqli->close();	
	
	header('Location: http://www2.cs.vsu.ru/~lesnyh_i_e/practice/index.php');
	exit();
?>