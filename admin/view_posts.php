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

<div id="sidebar">
<p  style="font-family: Tahoma; font-size: 17px; color:white;">
Welcome:</p><h2><?php echo $_SESSION['user_name']; ?></h2>
<h2><a href="#">Logout</a></h2>
<h2><a href="view_posts.php">View Posts</a></h2>
<h2><a href="index.php?insert=insert">Insert New Post</a></h2>

</div>

<table style="font-size:12px; font-family:Tahoma;" width="1000" border="0" align="center" bgcolor="#D8D8D8" > 
	<tr>
		<td colspan="10" align="center" bgcolor="#E6E6E6"><h1>View All Posts</h1></td>
	</tr>
	
	<tr bgcolor="#E6E6E6">
		<th>Post No</th>
		<th>Post Date</th>
		<th>Post Author</th>
		<th>Post Title:</th>
		<th>Post Post Image</th>
		<th>Post Content</th>
		<th>Delete Post</th>
		<th>Edit Post</th>
	</tr>
<?php 
include("includes/connect.php");

$query = "select * from posts order by 1 DESC"; 

$run = mysql_query($query);

while($row=mysql_fetch_array($run)){

	$post_id = $row['post_id'];
	$post_date = $row['post_date'];
	$post_author = $row['post_author'];
	$post_title = $row['post_title'];
	$post_image = $row['post_image'];
	$post_content= substr($row['post_content'],0,100);
?>
<tr style="font-size:12px; font-family:Tahoma;" align="center" bgcolor="white" style=>
		<td><?php echo $post_id; ?></td>
		<td><?php echo $post_date; ?></td>
		<td><?php echo $post_author; ?></td>
		<td><?php echo $post_title; ?></td>
		<td><img src="../images/<?php echo $post_image; ?>" width="100" height="100"></td>
		<td><?php echo $post_content; ?></td>
		<td><a href="delete.php?del=<?php echo $post_id; ?>">Delete</a></td>
		<td><a href="edit_posts.php?edit=<?php echo $post_id; ?>">Edit</a></td>
	</tr>
<?php } ?>

</table>


</body>
</html>

<?php } ?>