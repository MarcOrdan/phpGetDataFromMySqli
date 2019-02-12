<?php
    require('config/config.php');
    require('config/db.php');

    //get id
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //query result
    $query = 'SELECT * FROM posts WHERE id = '.$id;
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);
?>


<?php include('inc/header.php'); ?>
    <div class="container">
        <h1><center><?php echo $post['title']; ?></center></h1>
        <div class="jumbotron">
            <center>
                    <small>Created on: <?php echo $post['created_at']; ?> by 
                    <?php echo $post['author']; ?>
                    </small>
                    <p><i><?php echo $post['body']; ?></i></p>
                    <a href="<?php echo ROOT_URL; ?>" class="btn btn-secondary">Back</a>
            </center>
        </div>
       
    </div>
<?php include('inc/footer.php'); ?>