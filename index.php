<?php
    require('config/config.php');
    require('config/db.php');

    //query result
    $query = 'SELECT * FROM posts';
    $result = mysqli_query($conn, $query);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);
?>


<?php include('inc/header.php'); ?>
    <div class="container">
        <h1><center> BLOG POSTS</center></h1>
       
        <?php foreach($posts as $post) : ?>
         <div class="jumbotron">
            <center>
                    <h3><?php echo $post['title']; ?></h3>
                    <small>Created on: <?php echo $post['created_at']; ?> by 
                    <?php echo $post['author']; ?>
                    </small>
                    <p><i><?php echo $post['body']; ?></i></p>
                    <a class="btn btn-secondary" href="<?php echo ROOT_URL;?>post.php?id=<?php echo $post['id']; ?>">
                    Read More</a>
             </center>
         </div>
        <?php endforeach;?>
       
    </div>
<?php include('inc/footer.php'); ?>