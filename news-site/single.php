<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <?php
                            include "admin/config.php";
                            $id = $_GET['id'];
                            $sql = "select p.post_id,p.category as cat, p.title,p.description,p.author as auth, c.category_name as category, p.post_date, p.post_img, u.username as author
                            from post as p
                            LEFT join category as c on p.category = c.category_id
                            LEFT join user as u on p.author = u.user_id 
                            where post_id = {$id}";
                            $table = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_assoc($table))
                                {
                        ?>
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid=<?php echo $row['cat']; ?>'><?php echo $row['category']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $row['auth']; ?>'><?php echo $row['author']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date']; ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/>
                            <p class="description">
                                <?php echo $row['description']; ?>
                            </p>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
