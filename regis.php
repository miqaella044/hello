<?php
	session_start();
	include'include/class.php';
	$user = new User();
	if(isset($_REQUEST['btn1'])){
		extract($_REQUEST);
		$reg = $user->reg($us, $em, $ps, $cps);
	  if($ps == $cps){
	  	if($reg){
			header("Location:main.php");
		}
		else{
			echo "Cant";
		}
	  }
	  else{
	  	echo "Dismatch pasword";
	  }
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<form action="" method="post">
       		<label>Username:</label><input type="text" name="us">
       		<label>Email:</label><input type="text" name="em">
       		<label>Password:</label><input type="text" name="ps">
       		<label>Confirm Password:</label><input type="text" name="cps">
       		<input type="submit" name="btn1">
       	 </form>
</body>
</html>