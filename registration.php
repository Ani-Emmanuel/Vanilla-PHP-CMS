  <?php include 'include/db.php' ?>
  <?php include 'include/header.php' ?>

    <!-- Navigation -->
  
  <?php include 'include/navigation.php' ?>





  <?php 

if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];


if (!empty($username) && !empty($password) && !empty( $email)) {
 

  $username = mysqli_real_escape_string($connection,$username);
  $password = mysqli_real_escape_string($connection,$password);
  $email = mysqli_real_escape_string($connection,$email);

  $query = "SELECT randSalt FROM users";
  $result = mysqli_query($connection,$query);

if (!$result) {
  die("QUERY FAILED".mysqli_error($connection));
}
  while ($row = mysqli_fetch_assoc($result)) {
    
    $salt = $row['randSalt'];
  }
$qquery ="INSERT INTO users(username,user_password,user_email,user_role)";
$qquery .="VALUES('{$username}','{$password}','{$email}', 'subscriber') ";
$qqresult = mysqli_query($connection,$qquery);
if (!$qqresult) {
  die("QUERY FAILED".mysqli_error($connection));
}

}



}









   ?>

    
<div class="container">    
<section id = "login">
<div class="container">
  <div class="row">
   <div class="col-xs-6 col-xs-offset-3">
     <div class="form-wrap">
      <h1>Register</h1>
        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off" >

          <div class="form-group">

            <label for="username" class="sr-only">username</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Enter desired Username">

               </div>

                  <div class="form-group">

                    <label for="email" class="sr-only">Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Example@email.com">

                       </div>

                          <div class="form-group">

                        <label for="password" class="sr-only">password</label>
                          <input type="password" name="password" class="form-control" id="key" placeholder="Enter desired Username">

                             </div>

                             <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="register">



</form>
</div>  
</div>      
</div>
</div>
</section> 
    <hr>

         <?php include 'include/footer.php' ?>

       