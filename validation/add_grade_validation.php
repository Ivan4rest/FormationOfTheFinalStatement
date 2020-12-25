<?php	
	$subject = filter_var(trim($_POST['select_subject']), FILTER_SANITIZE_STRING);
	$course = filter_var(trim($_POST['select_course']), FILTER_SANITIZE_STRING);
	$group = filter_var(trim($_POST['select_group']), FILTER_SANITIZE_STRING);
	
	$mysqli = new mysqli('www2.cs.vsu.ru', 'lesnyh_i_e', 'NewPass19', 'lesnyh_i_e');
	
	$result = $mysqli->query("SELECT * FROM `students` WHERE `course` = '$course' AND `group` = '$group' ORDER BY `fio`");
	
	$id_teacher = $_COOKIE['teacher'];
	
	while($students = mysqli_fetch_array($result)){
		$id_student = $students['id'];
		$grade = filter_var(trim($_POST["input_grade_".$students['id']]), FILTER_SANITIZE_STRING);
		$comment = filter_var(trim($_POST["input_comment_".$students['id']]), FILTER_SANITIZE_STRING);
		if(($grade < 2) || ($grade > 5)){
			echo "Заполните все поля оценок!";
			exit();
		}else if((mb_strlen($comment) < 1) || (mb_strlen($comment) > 1000)){
			echo "Недопустимая длинна содержимого поля Комментарий";
			exit();
		}
		$mysqli->query("INSERT INTO `grades` (`id_student`, `id_teacher`, `subject`, `course`, `group`, `grade`, `comment`) VALUES('$id_student', '$id_teacher', '$subject', '$course', '$group', '$grade', '$comment')");	
	}	
	
	$mysqli->close();
	
	header('Location: http://www2.cs.vsu.ru/~lesnyh_i_e/practice/add_grade.php');
	exit();
?>