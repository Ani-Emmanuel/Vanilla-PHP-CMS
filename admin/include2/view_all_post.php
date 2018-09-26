<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <tbody>


    <?php 

    $query = 'SELECT * FROM posts';
    $result = mysqli_query($connection,$query);
    while ($raw = mysqli_fetch_assoc($result)) {
        $post_id = $raw['post_id'];
        $post_author = $raw['post_author'];
        $post_title = $raw['post_title'];
        $post_category = $raw['post_category_id'];
        $post_status = $raw['post_status'];
        $post_image = $raw['post_image'];
        $post_tags = $raw['post_tags'];
        $post_comments = $raw['post_comment_count'];
        $post_date = $raw['post_date'];


  echo "<tr>";  
  echo "<td>$post_id</td>"; 
  echo "<td>$post_author</td>"; 
  echo "<td>$post_title</td>"; 

$q_query = "SELECT * FROM categories WHERE cat_id = {$post_category} "; 
$q_result = mysqli_query($connection,$q_query);

while ($raw = mysqli_fetch_assoc($q_result)) {
      $cat_id = $raw['cat_id'];
      $cat_title = $raw['cat_title'];
      echo "<td>{$cat_title}</td>"; 
  
}

  echo "<td>$post_status</td>"; 
  echo "<td><img width='100' src='../images/$post_image' alt='image'</td>"; 
  echo "<td>$post_tags</td>"; 
  echo "<td>$post_comments</td>"; 
  echo "<td>$post_date</td>"; 
  echo "<td><a href ='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>"; 
  echo "<td><a href ='posts.php?delete={$post_id}'>Delete</a></td>"; 
  echo "</tr>"; 
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $query = "DELETE FROM posts WHERE post_id = {$delete_id} ";
   $delete_result=mysqli_query($connection,$query);
   header("Location: posts.php");
}



     ?>

        
    </tbody>
    </thead>

</table> 