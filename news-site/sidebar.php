<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php
            include "admin/config.php";          
            $limit = 5;               
            $sql = "select p.post_id,p.category as cat, p.title,p.description, c.category_name as category, p.post_date,p.author as auth, p.post_img, u.username as author
            from post as p
            LEFT join category as c on p.category = c.category_id
            LEFT join user as u on p.author = u.user_id 
            ORDER BY p.post_id DESC limit  {$limit}";
            $table = mysqli_query($con, $sql);
            if(mysqli_num_rows($table) > 0)
            {
                while($row = mysqli_fetch_assoc($table))
            {
                            
        ?>
        <div class="recent-post">
            <a class="post-img" href="single.php?id=<?php echo $row['post_id'];?>">
                <img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single.php?id=<?php echo $row['post_id'];?>"><?php echo $row['title']; ?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?cid=<?php echo $row['cat']; ?>'><?php echo $row['category']; ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['post_date']; ?>
                </span>
                <a class="read-more" href="single.php?id=<?php echo $row['post_id'];?>">read more</a>
            </div>
        </div>
       <?php
            }
        }
       ?>
    </div>
    <!-- /recent posts box -->
</div>
