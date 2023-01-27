<?php
include '../function/common_func.php';
if (!isset($_SESSION['username'])) {
    echo "<script>window.open('../index.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <h2 class="profile">Profile</h2>
            <h4 class="home"><a href="../index.php">Home</a></h4>
            <h4 class="pending"><a href="profile.php">Pending Orders</a></h4>
            <h4 class="edit"><a href="profile.php?edit_account">Edit Account</a></h4>
            <h4 class="order"><a href="profile.php?my_orders">My Orders</a></h4>
            <h4 class="del"><a href="profile.php?del_account">Delete Account</a></h4>
        </div>

        <div class="orders">
            <?php
            get_order();
                //EDIT ACCOUNT
                if (isset($_GET['edit_account'])) {
                    include 'edit_account.php';
                }
                //GET ALL ORDER DETAILS
                if (isset($_GET['my_orders'])) {
                    include 'order_display.php';
                }
                //DELETING ACCOUNT
                if (isset($_GET['del_account'])) {
                    include 'delete_account.php';
                }
            
            ?>
        </div>
    </div>
</body>

</html>