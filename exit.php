<?php
	setcookie('admin', $student['id'], time() - 3600, "/");
	setcookie('student', $student['id'], time() - 3600, "/");
	setcookie('teacher', $teacher['id'], time() - 3600, "/");
	header('Location: http://www2.cs.vsu.ru/~lesnyh_i_e/practice/index.php');
?>