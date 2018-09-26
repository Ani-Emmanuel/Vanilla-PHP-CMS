<?php include "include2/header.php" ?> 


    <div id="wrapper">

        <!-- Navigation -->


       <?php include "include2/navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->


<div class="row">
    <div class="col-lg-12">


       <!--  <h1 class="page-header">
            Blank Page
            <small>Subheading</small>
        </h1>
 -->

        <div class="col-xs-6">

            <?php 

if (isset($_POST['submit'])) {

$cat_title = $_POST['cat_title'];

if ($cat_title == "" || empty($cat_title)) {

    echo "This field should not be empty";
    
}

else{

$query = "INSERT INTO categories(cat_title) VALUE ('$cat_title') ";
$result = mysqli_query($connection,$query);

if (!$result) {

    die("query fail". mysqli_errno($connection));
}
}

}

?>




<form action = "category.php" method = "post">
<div class="form-group">
    <label for = "cat_title">Add Category</label>
    <input class ="form-control", type = "text", name = "cat_title">
</div>

<div class="form-group">
    <input class = "btn btn-primary", type = "submit", name = "submit", value = "Add category" >
</div>

</form>   




<?php 


if (isset($_GET['Edit'])) {

$the_cat_id = $_GET['Edit'];


include "include2/update_category.php ";
}





    ?>


     </div>  
    <div class="col-xs-6">


        <table class = "table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
        <tbody>
            <tr>


                <?php 

 global $connection;

$query = "SELECT * FROM categories";
$result = mysqli_query($connection, $query);


while ($row = mysqli_fetch_assoc($result)) {


    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<tr>";
    echo  "<td>{$cat_id}</td>";
    echo  "<td>{$cat_title}</td>";
    echo  "<td><a href = 'category.php?Delete={$cat_id}'>DELETE</a></td>";
    echo  "<td><a href = 'category.php?Edit={$cat_id}'>Edit</a></td>";

    echo "</tr>";

  
}
    ?>

  <?php 

if (isset($_GET['Delete'])) {

    $the_cat_id = $_GET['Delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
    $result = mysqli_query($connection,$query);
    header("location: category.php");


}



                    ?>
                   
                </tr>
            </tbody>   

              </table>  
        </div>



                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "include2/footer.php" ?>