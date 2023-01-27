<?php
include 'connection.php';
if(isset($_GET['id'])){
$id=$_GET['id'];
$del_query="DELETE FROM `all_orders` WHERE `order_id`='$id'";
$execute=mysqli_query($connect,$del_query);
if($execute){
    echo "<script>alert('order deleted')</script>";
    echo "<script>window.open('index.php?orders_list','_self')</script>";

}
}

?>