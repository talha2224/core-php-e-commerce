<?php
include '../../e-commerce/admin/connection.php';
@session_start();
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
if(isset($_POST['submit_login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="select  * from `user_info` WHERE `email`='$email'";
    $execute=mysqli_query($connect,$query);
    $number_of_rows=mysqli_num_rows($execute);
    $fetch_pass=mysqli_fetch_assoc($execute);
    $username=$fetch_pass['name'];

    //cart items count
    $ip=getIPAddress();
    $cart_query="SELECT * FROM `cart` WHERE `ip_address`='$ip' ";
    $select_cart=mysqli_query($connect,$cart_query);
    $cart_count=mysqli_num_rows($select_cart);

    if($number_of_rows>0){
        $_SESSION['username']=$username;
        if(password_verify($password,$fetch_pass['password'])){
            if($number_of_rows==1 and $cart_count==0 ){
                $_SESSION['username'] = $username ;
                echo "<script>alert('login succesfully')</script>";
                echo "<script>window.open('profile.php','_self');</script>";
            }
            else{
                $_SESSION['username'] = $username ;
                echo "<script>alert('login succesfully')</script>";
                echo "<script>window.open('payment.php','_self');</script>";
            }
        }
        else{
            echo "<script>alert('invalid credentials')</script>";
        }
    }
    else{
        echo "<script>alert('invalid credentials')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://kit.fontawesome.com/88b1c3a02d.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="sub1">
            <img src="../../e-commerce/img/normal/login.png" alt="">
        </div>
        <div class="sub2">
            <div class="heading">
                <h2>WELCOME TO E-SHOP :)</h2>
            </div>
            <form action="" method="POST">

                <div class="email">
                    <i class="fa-regular fa-envelope" class="emailicon"></i>
                    <input type="text" name="email" class="e" placeholder="Enter your email"required>
                </div>

                <div class="password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" class="pass" placeholder="Enter your password"required>
                </div>

                <div class="btn">
                    <p>Don't have an account? please
                        <a href="signup.php">signup</a>
                    </p>
                    <input type="submit" value="Login" name="submit_login" class="submit" >
                </div>
            </form>
        </div>
    </div>
</body>
</html>