<?php
session_start();
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/88b1c3a02d.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="insert.css">
    <link rel="stylesheet" href="view_product.css">
</head>

<body>
    <div class="main-admin-container">

        <div class="admin-layout-container">


            <div class="admin-container-1">
                <div class="shop-name">
                    <h2>E-Shop</h2>
                </div>

                <div class="options-container">
                    <div class="single-option">
                        <i class="fa-solid fa-eye" style="color: white"></i>
                        <p>
                            <a href="index.php?view_pro">View Products</a>
                        </p>
                    </div>
                </div>

                <div class="options-container">
                    <div class="single-option">
                        <i class="fa-solid fa-eye" style="color: white"></i>
                        <p>
                            <a href="index.php?view_cat">View Categories</a>
                        </p>
                    </div>
                </div>


                <div class="options-container">
                    <div class="single-option">
                        <i class="fa-solid fa-eye" style="color: white"></i>
                        <p>
                            <a href="index.php?view_brands">View Brands</a>
                        </p>
                    </div>
                </div>

                <div class="options-container">
                    <div class="single-option">
                        <i class="fa-solid fa-plus" style="color: white"></i>
                        <p>
                            <a href="product_insert.php">Insert Products</a>
                        </p>
                    </div>
                </div>

                <div class="single-option">
                    <div class="options-container">
                        <i class="fa-solid fa-plus" style="color: white"></i>
                        <p>
                            <a href="index.php?insert_category">Insert Categories</a>
                        </p>
                    </div>
                </div>


                <div class="options-container">
                    <div class="single-option">
                        <i class="fa-solid fa-plus" style="color: white"></i>
                        <p>
                            <a href="index.php?insert_brand">Insert Brands</a>
                        </p>
                    </div>
                </div>

                <div class="options-container">
                    <div class="single-option">
                        <i class="fa-solid fa-bell" style="color: white;"></i>
                        <p>
                            <a href="index.php?orders_list">Orders</a>
                        </p>
                    </div>
                </div>
                <div class="options-container">
                    <div class="single-option">
                        <i class="fa-solid fa-bars" style="color: white;"></i>
                        <p>
                            <a href="index.php?payment">All Payments</a>
                        </p>
                    </div>
                </div>

                <div class="options-container">
                    <div class="single-option">
                        <i class="fa-solid fa-bars" style="color: white;"></i>
                        <p>
                            <a href="index.php?user_info">View Users</a>
                        </p>
                    </div>
                </div>

                <div class="options-container">
                    <div class="single-option">
                        <i class="fa-solid fa-arrow-right-from-bracket" style="color:white"></i>
                        <p>
                            <a href="logout.php">Logout</a>
                        </p>
                    </div>
                </div>

            </div>
            <!-- Side nav end -->

            <div class="admin-container-2">

                <!-- NAVBAR admin -->
                <div class="admin-navbar">
                    <div class="dashbaord-heading">
                        <h2>Dashboard</h2>
                    </div>

                    <div class="welcome-admin">
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "<h4 style='color:black;''>Welcome Admin</h4>";
                        } else {
                            echo "<h4 style='color:black;'>Welcome   " . $_SESSION['username'] . "</h4>";
                        }

                        ?>
                    </div>

                    <div class="login-logout">
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo "<h4><a href='login.php' style='color:black;text-decoration:none;'>Login</a></h4>";
                        } else {
                            echo "<h4 ><a href='logout.php'style='color:black;text-decoration:none;'>Logout</a></h4>";
                        }

                        ?>
                    </div>
                </div>
                <!-- NAVBAR ADMIN END -->

                <!-- Haeder-Shortcuts  Start -->
                <div class="shortcut">
                    <div class="first-shortcut">
                    <a href="index.php?user_info" style="color: black;">
                            <?php
                            $select="SELECT * FROM `user_info`";
                            $exe=mysqli_query($connect,$select);
                            $count=mysqli_num_rows($exe);
                            if($count>0){
                                echo "<h2 style='margin-left:13px;'>$count</h2>";
                            }
                            else{
                                echo "<h2 style='margin-left:13px;'>0</h2>";
                            }
                            ?>
                        <h4>Users</h4>
                    </div>

                    <div class="second-shortcut">
                        <a href="index.php?orders_list" style="color: black;">
                            <?php
                            $select="SELECT * FROM `all_orders`";
                            $exe=mysqli_query($connect,$select);
                            $count=mysqli_num_rows($exe);
                            if($count>0){
                                echo "<h2 style='margin-left:13px;'>$count</h2>";
                            }
                            else{
                                echo "<h2 style='margin-left:13px;'>0</h2>";
                            }
                            ?>
                            <h4>Orders</h4>
                        </a>
                    </div>

                    <div class="third-shortcut">
                        <h3>See</h3>
                        <h4>Todo's</h4>
                    </div>
                </div>
                <!-- Haeder-Shortcuts  END -->

                <!-- DYNAMIC  SECTION -->

                <?php
                if (isset($_GET['insert_category'])) {
                    include 'insert_category.php';
                }
                if (isset($_GET['insert_brand'])) {
                    include 'insert_brand.php';
                }
                if (isset($_GET['view_cat'])) {
                    include 'view_cat.php';
                }
                if (isset($_GET['view_brands'])) {
                    include 'view_brands.php';
                }

                if (isset($_GET['view_pro'])) {
                    include 'view_product.php';
                }
                if (isset($_GET['orders_list'])) {
                    include 'orderlist.php';
                }
                if (isset($_GET['payment'])) {
                    include 'view_payment.php';
                }
                if (isset($_GET['user_info'])) {
                    include 'user_info.php';
                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>