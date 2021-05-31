<?php
include "config.php";

    if(empty($_FILES['new-image']['name']))
    {
       echo $file_name = $_POST['old-image'];
    }
    else{
    $error = array();
        
        $file_name = $_FILES['new-image']['name'];
        $file_size = $_FILES['new-image']['size'];
        $file_tmp_name = $_FILES['new-image']['tmp_name'];
        $a = explode('.', $file_name);
        $b = strtolower(end($a));
      
        $c = array('jpg', 'jpeg', 'png');

        if(in_array($b, $c) === false)
        {
            $error[] = "Only jpg,jpeg,png file allowed";
        }

        if($file_size > 2097152){
            $error[] = "file must be less then 2 MB";
        }
    

        if(empty($error) == true){
            move_uploaded_file($file_tmp_name, "images/". $file_name);
        }else{
            
            $_SESSION['msg'] =  $error[0];
            //header('location: http://localhost/shojol/news-site/admin/post.php');
            
        }
    }


$title = mysqli_real_escape_string($con, $_POST['web_title']);
$des = mysqli_real_escape_string($con, $_POST['footer_desc']);




$sql = "update setting set website_title = '{$title}', footer_desc = '{$des}',  logo = '{$file_name}'";
if(mysqli_query($con, $sql))
{
    header('location: http://localhost/shojol/news-site/admin/post.php');

}else{
    echo "query failed";
    echo $sql;
}

