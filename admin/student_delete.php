<?php
require_once('conn.php');

$id = base64_decode($_GET['id']);

$delete = mysqli_query($conn,"DELETE FROM `student_info` WHERE `id`='$id'");

if($delete){
    header('location:index.php?page=all_students.php');
}

?>