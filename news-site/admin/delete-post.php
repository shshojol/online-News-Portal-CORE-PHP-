<?php
include "config.php";
$id = $_GET['id'];
$catid = $_GET['cid'];

$sql1 = "select * from post where post_id = {$id}";
$table = mysqli_query($con, $sql1);
while($row = mysqli_fetch_assoc($table))
{
    unlink("upload/".$row['post_img']);
}

$sql = "delete from post where post_id = {$id};";
$sql .= "update category set post = post-1 where category_id = {$catid}";
if(mysqli_multi_query($con, $sql))
{
    header('location: http://localhost/shojol/news-site/admin/post.php');

}