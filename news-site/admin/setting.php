<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Setting</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="setting-save-update.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <?php
            include "config.php";
            $sql = "select * from setting";
            $table = mysqli_query($con, $sql);
            while($row1 = mysqli_fetch_assoc($table))
            {
        ?>
            
            <div class="form-group">
                <label for="exampleInputTile">website Title</label>
                <input type="text" name="web_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row1['website_title']; ?>">
            </div>

            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="images/<?php echo $row1['logo']; ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row1['logo']; ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Footer Description</label>
                <textarea name="footer_desc" class="form-control"  required rows="5"><?php echo $row1['footer_desc']; ?></textarea>
            </div>
            
            
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
            <?php } ?>
        </form>
        <!-- Form End -->
        </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>