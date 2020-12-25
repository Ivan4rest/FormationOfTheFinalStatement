<?php
	$mysqli = new mysqli('www2.cs.vsu.ru', 'lesnyh_i_e', 'NewPass19', 'lesnyh_i_e');
	if(isset($_COOKIE['admin']) && (isset($_COOKIE['student']) == FALSE) && (isset($_COOKIE['teacher']) == FALSE)){
		$login = filter_var(trim($_POST['login_input']), FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST['password_input']), FILTER_SANITIZE_STRING);	
		
		if((mb_strlen($login) < 1) || (mb_strlen($login) > 100)){
			echo "Недопустимая длинна логина";
			exit();
		}else if(mb_strlen($password) > 100){
			echo "Недопустимая длинна пароля";
			exit();
		}else if(mb_strlen($password) > 1){
			$password = md5($password.$login);
			$mysqli->query("UPDATE `admins` SET `password` = '$password' WHERE `id` = '$id'");			
		}
		$mysqli->query("UPDATE `admins` SET `login` = '$login' WHERE `id` = '$id'");
		
	}elseif((isset($_COOKIE['admin']) == FALSE) && isset($_COOKIE['student']) && (isset($_COOKIE['teacher']) == FALSE)){
		$id = $_COOKIE['student'];
		$fio = filter_var(trim($_POST['fio_input']), FILTER_SANITIZE_STRING);
		$course = filter_var(trim($_POST['course_input']), FILTER_SANITIZE_STRING);
		$group = filter_var(trim($_POST['group_input']), FILTER_SANITIZE_STRING);
		$email = filter_var(trim($_POST['email_input']), FILTER_SANITIZE_STRING);		
		$login = filter_var(trim($_POST['login_input']), FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST['password_input']), FILTER_SANITIZE_STRING);		

		if((mb_strlen($fio) < 1) || (mb_strlen($fio) > 100)){
			echo "Недопустимая длинна ФИО";
			exit();
		}else if(mb_strlen($course) < 1 || mb_strlen($course) > 2){
			echo "Недопустимая значение поля Курс";
			exit();
		}else if(mb_strlen($group) < 1 || mb_strlen($group) > 2){
			echo "Недопустимая значение поля Группа";
			exit();
		}else if(mb_strlen($email) < 1 || mb_strlen($email) > 100){
			echo "Недопустимая значение поля Email";
			exit();
		}else if((mb_strlen($login) < 1) || (mb_strlen($login) > 100)){
			echo "Недопустимая длинна логина";
			exit();
		}else if(mb_strlen($password) > 100){
			echo "Недопустимая длинна пароля";
			exit();
		}else if(mb_strlen($password) > 1){
			$password = md5($password.$login);
			$mysqli->query("UPDATE `students` SET `password` = '$password' WHERE `id` = '$id'");			
		}
		$mysqli->query("UPDATE `students` SET `fio` = '$fio', `course` = '$course', `group` = '$group', `email` = '$email', `login` = '$login' WHERE `id` = '$id'");

	}elseif((isset($_COOKIE['admin']) == FALSE) && (isset($_COOKIE['student']) == FALSE) && isset($_COOKIE['teacher'])){
		$id = $_COOKIE['teacher'];
		$fio = filter_var(trim($_POST['fio_input']), FILTER_SANITIZE_STRING);	
		$department = filter_var(trim($_POST['department_input']), FILTER_SANITIZE_STRING);
		$email = filter_var(trim($_POST['email_input']), FILTER_SANITIZE_STRING);
		$login = filter_var(trim($_POST['login_input']), FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST['password_input']), FILTER_SANITIZE_STRING);

		if((mb_strlen($fio) < 1) || (mb_strlen($fio) > 100)){
			echo "Недопустимая длинна ФИО";
			exit();
		}else if(mb_strlen($department) < 1 || mb_strlen($department) > 1000){
			echo "Недопустимая значение поля Кафедра";
			exit();
		}else if(mb_strlen($email) < 1 || mb_strlen($email) > 100){
			echo "Недопустимая значение поля Email";
			exit();
		}else if((mb_strlen($login) < 1) || (mb_strlen($login) > 100)){
			echo "Недопустимая длинна логина";
			exit();
		}else if(mb_strlen($password) > 100){
			echo "Недопустимая длинна пароля";
			exit();
		}else if(mb_strlen($password) > 1){
			$password = md5($password."sdfhy53j645");			
			$mysqli->query("UPDATE `teachers` SET `password` = '$password' WHERE `id` = '$id'");			
		}
		$mysqli->query("UPDATE `teachers` SET `fio` = '$fio', `department` = '$department', `email` = '$email', `login` = '$login' WHERE `id` = '$id'");
	}		
	
	$mysqli->close();
	
	header('Location: http://www2.cs.vsu.ru/~lesnyh_i_e/practice/my_page.php');
	exit();
?>