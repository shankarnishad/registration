<?php

$db = mysqli_connect("localhost","root","","authentication")or die($db);
	if (isset($_POST['submit'])){
		session_start();
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$password2 = mysqli_real_escape_string($db,$_POST['password2']);
		if($password==$password2){
			$password = md5($password);
			$sql = "INSERT INTO users (username,email,password) values ('$username','$email','$password')";
			
			mysqli_query($db,$sql);
			$_SESSION['message'] = "you are logged in";
			$_SESSION['username'] = $username;
			header('location:home.php');
			
		}else{ 
			echo $_SISSION['message']="password not match";
			
		}
	}
?>


<html>
<head>
	<title>
	Registration 
	</title>
	
	</head>
<body>
	<div>
	<h1>Sign up</h1>
		<div>
		<form method="post" action="register.php">
			<table>
			<tr><td> Username</td>
				<td><input type="text" class="" name="username"></td>
				</tr>
				
			<tr><td> Email</td>
				<td><input type="email" class="" name="email"></td>
				</tr>
				
			<tr><td> password</td>
				<td><input type="password" class="" name="password"></td>
				</tr>
			<tr><td> password again</td>
				<td><input type="password" class="" name="password2"></td>
				</tr>
			<tr>
				<td><input type="submit" class="" name="submit"></td>
				</tr>
			</table>
			
			</form>
		
		</div>
	
	</div>
	
	</body>

</html>