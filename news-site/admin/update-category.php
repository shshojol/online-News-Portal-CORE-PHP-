<?php 
include "header.php"; 
if($_SESSION['role'] == 0)
{
    header('location: http://localhost/shojol/news-site/admin/post.php');
}
?>
<?php
    if(isset($_POST['submit']))
    {
        include 'config.php';
        $cid = $_GET['id'];
        $cat = mysqli_real_escape_string($con, $_POST['cat_name']);

            $sql1 ="update category set category_name = '{$cat}' where category_id = '{$cid}'";
            if(mysqli_query($con, $sql1))
            {
                header('Location: http://localhost/shojol/news-site/admin/category.php');
            }
      
    }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="" method ="POST">
                  <?php
                    include 'config.php';
                    $id = $_GET['id'];
                    $sql = "select * from category where category_id = '{$id}'";
                    $table = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($table))
                    {  
                    ?>
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?PHP echo $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                      <?php } ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
