<?php
	session_start();
	include'include/class.php';
	$user = new User();
	
	if (!$user->get_session()){
       header("location:index.php");
    }
	
	$row = $user->edit();

	if(isset($_REQUEST['btn'])){
		extract($_REQUEST);
		$up = $user->up($id, $us, $em, $ps);
		if($up){
			header("Location: main.php");
		}
		else{
			echo "Cant";
		}
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
	<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $row->id; ?>">;
       		<label>Username:</label><input type="text" name="us" value="<?php echo $row->name ?>">
       		<label>Email:</label><input type="text" name="em" value="<?php echo $row->email; ?>">
       		<label>Password:</label><input type="text" name="ps" value="<?php echo $row->password;  ?>">
  
       		<input type="submit" name="btn">
       	 </form>
</body>
</html>