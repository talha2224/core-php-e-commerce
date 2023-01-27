<?php
include 'connection.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM `brands` WHERE `id`='$id' ";
    $result=mysqli_query($connect,$query);
        if($result){
            header('location:index.php?view_brands');
        }
        else{
            echo 'error';
        }
    }
?>