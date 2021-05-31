<?php
    include "admin/config.php";
    $page =  basename($_SERVER['PHP_SELF']);
    switch($page){
        case 'single.php':
            if(isset($_GET['id']))
            {
                $sql_title = "select * from post where post_id = {$_GET['id']}";
                $table_title = mysqli_query($con, $sql_title);
                $row_title = mysqli_fetch_assoc($table_title);
                $title = $row_title['title'];
            }else{
                $title = "No post found";
            }
        break;

        case 'search.php':
            if(isset($_GET['search']))
            {
                $title = $_GET['search'];
            }else{
                $title = "No search found";
            }
        break;

        case 'author.php':
            if(isset($_GET['aid']))
            {
                $sql_title = "select * from user where user_id = {$_GET['aid']}";
                $table_title = mysqli_query($con, $sql_title);
                $row_title = mysqli_fetch_assoc($table_title);
                $title = "News By ".$row_title['first_name'] ." ". $row_title['last_name'];
            }else{
                $title = "No post found";
            }
        break;

        case 'category.php':
            if(isset($_GET['cid']))
            {
                $sql_title = "select * from category where category_id = {$_GET['cid']}";
                $table_title = mysqli_query($con, $sql_title);
                $row_title = mysqli_fetch_assoc($table_title);
                $title = $row_title['category_name']." News";
            }else{
                $title = "No post found";
            }
            break;

        default:
        $title = 'News site';
        break;

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title;?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
                    <?php
                        include "admin/config.php";
                        $sql_sett = "select * from setting";
                        $table_sett = mysqli_query($con, $sql_sett);
                        $row_sett = mysqli_fetch_assoc($table_sett);
                    ?>
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="admin/images/<?php echo $row_sett['logo']; ?>"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php  
                    include "admin/config.php";
                    if(isset($_GET['cid']))
                    {
                        $id = $_GET['cid'];
                    }
                    
                    $sql = "select * from category where post > 0";
                    $table = mysqli_query($con, $sql);
                    if(mysqli_num_rows($table) > 0){
                        $active  = ""; 
                ?>
                <ul class='menu'>
                    <li><a href="index.php">Home</a></li>     
                    <?php
                        while($row = mysqli_fetch_assoc($table))
                        {
                            if(isset($_GET['cid']))
                            {
                                if($row['category_id'] == $id)
                                {
                                    $active = "active";
                                }else{
                                    $active  = "";  
                                }   
                            }
                            echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                        }
                    ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
