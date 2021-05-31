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
 
        $id = mysqli_real_escape_string($con, $_POST['user_id']);
        $fname = mysqli_real_escape_string($con, $_POST['f_name']);
        $lname = mysqli_real_escape_string($con, $_POST['l_name']);
        $user = mysqli_real_escape_string($con, $_POST['username']);
        $role = mysqli_real_escape_string($con, $_POST['role']);
        
 
   
            $sql1 ="update user set first_name = '{$fname}', last_name = '{$lname}', username = '$user', 
            role = '{$role}' where user_id = '{$id}'";
            if(mysqli_query($con, $sql1))
            {
                header('Location: http://localhost/shojol/news-site/admin/users.php');
            }
      
    }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
              <?php
                include 'config.php';
                $id = $_GET['id'];
                $sql = "select * from user where user_id = '{$id}'";
                $table = mysqli_query($con, $sql);
                if(mysqli_num_rows($table) > 0)
                {
                    while($row = mysqli_fetch_assoc($table))
                    {
              ?>
                  <!-- Form Start -->
                  <form  action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?PHP echo $row['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?PHP echo $row['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?PHP echo $row['last_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?PHP echo $row['username']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                          <?PHP
                            if($row['role'] == '0')
                            {
                                echo '<option value="0" selected>normal User</option>
                                        <option value="1">Admin</option>';
                            }else{
                                echo '<option value="0">normal User</option>
                                        <option value="1" selected>Admin</option>';
                            }
                          ?>
                              
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
                  <?PHP
                       }
                    }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
