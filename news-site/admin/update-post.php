<?php include "header.php"; 
include "config.php";
$id = $_GET['id'];
if($_SESSION['role'] == 0)
{
    $sql3 = "select author from post where post_id = {$id}";
    $table3 = mysqli_query($con, $sql3);
    $row3 = mysqli_fetch_assoc($table3);
    if($row3['author'] != $_SESSION['user_id'])
    {
        header('location: http://localhost/shojol/news-site/admin/post.php');
    }
}
?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <?php
            $id = $_GET['id'];
            include "config.php";
            $sql1 = "select p.post_id, p.title, p.description, c.category_name as category, p.category as categ, p.post_date,p.post_img, u.username as author
            from post as p
            LEFT join category as c on p.category = c.category_id
            LEFT join user as u on p.author = u.user_id where post_id = {$id}";
            $table1 = mysqli_query($con, $sql1);
            while($row1 = mysqli_fetch_assoc($table1))
            {
        ?>
        <!-- Form for show edit-->
        <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row1['post_id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row1['title']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                <?php echo $row1['description']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                            <?php
                                include 'config.php';
                                $sql = "select * from category";
                                $table = mysqli_query($con, $sql);
                                while($row = mysqli_fetch_assoc($table))
                                {
                                    if($row['category_id'] == $row1['categ'])
                                    {
                                       $sel = 'selected';
                                    }else{
                                       $sel = "";
                                    }
                                    echo "<option {$sel} value='{$row['category_id']}'>{$row['category_name']}</option>";
                                }
                            ?>
                </select>
                <input type='hidden' name="old_category" value='<?php echo $row1['categ']; ?>'/>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $row1['post_img']; ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row1['post_img']; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
