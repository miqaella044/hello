<?php
	session_start();
	include'include/class.php';
	$user = new User();
	$del = $user->del();
	if($del){
		header("Location: main.php");
	}
	else{
		echo "Cant";
	}

?>