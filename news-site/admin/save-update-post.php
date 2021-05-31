<?php
include "config.php";

    if(empty($_FILES['new-image']['name']))
    {
        $target = $_POST['old-image'];
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
    
        $target = time()."-".$file_name;
        if(empty($error) == true){
            move_uploaded_file($file_tmp_name, "upload/". $target);
        }else{
            
            $_SESSION['msg'] =  $error[0];
            //header('location: http://localhost/shojol/news-site/admin/post.php');
            
        }
    }

$id = mysqli_real_escape_string($con, $_POST['post_id']);
$title = mysqli_real_escape_string($con, $_POST['post_title']);
$des = mysqli_real_escape_string($con, $_POST['postdesc']);
$cat = mysqli_real_escape_string($con, $_POST['category']);



$sql = "update post set title = '{$title}', description = '{$des}', category = '{$cat}', post_img = '{$target}'
where post_id = '{$id}';";
if($_POST['old_category'] != $cat)
{
    $sql .= "update category set post = post-1 where category_id = {$_POST['old_category']};";
    $sql .= "update category set post = post+1 where category_id = {$cat};";
}

if(mysqli_multi_query($con, $sql))
{
    header('location: http://localhost/shojol/news-site/admin/post.php');

}else{
    echo "query failed";
    echo $sql;
}

