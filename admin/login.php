<?php 
session_start();
?>

<html>
	<head>
		<title>Admin Login</title>
	</head>

<body style="background: url('../images/bg.png')";>
	
	<form method="post" action="login.php">
	
		<table width="400" border="0" align="center" bgcolor="#F2F2F2">
			
			<tr>
				<td bgcolor="#F2F2F2" colspan="4" align="center" style="font-family:'Tahoma'; font-size:12"><h1>Admin Login</h1></td>
			</tr>
		
			<tr>
				<td align="right" style="font-family:'Tahoma'; font-size:14";>User name:</td>
				<td><input type="text" name="user_name"></td>
			</tr>
			
			<tr>
				<td align="right" style="font-family:'Tahoma'; font-size:14">User password:</td>
				<td><input type="password" name="user_pass"></td>
			</tr>
			
			<tr>
				<td colspan="4" align="center"><input type="submit" name="login" value="Login"></td>
			</tr>
		
		
		</table>
	</form>

</body>
</html>
<?php 
include("includes/connect.php");

if(isset($_POST['login'])){
	
	$user_name = mysql_real_escape_string($_POST['user_name']);
	$user_pass = mysql_real_escape_string($_POST['user_pass']);
	
	$encrypt = md5($user_pass);

	$admin_query = "select * from admin_login where user_name='$user_name' AND user_pass='$user_pass'";

	$run = mysql_query($admin_query); 
	
	if(mysql_num_rows($run)>0){
	
	$_SESSION['user_name']=$user_name;
	
	echo "<script>window.open('index.php','_self')</script>";
	}
	else {
	
	echo "<script>alert('User name or password is incorrect')</script>";
	
	}
}


?>