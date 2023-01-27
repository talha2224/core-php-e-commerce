<?php
include "./admin/connection.php";
include "./function/common_func.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/88b1c3a02d.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Home-Page</title>
</head>

<body>
    <!-- NAVBAR START -->
    <div class="container">
        <div class="sub">
            <!-- FIRST -->
            <div class="first">
                <h2>E-SHOP</h2>
                <!-- SUB-First -->
            </div>

            <!-- Third -->
            <div class="search">
                <form action="search_product.php" method="GET">
                    <input type="text" name="search_data" id="search" placeholder="Find Your Product With Best Price">
                    <input type="submit" name="search_data_product" value="search" class="submit_search">
                </form>
            </div>

            <!-- SECOND -->
            <div class="second">
                <!-- LOGOUT -->
                <div class="icon-div">
                    <a href="cart.php">
                        <i class="fa fa-shopping-cart" id="carticon"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <!-- NAVBAR END -->
    </div>
    <!-- LOGIN LOGOUT -->
    <div class="user">
        <?php
        if (!isset($_SESSION['username'])) {
            echo "<h4 style='color:rgb(102, 93, 93);'>Welcome User</h4>";
        } else {
            echo "<h4 style='color:rgb(102, 93, 93);'>Welcome                  " . $_SESSION['username'] . "</h4>";
        }

        ?>
        <div class="login">
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<h4><a href='user/login.php'>Login</a></h4>";
            } else {
                echo "<h4><a href='user/logout.php'>Logout</a></h4>";
            }

            if (isset($_SESSION['username'])) {
                echo "<h4><a href='user/profile.php'>Profile</a></h4>";
            }

            ?>
        </div>
    </div>
    <div class="main-header">
        <hr>
        <div class="header-container">
            <div class="header1">
                <h1>Better <br> Way To Start <br> The Shopping</h1>
                <p>Make the nex experince of shopping with E-Shop,<br>
                    and get the hight quality products in reasonable price</p>
                <button>
                    <a href="#latest_container">Shop Now</a>
                </button>
            </div>
            <div class="header2">
                <div class="header-img">
                    <img src="./img/header/e.png" alt="shopping-image">
                </div>
            </div>
        </div>
    </div>

    <!-- FEATURES SECTION -->
    <!-- LATEST PRODUCT SECTION -->
    <div class="latest">
        <?php
        add();
        include 'latest.php';
        ?>
    </div>

    </div>
        <!-- ALL PRODUCT DISPLAY -->
        <div class="latest">
        <?php
        include 'show_all.php';
        add();
        ?>
    </div>
    <!-- FOOTER SECTION START -->
    <div class="footer-container">
        <div class="footer">
            <div class="one">
                <h2>E-Shop</h2>
                <h3>According To Us</h3>
                <p>“The easiest and most powerful way to <br> increase customer loyalty is really very simple. <br> Make your customers happy.” </p>
            </div>

            <div class="two">
                <h2>Follow Us</h2>
                <div class="icon-container">
                    <div class="fb">
                        <a href="https://www.facebook.com/profile.php?id=100080156430945" class="a" target="_blank">
                            <i class="fa-brands fa-facebook" class="icon"></i>
                        </a>
                    </div>
                    <div class="ins">
                        <a href="https://www.instagram.com/talha________haider/" target="_blank" class="a">
                            <i class="fa-brands fa-instagram" class="icon"></i>
                        </a>
                    </div>
                    <div class="lin">
                        <a href="https://www.linkedin.com/in/talha-haider/" target="_blank" class="a">
                            <i class="fa-brands fa-linkedin" class="icon"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="three">
                <h2>Support Us</h2>
                <button>Support Us</button>
            </div>
            <div class="four">
                <h2>Resources & Links</h2>
                <div class="part1">
                    <p>Library</p>
                    <p>Title</p>
                    <p>Register</p>
                </div>
                <div class="part2">
                    <p>Colthes</p>
                    <p>Electronics</p>
                    <p>Mobile</p>
                </div>
            </div>
        </div>
        <div class="madeby">
            <h4>Made By Syed Talha Haider</h4>
        </div>
    </div>

</body>

</html>