<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        <th>Date</th>
        
        
        <!-- <th>Edit</th>
        <th>Delete</th> -->
    </tr>

    <tbody>


    <?php 

    $query = 'SELECT * FROM users';
    $result = mysqli_query($connection,$query);
    while ($raw = mysqli_fetch_assoc($result)) {
        $user_id = $raw['user_id'];
        $username = $raw['username'];
        $user_password = $raw['user_password'];
        $user_firstname = $raw['user_firstname'];
        $user_lastname = $raw['user_lastname'];
        $user_email = $raw['user_email'];
        $user_image = $raw['user_image'];
        $user_role = $raw['user_role'];
       // $comment_date = $raw['comment_date'];


  echo "<tr>";  
  echo "<td>$user_id</td>"; 
  echo "<td>$username</td>"; 
  echo "<td>$user_firstname</td>"; 
  echo "<td>$user_lastname</td>"; 
  echo "<td>$user_email</td>";
  echo "<td>$user_role</td>";
  echo "<td>time(oid)</td>";

// $q_query = "SELECT * FROM posts WHERE post_id = {$comment_post_id} "; 
// $q_result = mysqli_query($connection,$q_query);

// while ($raw = mysqli_fetch_assoc($q_result)) {
//       $post_id = $raw['post_id'];
//       $post_title = $raw['post_title'];
//       echo "<td><a href = '../post.php?p_id={$post_id}'>{$post_title}</a></td>"; 
  
// } 

    

     
  
   echo "<td><a href ='users.php?source=edit_user&p_id={$user_id}'>Edit</a></td>"; 
   echo "<td><a href ='users.php?change_to_admin={$user_id}'>Admin</a></td>";
   echo "<td><a href ='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
   echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>"; 
  
   echo "</tr>"; 
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $tquery = " DELETE FROM users WHERE user_id = $delete_id ";
   $delete_result = mysqli_query($connection,$tquery);
   
   header("Location: users.php");
}


if (isset($_GET['change_to_admin'])) {

  $admin_id = $_GET['change_to_admin'];
  $approved_querry = "UPDATE users SET user_role = 'admin' WHERE user_id = {$admin_id} ";

  $approved_result = mysqli_query($connection,$approved_querry);

  header("Location: users.php");
}

if (isset($_GET['change_to_subscriber'])) {

  $subscriber_id = $_GET['change_to_subscriber'];

  $unapproved_querry = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$subscriber_id} ";

  $unapproved_result = mysqli_query($connection,$unapproved_querry);

  header("Location: users.php");
}

if (isset($_GET['p_id'])) {
   $edit_user_id = $_GET['p_id'];
  
   header("Location: users.php");
}

     ?>

        
    </tbody>
    </thead>

</table> 