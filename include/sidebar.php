<div class="col-md-4">


    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>

    
        <form action = "search.php" method = "post">
        <div class="input-group">
            <input name = "search" type="text" class="form-control">
            <span class="input-group-btn">
                <button name = "submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        </form>
        <!-- /.input-group -->
    </div>




      <!-- Login -->
<?php 

if ($_SESSION['username'] && $_SESSION['password']) {
        


    }
  
    else{include "include/loginform.php";}


?>

    <!-- Blog Categories Well -->
    <div class="well">

        <?php 

        $query = "SELECT * FROM categories";
        $result = mysqli_query($connection, $query);

        ?>


        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">


                    <?php 

                    while($row = mysqli_fetch_assoc($result)){

                        $category = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                        echo "<li><a href = 'category.php?p_id={$cat_id}'>{$category}</a></li>";


                    }

           ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <!-- <?php // include 'widget.php'; ?> -->
</div>