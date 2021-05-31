<?php
include "config.php";
$cid = $_GET['id'];
$sql = "delete from category where category_id = '{$cid}' ";
if(mysqli_query($con, $sql))
{
    header('Location: http://localhost/shojol/news-site/admin/category.php');
}