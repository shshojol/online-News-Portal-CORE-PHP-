<?php
    include "config.php";
    $id = $_GET['id'];
    $sql = "delete from user where user_id = '{$id}'";
    if(mysqli_query($con, $sql))
    {
        header('Location: http://localhost/shojol/news-site/admin/users.php');
    }
?>