<?php 

if (isset($_POST['submit'])) {
	$post_title = $_POST['title'];
	$post_category_id = $_POST['post_category'];
	$post_author = $_POST['post_author'];
	$post_status = $_POST['post_status'];

	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];

	$post_cont = $_POST['post_content'];
	$post_content = mysqli_real_escape_string($connection,$post_cont);
	$post_tags = $_POST['post_tags'];
	$post_date = date('d-m-y');
	//$post_comment_count = 4;

	move_uploaded_file($post_image_temp, "../images/$post_image");


$query = "INSERT INTO posts (post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)";
$query .= "VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status} ' ) ";

if (!$query) {
	die('QUERY FAILED'.mysqli_error($connection));
}

$result=mysqli_query($connection,$query);
}












 ?>


<form action="" method="post" enctype="multipart/form-data">
	
<div class="form-group">
	<label for="title">Post Title</label>
	<input type="text" name="title" class='form-control'>
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
	<input type="text" name="post_author" class='form-control'>
</div>

<div class="form-group">
	<label for="post_tags">Post tags</label>
	<input type="text" name="post_tags" class='form-control'>
</div>


<div class="form-group">
	<label for="post_status">Post Status</label>
	<input type="text" name="post_status" class='form-control'>
</div>

<div class="form-group">
	<label for="post_image">Post Image</label>
	<input type="file" name="image" class='form-control'>
</div>


<div class="form-group">
	<label for="post_content">Post content</label>
	<textarea class="form-control" name = 'post_content' cols="30" rows="10"></textarea>
</div>

<div class="form-group">
	<input type="submit" name="submit" value='poblish post' class='btn btn-primary'>
</div>


</form>