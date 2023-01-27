<?php
include '../../e-commerce/admin/connection.php';
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
$ip=getIPAddress();
$query="select * from user_info where ip_address='$ip'";
$run=mysqli_query($connect,$query);
$count=mysqli_fetch_assoc($run);
$user_id=$count['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="../css/payment.css">
</head>
<body>
    <div class="heading">
        <h1>Payment Options</h1>
    </div>
    <div class="container">
        <div class="sub1">
            <img src="../../e-commerce/img/normal/online.png" alt="">
            <a href="">
                <h3>Online Payment</h3>
            </a>
        </div>
        <div class="sub2">
            ----OR----
        </div>
        <div class="sub3">
        <img src="../../e-commerce/img/normal/offline.png" alt="">
            <a href="order.php?user_id=<?php echo $user_id?>">
                <h3>Offline Payment</h3>
            </a>
        </div>
    </div>
</body>
</html>