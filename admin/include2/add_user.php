<?php 

if (isset($_POST['submit'])) {
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_role = $_POST['user_role'];
	$username = $_POST['username'];

	// $post_image = $_FILES['image']['name'];
	// $post_image_temp = $_FILES['image']['tmp_name'];

	$user_password = $_POST['user_password'];
	$user_email = $_POST['user_email'];
	
	//$post_date = date('d-m-y');
	//$post_comment_count = 4;

	//move_uploaded_file($post_image_temp, "../images/$post_image");


$query = "INSERT INTO users (user_firstname,user_lastname,user_role,username,user_password,user_email)";
$query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_password}','{$user_email}' ) ";

if (!$query) {
	die('QUERY FAILED'.mysqli_error($connection));
}

$result=mysqli_query($connection,$query);
echo "User Created: " . " " . "<a href = 'users.php'>View Users</a>";
}


 ?>


<form action="" method="post" enctype="multipart/form-data">
	
<div class="form-group">
	<label for="firstname">Firstname</label>
	<input type="text" name="user_firstname" class='form-control'>
</div>

<div class="form-group">
	<label for="lastname">Lastname</label>
	<input type="text" name="user_lastname" class='form-control'>
</div>

<div class="form-group">
	<select  name = "user_role" >
	<option value="subcriber">Select Options</option>
	<option value="admin">Admin</option>
	<option value="subcriber">Subcriber</option>
	</select>
</div>


<div class="form-group">
	<label for="username">Username</label>
	<input type="text" name="username" class='form-control'>
</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" name="user_password" class='form-control'>
</div>


<div class="form-group">
	<label for="email">Email</label>
	<input type="email" name="user_email" class='form-control'>
</div>


<!-- <div class="form-group">
	<label for="post_image">Post Image</label>
	<input type="file" name="image" class='form-control'>
</div>
 -->

<div class="form-group">
	<input type="submit" name="submit" value='Add user' class='btn btn-primary'>
</div>


</form>