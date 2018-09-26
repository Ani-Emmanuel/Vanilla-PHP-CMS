<?php include "include2/header.php" ?> 


<?php 

if (isset($_SESSION['username'])) {
    $uusername = $_SESSION['username'];


    $query = "SELECT * FROM users WHERE username = '{$uusername}' ";
    $profile_result = mysqli_query($connection, $query);

    while ($raw = mysqli_fetch_assoc($profile_result)) {
        
        $user_id = $raw['user_id'];
        $username = $raw['username'];
        $user_password = $raw['user_p
        assword'];
        $user_firstname = $raw['user_firstname'];
        $user_lastname = $raw['user_lastname'];
        $user_email = $raw['user_email'];
        $user_image = $raw['user_image'];
        $user_role = $raw['user_role'];

    }

}


 ?>


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

     $tquery = "UPDATE users SET user_firstname = '{$user_firstname}',user_password = '{$user_password}',user_role = '{$user_role}',user_email = '{$user_email}', user_lastname = '{$user_lastname}',username = '{$username}' WHERE username = '{$uusername}' ";
   
   $edit_result = mysqli_query($connection,$tquery);

}
 




?>


    <div id="wrapper">

        <!-- Navigation -->


       <?php include "include2/navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->


<div class="row">

<div class="col-lg-12">

<h1 class="page-header">
    Blank Page
    <small>Subheading</small>
</h1>



<form action="" method="post" enctype="multipart/form-data">
    
<div class="form-group">
    <label for="firstname">Firstname</label>
    <input value="<?php echo $user_firstname; ?>" type="text" name="user_firstname" class='form-control'>
</div>

<div class="form-group">
    <label for="lastname">Lastname</label>
    <input value="<?php echo $user_lastname; ?>" type="text" name="user_lastname" class='form-control'>
</div>

<div class="form-group">
    <select  name = "user_role" >
 <option value="subcriber"><?php echo $user_role; ?></option>
    <?php 


if ($user_role == 'Admin') {
    echo "<option value='subcriber'>Subcriber</option>";
}
else{

    echo "<option value='admin'>Admin</option>";
}

     ?>

    </select>
</div>


<div class="form-group">
    <label for="username">Username</label>
    <input value="<?php echo $username; ?>" type="text" name="username" class='form-control'>
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input value="<?php echo $user_password; ?>" type="password" name="user_password" class='form-control'>
</div>


<div class="form-group">
    <label for="email">Email</label>
    <input value="<?php echo $user_email; ?>" type="email" name="user_email" class='form-control'>
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







        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php include "include2/footer.php" ?>