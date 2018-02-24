<?php
		session_start(); 

$db = mysqli_connect("localhost","root","","authentication") or die($db);
	if (isset($_POST['login'])){

		$username = mysqli_real_escape_string($db,$_POST['usernam']);
		
		$password = mysqli_real_escape_string($db,$_POST['passwor']);
		
		
			$password = md5($password);
			$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
			
			$result = mysqli_query($db,$sql);
		//echo mysqli_num_rows($result);
		
			if(mysqli_num_rows($result)==1){
			$_SESSION['message'] = "you are logged in";
			$_SESSION['username'] = $username;
			header('location:home.php');
			}
		else{
			$_SESSION['message'] = "your username or password is incorrect";
			
		}	
	}
?>


<html>
<head>
	<title>
	login
	</title>
	
	</head>
<body>
	<div>
	<h1>Sign up</h1>
		<div>
		<form method="post" action="home.php">
			<table>
			<tr><td> Username</td>
				<td><input type="text" class="" name="usernam"></td>
				</tr>
				
			
				
			<tr><td> password</td>
				<td><input type="password"  name="passwor"></td>
				</tr>
			
			<tr>
				<td><input type="submit"  value="login" name="login"></td>
				</tr>
			</table>
			
			</form>
		
		</div>
	
	</div>
	
	</body>

</html>