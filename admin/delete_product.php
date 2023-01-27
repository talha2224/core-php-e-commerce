<?php
include 'connection.php';
if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    $query="DELETE FROM `products` WHERE `id`='$id' ";
    $result=mysqli_query($connect,$query);
        if($result){
            header('location:index.php?view_pro');
        }
        else{
            echo 'error';
        }
    }
?>