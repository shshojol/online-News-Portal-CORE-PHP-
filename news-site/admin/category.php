<?php 
include "header.php"; 
if($_SESSION['role'] == 0)
{
    header('location: http://localhost/shojol/news-site/admin/post.php');
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
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
                $seiral = $offset+1;
                $sql = "select * from category ORDER BY category_id DESC limit {$offset}, {$limit}";
                $table = mysqli_query($con, $sql);
                if(mysqli_num_rows($table) > 0)
                {  
            ?>
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php 
                        while($row = mysqli_fetch_assoc($table))
                        {   
                    ?>
                        <tr>
                            <td class='id'><?php echo $seiral++; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['post']; ?></td>
                            <td class='edit'><a href='update-category.php?id=<?PHP echo $row['category_id'] ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?id=<?PHP echo $row['category_id'] ?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                       <?php } ?> 
                    </tbody>
                </table>
                <?php } 
                    $sql1 = "select * from category";
                    $table = mysqli_query($con, $sql1);
                    if(mysqli_num_rows($table) > 0)
                    {
                        $total_records = mysqli_num_rows($table);
                        $limit = 3;
                        $total_page = ceil($total_records/$limit);
                        echo "<ul class='pagination admin-pagination'>";
                        if($page >= 2)
                        {
                            echo "<li><a href='category.php?page=".($page-1)."'>Prev</a></li>";
                        }
                        for($i=1; $i <= $total_page; $i++)
                        {
                            if($i == $page)
                          {
                            echo "<li class='active'><a href='category.php?page={$i}'>{$i}</a></li>"; 
                          }else{
                            echo "<li><a href='category.php?page={$i}'>{$i}</a></li>";
                          }  
                            
                        }
                        if($page < $total_page)
                        {
                            echo "<li><a href='category.php?page=".($page+1)."'>Next</a></li>";
                        }
                        
                        echo "</ul>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
