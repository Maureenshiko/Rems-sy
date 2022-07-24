<?php
	include 'db_connect.php';
	session_start();
	if($_POST['type']==1){
		$name=$_POST['name'];
		$username=$_POST['username'];
		$password=$_POST['password'];
        $type=$_POST['type'];
		
		$duplicate=mysqli_query($conn,"select * from users where username='$username'");
		if (mysqli_num_rows($duplicate)>0)
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
			$sql = "INSERT INTO `users`( `name`, `username`, `password`, `type`) 
			VALUES ('$name','$username','$password','$type')";
			if (mysqli_query($conn, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
		}
		mysqli_close($conn);
	}
	if($_POST['type']==2){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$check=mysqli_query($conn,"select * from crud where email='$email' and password='$password'");
		if (mysqli_num_rows($check)>0)
		{
			$_SESSION['email']=$email;
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);
	}
?>
  