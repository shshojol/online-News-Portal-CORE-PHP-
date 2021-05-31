<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
  
                <div class="post-container">
                <?php
                include "admin/config.php";
                         if(isset($_GET['cid'])){
                            $id = $_GET['cid'];
                        }
                        $sql2 = "select * from category where category_id = {$id}";
                        $table2 = mysqli_query($con, $sql2);
                        $row2 = mysqli_fetch_assoc($table2);

                        
                ?>
                <h2 class="page-heading"><?php echo $row2['category_name'];?></h2>
                <?php
                           
                            
                            if(isset($_GET['page']))
                            {
                                $page = $_GET['page'];
                            }else{
                                $page = 1;
                            }
                            
                            $limit = 3;
                            $offset = ($page - 1) * $limit;
                            $sql = "select p.post_id,p.category as cat, p.title,p.description, c.category_name as category, p.post_date,p.author as auth, p.post_img, u.username as author
                            from post as p
                            LEFT join category as c on p.category = c.category_id
                            LEFT join user as u on p.author = u.user_id where category = {$id}   
                            ORDER BY p.post_id DESC limit {$offset}, {$limit}";
                            
                            $table = mysqli_query($con, $sql);
                            if(mysqli_num_rows($table) > 0)
                            {
                                while($row = mysqli_fetch_assoc($table))
                                {
                            
                        ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id'];?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id'];?>'><?php echo $row['title']; ?></a></h3>
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
                                        <p class="description">
                                        <?php

                                         $cont = $row['description'];
                                         $a = substr($cont,0,400); 
                                         echo $a;
                                         ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'];?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            }else{
                                echo "No record found";
                            }
                        ?>
                       
                       <?php
                    $sql1 = "select * from post where category = {$id}";
                    $table1 = mysqli_query($con, $sql1);
                    $total_record = mysqli_num_rows($table1);
                    $limit = 3;
                    $total_page = ceil($total_record/$limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if($page > 1)
                    {
                        echo "<li><a href='category.php?page=".($page-1)."&cid=".$id."'>Prev</a></li>";
                    }
                    
                    for($i=1; $i <= $total_page; $i++)
                    {
                        if($i == $page)
                        {
                            echo "<li class='active'><a href='category.php?page=".$i."&cid=".$id."'>".$i."</a></li>"; 
                        }else{
                            echo "<li><a href='category.php?page=".$i."&cid=".$id."'>".$i."</a></li>";
                        }
                        
                    }
                    if($page < $total_page)
                    {
                        echo "<li><a href='category.php?page=".($page+1)."&cid=".$id."'>Next</a></li>";
                    }
                    echo "</ul>";
                  ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
