
<form action = "" method = "post">
    <div class="form-group">
    <label for = "cat_title">Update Category</label>


<?php 


if (isset($_GET['Edit'])) {

$Edit_cat_id = $_GET['Edit'];

$query = "SELECT * FROM categories WHERE cat_id = $Edit_cat_id ";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
$Edit_cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

?>

<input value = " <?php if(isset($cat_title)){echo $cat_title;} ?> " class ="form-control", type = "text", name = "cat_title">

<?php }} ?>     



  <?php 


 if (isset($_POST['Update_category'])) {

$the_cat_title = $_POST['cat_title'];

$query_update = " UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$the_cat_id} ";

$result_update = mysqli_query($connection,$query_update);

if (!$result_update) {

die("QUERY FAIL" . mysqli_error($connection));
}


 }


  ?>
                                
</div>

<div class="form-group">
    <input class = "btn btn-primary", type = "submit", name = "Update_category", value = "Update category" >
</div>

</form>   

