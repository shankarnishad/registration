<?php

$db = mysqli_connect("localhost", "root", "", "authentication");
 
if (isset($_POST['submit'])){
        $username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
// Attempt update query execution
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    
			   
			$result = mysqli_query($db,$sql);
		//echo mysqli_num_rows($result);
 
		
			if(mysqli_num_rows($result)==1){
			$up = "UPDATE users SET email='$email' WHERE username='$username'";
if(mysqli_query($db, $up)){
    echo "Records were updated successfully.";
    header('location:login.php');
    
} 

			}
}

//else {
   //echo "password is inccorrect";
//}
 
?>
<html>
<head>
	<title>
	login
	</title>
	
	</head>
<body>
	<div>
	<h1>log in</h1>
		<div>
		<form method="post" action="update.php">
			<table>
			<tr><td> email</td>
				<td><input type="text" class="" name="email"></td>
				</tr>
				
			
				
			<tr><td> username</td>
				<td><input type="text"  name="username"></td>
				</tr>
			
			<tr><td>password</td>
				<td><input type="password"  name="password"></td>
				</tr>
            <tr>
				<td><input type="submit"  value="update" name="submit"></td>
				</tr>
			</table>
			
			</form>
		
		</div>
	
	</div>
	
	</body>

</html>