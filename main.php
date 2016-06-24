<?php
	session_start();
	include 'include/class.php';
	$user = new User();
	$query = $user->view();
	$id = $_SESSION['id'];
    if (!$user->get_session()){
       header("location:index.php");
    }
	if(isset($_GET['g'])){
		$log = $user->logout();
	
			header("Location:index.php");
}
	
?>
<style type="text/css">
	table{
		border-collapse :collapse;
	}
	tr, td, th{
		border:1px solid black;
	}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Main</title>
</head>
<body>
	<table>
	<?php
		while($row = mysqli_fetch_object($query)){
	?>
		<tr>
			<td><?php echo $row->name; ?></td>
			<td><?php echo $row->email; ?> </td>
			<td><?php echo $row->password;  ?></td>
			<td><a href="edit.php?id=<?php echo $row->id; ?>">Edit</a></td>
			<td><a href="del.php?id=<?php echo $row->id; ?>">Delete</a></td>
		</tr>
	<?php		
		}
	?>
		
	</table>
	<a href="main.php?g">Logout</a>
</body>
</html>