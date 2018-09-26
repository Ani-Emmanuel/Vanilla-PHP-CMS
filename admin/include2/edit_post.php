<?php 

	if (isset($_GET['p_id'])) {
		$edit_id = $_GET['p_id'];

	}
   $query = "SELECT * FROM posts WHERE post_id = {$edit_id} ";
    $result = mysqli_query($connection,$query);
    while ($raw = mysqli_fetch_assoc($result)) {
        $post_id = $raw['post_id'];
        $post_author = $raw['post_author'];
        $post_title = $raw['post_title'];
        $post_category_id = $raw['post_category_id'];
        $post_status = $raw['post_status'];
        $post_image = $raw['post_image'];
        $post_tags = $raw['post_tags'];
        $post_content=$raw['post_content'];
        $post_comment_count = $raw['post_comment_count'];
        $post_date = $raw['post_date'];

    }


if (isset($_POST['submit'])) {
	
	$post_title = $_POST['title'];
	$post_category_id = $_POST['post_category'];
	$post_author = $_POST['post_author'];
	$post_status = $_POST['post_status'];

	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];

	$post_content = $_POST['post_content'];
	$post_tags = $_POST['post_tags'];
	$post_date = date('d-m-y');
	

	move_uploaded_file($post_image_temp, "../images/$post_image");

	if (empty($post_image)) {
		$query ="SELECT * FROM posts WHERE post_id = $edit_id ";
		$result = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($result)) {
			$post_image = $row['post_image'];

		}
	}

	
}

$query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = '{$post_category_id}', post_author = '{$post_author}', post_status = '{$post_status}', post_image = '{$post_image}', post_tags = '{$post_tags}', post_content = '{$post_content}', post_date = now()  WHERE post_id = $edit_id " ;

$result = mysqli_query($connection,$query);


if (!$result) {
		die("QUERY FAILED".mysqli_error($connection));
	}else{echo "Update Successfully". " " . "<a href = './posts.php'>View post</a>";}




?>

<form action="" method="post" enctype="multipart/form-data">
	
<div class="form-group">
	<label for="title">Post Title</label>
	<input value="<?php echo $post_title; ?>" type="text" name="title" class='form-control'>
</div>

<div class="form-group">
	<select  name = "post_category" >
		<?php 
$query = "SELECT * FROM categories";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo "<option value = $cat_id>$cat_title</option>";

}

?>
	</select>
</div>

<div class="form-group">
	<label for="post_author">Post Author</label>
	<input value="<?php echo $post_author; ?>" type="text" name="post_author" class='form-control'>
</div>

<div class="form-group">
	<select name="post_status" >
		<option><?php echo $post_status; ?></option>

		<?php 

		if ($post_status == 'draft') {

			echo "<option value = 'published'>Published</option>";
		}
		else{ echo "<option value = 'draft'>Draft</option>"; }

		?>
	</select>
</div>

<div class="form-group">
	<img width="100" src="../images/<?php echo $post_image; ?>">
	<input type="file" name="image">
</div>

<div class="form-group">
	<label for="post_tags">Post Tags</label>
	<input value="<?php echo $post_tags;  ?>" type="text" name="post_tags" class='form-control'>
</div>

<div class="form-group">
	<label for="post_content">Post Title</label>
	<textarea class="form-control" name = 'post_content' cols="30" rows="10"><?php echo $post_content;  ?></textarea>
</div>

<div class="form-group">
	<input type="submit" name="submit" value='Update post' class='btn btn-primary'>
</div>


</form>