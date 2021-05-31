<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <?php
                include "config.php";
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                
                $limit = 3;
                $offset = ($page - 1) * $limit;
                $serial = $offset+1;
                if($_SESSION['role'] == 1)
                {
                    $sql = "select p.post_id,p.category as cat, p.title, c.category_name as category, p.post_date, u.username as author
                    from post as p
                    LEFT join category as c on p.category = c.category_id
                    LEFT join user as u on p.author = u.user_id 
                    ORDER BY p.post_id DESC limit {$offset}, {$limit}";
                }else{
                    $sql = "select p.post_id,p.category as cat, p.title, c.category_name as category, p.post_date, u.username as author
                    from post as p
                    LEFT join category as c on p.category = c.category_id
                    LEFT join user as u on p.author = u.user_id 
                    where p.author = '{$_SESSION['user_id']}'
                    ORDER BY p.post_id DESC limit {$offset}, {$limit}";
                }
                
                $table = mysqli_query($con, $sql);
                

               
              ?>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?PHP
                        while($row = mysqli_fetch_assoc($table))
                        {
                      ?>
                          <tr>
                              <td class='id'><?php echo $serial++; ?></td>
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['category']; ?></td>
                              <td><?php echo $row['post_date']; ?></td>
                              <td><?php echo $row['author']; ?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id'];?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $row['post_id'];?>&cid=<?php echo $row['cat'];?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?PHP } ?> 
                      </tbody>
                  </table>
                  <?php
                    if($_SESSION['role'] == 1)
                    {
                        $sql1 = "select * from post";
                    }else{
                        $sql1 = "select * from post where author = '{$_SESSION['user_id']}'";
                    }
                    
                    $table1 = mysqli_query($con, $sql1);
                    $total_record = mysqli_num_rows($table1);
                    $limit = 3;
                    $total_page = ceil($total_record/$limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if($page > 1)
                    {
                        echo "<li><a href='post.php?page=".($page-1)."'>Prev</a></li>";
                    }
                    
                    for($i=1; $i <= $total_page; $i++)
                    {
                        if($i == $page)
                        {
                            echo "<li class='active'><a href='post.php?page=".$i."'>".$i."</a></li>"; 
                        }else{
                            echo "<li><a href='post.php?page=".$i."'>".$i."</a></li>";
                        }
                        
                    }
                    if($page < $total_page)
                    {
                        echo "<li><a href='post.php?page=".($page+1)."'>Next</a></li>";
                    }
                    echo "</ul>";
                  ?>
                 
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
