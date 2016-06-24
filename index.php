<?php
	session_start();
	include 'include/class.php';

	if (isset($_SESSION['login'])!=""){
       header("location:main.php");
    }
	$user = new User();
	
	if(isset($_REQUEST['btn'])){
		Extract($_REQUEST);
		$log= $user->login($us, $ps);
	 	if($log){
			header ("Location:main.php");
		}
		else{

			echo "Wrong username/password" ;
		
			
		}
	
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></link>
</head>
<body>
    <div class="container">
       <div style="margin-left:auto; margin-right:auto;">
       	  <form action="" method="post" name="login">
       		<label>Username:</label><input type="text" name="us">
       		<label>Password:</label><input type="text" name="ps">
       		<input type="submit" name="btn" value=":ogin">
       	 </form>
       </div>
       <a href="regis.php">Register</a>
    </div>
</body>
</html>