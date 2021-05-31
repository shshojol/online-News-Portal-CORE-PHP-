<?php
    session_start();
    if(isset($_FILES['fileToUpload']))
    {
        $error = array();
        
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp_name = $_FILES['fileToUpload']['tmp_name'];
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
            header('location: http://localhost/shojol/news-site/admin/add-post.php');
            die();
            
        }
        include "config.php";
        
        $title = mysqli_real_escape_string($con, $_POST['post_title']);
        $des = mysqli_real_escape_string($con, $_POST['postdesc']);
        $cat = mysqli_real_escape_string($con, $_POST['category']);
        $date = date("d M, Y");
        $title = mysqli_real_escape_string($con, $_POST['post_title']);
        $author = $_SESSION['user_id'];

        $sql = "insert into post(title, description, category, post_date, author, post_img)
        values('{$title}', '{$des}', '{$cat}', '{$date}',{$author}, '{$target}');";
        $sql .= "update category set post=post+1 where category_id = {$cat}";
        if(mysqli_multi_query($con, $sql))
        {
            header('location: http://localhost/shojol/news-site/admin/post.php');
        }else{
            echo "query failed";
            echo $sql;
        }
        
    }
?>