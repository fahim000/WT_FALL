<?php 
	session_start();
	
	$usernameError = $_POST['UserName'];
	$passError = $_POST['Password'];
	

	if($usernameError == null || $passError == null){
		echo "Please enter your data again.";
?>		
<html>
<body>
	<tr>
		<td>
			<br></br>
			<a href="LogIn.html"> Back </a>
		</td>
	</tr>
<?php
	}
	
	
	else {
		$file = fopen('data.json', 'r');
		
		while (!feof($file)) {
			$data=fgets($file);
			$admin = explode('|', $data);
			if($usernameError == trim($admin[0]) && $passError == trim($admin[1])){
				$_SESSION['status'] = true;
				$_SESSION['user'] = $usernameError;
				setcookie('status', 'true', time()+3600, '/');
				header('location: Home.php');
			}
		}
	}

	

	
?>		
	<tr>
		<td>
			<br></br>
			<a href="LogIn.html"> Back </a>
		</td>
	</tr>
</body>
</html>