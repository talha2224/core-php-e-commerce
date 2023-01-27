<?php
include 'connection.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM `categories` WHERE `id`='$id' ";
    $result=mysqli_query($connect,$query);
        if($result){
            header('location:index.php?view_cat');
        }
        else{
            echo 'error';
        }
    }
?>