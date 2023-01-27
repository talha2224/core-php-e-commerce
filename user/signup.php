<?php
include '../../e-commerce/admin/connection.php';
session_start();
// GETTING IP ADDRESS

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $ip_address = getIPAddress();
    $address = $_POST['address'];
    $mobile = $_POST['phone'];

    //VALIDATING QUERY
    $valid = "SELECT * FROM `user_info` WHERE `email`='$email' or `ip_address`='$ip_address' or `name`='$name'";
    $valid_query = mysqli_query($connect, $valid);
    $num = mysqli_num_rows($valid_query);

    if ($num > 0) {
        echo "<script>alert('user already present')</script>";
    } else {
        $query = "INSERT INTO `user_info`( `name`, `email`, `password`, `ip_address`, `address`, `mobile`)VALUES('$name','$email','$hash','$ip_address',' $address','$mobile')";
        $execute = mysqli_query($connect, $query);
        if (!$execute) {
            echo "<script>alert('failed')</script>";
        } else {
            $_SESSION['username']=$name;
        }
        
        // CHECKING ITEMS IN PRESENT IN YOUR CART OR NOT
        $check_query = "SELECT * FROM `cart` WHERE `ip_address`='$ip_address'";
        $cart_execute = mysqli_query($connect, $check_query);
        $count_cart = mysqli_num_rows($cart_execute);
        if ($count_cart > 0) {
            $_SESSION['username']=$name;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        } else {
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/88b1c3a02d.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="../css/signup.css">
</head>

<body>
    <div class="container">
        <div class="sub1">
            <img src="../img/normal/register.png" alt="">
        </div>
        <div class="sub2">
            <div class="heading">
                <h2>REGISTER YOURSELF :)</h2>
            </div>
            <form action="" method="POST">
                <!-- NAME -->
                <div class="name">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="name" class="na" placeholder="Enter your name" required>
                </div>

                <div class="email">
                    <i class="fa-regular fa-envelope" class="emailicon"></i>
                    <input type="text" name="email" class="e" placeholder="Enter your email" required>
                </div>

                <div class="password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" class="pass" placeholder="Enter your password" required>
                </div>

                <div class="address">
                    <i class="fa-solid fa-house"></i>
                    <input type="text" class="add" name="address" class="pass" placeholder="Enter your address" required>
                </div>


                <div class="phone">
                    <i class="fa-solid fa-mobile"></i>
                    <input type="text" class="ph" name="phone" class="e" placeholder="Enter your phone" required>
                </div>


                <div class="btn">
                    <p>Already have an account? please
                        <a href="login.php">login</a>
                    </p>
                    <input type="submit" value="Register" name="submit" class="submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>