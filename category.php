  <?php include 'include/db.php' ?>
  <?php include 'include/header.php' ?>

    <!-- Navigation -->
  
  <?php include 'include/navigation.php' ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


                <?php 

                if (isset($_GET['p_id'])) {
                  $p_id = $_GET['p_id'];
                }

                $query = "SELECT * FROM posts WHERE post_category_id = {$p_id}";
                $result = mysqli_query($connection,$query);
                if (!$query) {
                   die("QUERY FAILED".mysqli_error($connection));
                }

                while ($row = mysqli_fetch_assoc($result)) {

                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_authur = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  $post_contents = substr($row['post_content'], 0,400);


                  ?>
<!-- 
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo "{$post_title}"; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo "{$post_authur}"; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo "{$post_date}"; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo "{$post_contents}"; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                    
              <?php  } ?>



            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <?php include 'include/sidebar.php' ?>

        </div>
        <!-- /.row -->

        <hr>

         <?php include 'include/footer.php' ?>

       