<?php
@session_start();
include '../admin/connection.php';
if (isset($_POST['submit'])){
    $username=$_SESSION['username'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $ip=getIPAddress();
    $insert="UPDATE `user_info` SET `name`='$name',`email`='$email',`address`='$address',`mobile`='$phone' WHERE `name`='$username'";
    $insert_execute=mysqli_query($connect,$insert);
    if($insert){
        $_SESSION['username']=$name;
        echo "<script>alert('Profile Updated Sucessfully')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <link rel="stylesheet" href="../css/edit.css">
</head>

<body>
    <div class="container3">
        <div class="heading">
            <h3>
                <?php
                if (isset($_SESSION['username'])) {
                    echo "Welcome   ".$_SESSION['username'];
                } else {
                }
                ?>
            </h3>
        </div>
    </div>

    <div class="user-info-container">

        <form method="POST" class="form">

            <div class="edit-heading">
                <h2 class="edit-heading">Account Settings</h2>
            </div>

            <?php
            $ip = getIPAddress();
            $get = "SELECT * FROM `user_info` WHERE `ip_address`='$ip' ";
            $execute = mysqli_query($connect, $get);
            $fetch = mysqli_fetch_assoc($execute);
            $name = $fetch['name'];
            $email = $fetch['email'];
            $phone = $fetch['mobile'];
            $address = $fetch['address'];
            echo "
                <div class='form_container'>
                    <p>Name</p>
                    <input class='input' type='text' name='name' value='$name' id='name' placeholder='Your Name'>
                    <p>Email</p>
                    <input class='input' type='text' name='email' value='$email' id='name' placeholder='Your Email'>
                    <p>Phone</p>
                    <input class='input' type='text' name='phone' value='$phone' id='name' placeholder='Your Phone'>
                    <p>Address</p>
                    <input class='input' type='text' name='address' value='$address' id='name' placeholder='Your Address'>
                    <input type='submit' name='submit' class='submit' value='Update'/>   
                </div>
            
            
            "
            ?>
        </form>
    </div>
</body>

</html>