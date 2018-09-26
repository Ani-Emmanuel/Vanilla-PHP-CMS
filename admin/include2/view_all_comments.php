<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>comments</th>
        <th>Email</th>
        <th>Status</th>
        <th>In responds to</th>
        <th>Date</th>
        <th>Approved</th>
        <th>Unapproved</th>
        <th>Delete</th>
        
        <!-- <th>Edit</th>
        <th>Delete</th> -->
    </tr>

    <tbody>


    <?php 

    $query = 'SELECT * FROM comments';
    $result = mysqli_query($connection,$query);
    while ($raw = mysqli_fetch_assoc($result)) {
        $comment_id = $raw['comment_id'];
        $comment_post_id = $raw['comment_post_id'];
        $comment_author = $raw['comment_author'];
        $comment_content = $raw['comment_content'];
        $comment_email = $raw['comment_email'];
        $comment_status = $raw['comment_status'];
        $comment_date = $raw['comment_date'];


  echo "<tr>";  
  echo "<td>$comment_id</td>"; 
  echo "<td>$comment_author</td>"; 
  echo "<td>$comment_content</td>"; 
  echo "<td>$comment_email</td>"; 
  echo "<td>$comment_status</td>";

$q_query = "SELECT * FROM posts WHERE post_id = {$comment_post_id} "; 
$q_result = mysqli_query($connection,$q_query);

while ($raw = mysqli_fetch_assoc($q_result)) {
      $post_id = $raw['post_id'];
      $post_title = $raw['post_title'];
      echo "<td><a href = '../post.php?p_id={$post_id}'>{$post_title}</a></td>"; 
  
} 

    
    echo "<td>{$comment_date}</td>";
     
  // echo "<td>$post_date</td>"; 
  // echo "<td><a href ='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>"; 
  // echo "<td><a href ='posts.php?delete={$post_id}'>Delete</a></td>"; 
  echo "<td><a href ='comments.php?approved={$comment_id}'>Approved</a></td>";
  echo "<td><a href ='comments.php?unapproved={$comment_id}'>Unapproved</a></td>";
  echo "<td><a href ='comments.php?delete={$comment_id}'>Delete</a></td>"; 
  
  echo "</tr>"; 
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $query = "DELETE FROM comments WHERE comment_id = {$delete_id} ";
   $delete_result=mysqli_query($connection,$query);
   header("Location: comments.php");
}

if (isset($_GET['approved'])) {

  $approve_id = $_GET['approved'];
  $approved_querry = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$approve_id} ";

  $approved_result = mysqli_query($connection,$approved_querry);

  header("Location: comments.php");
}

if (isset($_GET['unapproved'])) {

  $unapprove_id = $_GET['unapproved'];

  $unapproved_querry = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = {$unapprove_id} ";

  $unapproved_result = mysqli_query($connection,$unapproved_querry);

  header("Location: comments.php");
}

     ?>

        
    </tbody>
    </thead>

</table> 