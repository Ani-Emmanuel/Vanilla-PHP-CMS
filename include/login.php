<?php include "db.php"; ?>
<?php session_start() ?>

<?php 

if (isset($_POST['login'])) {
	$username1 = $_POST['username'];
	$password1 = $_POST['password'];

	$username = mysqli_real_escape_string($connection,$username1);
	$password = mysqli_real_escape_string($connection,$password1);

	$query = "SELECT * FROM users WHERE username = '{$username}' ";
	$login_query = mysqli_query($connection,$query);
	if (!$login_query) {
		die('QUERY FAILED'.mysqli_error($connection));
	}

	while ($row = mysqli_fetch_assoc($login_query)) {
		 $user_id = $row['user_id'];
		 $db_username = $row['username'];
		 $user_password = $row['user_password'];
		 $user_firstname = $row['user_firstname'];
		 $user_lastname = $row['user_lastname'];
		 $user_role = $row['user_role'];

	}


	if ($username !== $uusername && $password !== $user_password) {
		header("Location: ./index.php");
	} 
	elseif ($username == $db_username && $password == $user_password) {

		$_SESSION['username'] = $db_username;
		$_SESSION['firstname'] = $user_firstname;
		$_SESSION['lastname'] = $user_lastname;
		$_SESSION['userrole'] = $user_role;
		$_SESSION['password'] = $user_password;
		
		header("Location: ./index.php");
	}
}










?>