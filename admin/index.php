<?php 
session_start();

if(!isset($_SESSION['user_name'])){

header("location: login.php");
}
else {

?>

<html>
	<head>
		<title>Admin Panel</title>
	
	<link rel="stylesheet" href="admin_style.css" />
	</head>
	
<body>
<div id="header">
<a href="index.php">
<h1>Admin Panel</h1></a>

</div> 

<div id="sidebar"><p  style="font-family: Tahoma; font-size: 17px; color:white;">
Welcome:</p><h2><?php echo $_SESSION['user_name']; ?></h2>
<h2><a href="logout.php">Logout</a></h2>
<h2><a href="view_posts.php">View Posts</a></h2>
<h2><a href="index.php?insert=insert">Insert New Post</a></h2>



</div>


<?php 
	
	if(isset($_GET['insert'])){
	
	include("insert_post.php");
	
	}


?>

</body>
</html>

<?php } ?>