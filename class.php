<?php
	include 'cont.php';
	class user{
		public $db;
		public function __construct(){
			$this->db =new  mysqli(server,us,ps,db);
			if(mysqli_connect_errno()){
				echo"Couldnt connect";
				exit();
			}
		}
		public function login($us, $ps){
			$sql= "SELECT id FROM users WHERE name='$us' and password='$ps'";
			$query = mysqli_query($this->db, $sql);
			$fetch = mysqli_fetch_object($query);
			$row = mysqli_num_rows($query);
			if($row == 1){
				$_SESSION['login'] = true; 
	            $_SESSION['id'] = $row['id'];
				return true;
			}
			else{
				return false;
			}
		}
		public function get_session(){
			return $_SESSION['login'];
		}
		public function reg($us, $em, $ps, $cps){
		  	$sql = "SELECT * FROM users WHERE name='$us' and email='$em'";
			$query = mysqli_query($this->db, $sql);
			$fetch = mysqli_fetch_object($query);
			$row = mysqli_num_rows($query);
			if($row == 0){
				$sql1 =" INSERT INTO users(name,email,password) VALUES('$us','$em','$ps')";
				$query1 = mysqli_query($this->db, $sql1);
				$fetch1 = mysqli_fetch_object($query);
				return true;
			}
			else{
				return false;
			}
			
		}
		public function view(){
			$sql = "SELECT * FROM users";
			$query = mysqli_query($this->db, $sql);
			return $query;

		}
		public function edit(){
			$id = $_GET['id'];
			$sql= "SELECT * FROM users WHERE id='$id'";
			$query = mysqli_query($this->db,$sql);
			$row = mysqli_fetch_object($query);
			return $row;
		}
		public function up($id, $us, $em, $ps){

			$sql = "UPDATE users SET name='$us', email='$em', password='$ps' WHERE id='$id'";
			$query = mysqli_query($this->db, $sql);
			$fetch = mysqli_fetch_object($query);
			return true;
		}
		public function del(){
			$id = $_GET['id'];
			$sql="DELETE FROM users WHERE id='$id'";
			$query=mysqli_query($this->db, $sql);
			$fetch = mysqli_fetch_object($query);
			$row= mysqli_num_rows($query);
			return true;
		}
		
		public function logout(){
			 $_SESSION['login'] = false;
			session_destroy();
		}

	}
?>