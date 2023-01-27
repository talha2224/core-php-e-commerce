<?php
$connect = mysqli_connect('localhost', 'root', '', 'mystore');
if (!$connect) {
    echo 'failed database connection';
}


//GETTING CATEGORY

function gettingCat()
{
    global $connect;
    $select = "select * FROM categories";
    $query = mysqli_query($connect, $select);
    while ($data = mysqli_fetch_assoc($query)) {
        $cat_title = $data['category_title'];
        $cat_id = $data['id'];
        echo "
            <div class='electronics-category'>
                    <a style='text-decoration:none;color:white' href='index.php?category=$cat_id'>$cat_title</a>
                </p>
            </div>
        ";
    }
}




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

// add to cart function

function add()
{
    global $connect;
    if (isset($_GET['add_to_cart'])) {
        $id = $_GET['add_to_cart'];
        $ip = getIPAddress();
        $query = "select * from cart where `product_id`=$id and `ip_address`='$ip'";
        $execute = mysqli_query($connect, $query);
        $num = mysqli_num_rows($execute);
        
        if ($num > 0) {

        } 
        else {
            $insert = "Insert into `cart`(`product_id`,`ip_address`,`quantity`) VALUES ('$id','$ip',1)";
            $query = mysqli_query($connect, $insert);
            echo "<script>alert('item added')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

//PENDIND ORDER DETAILS
@session_start();
function get_order()
{
    global $connect;
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $get_details = "select * FROM user_info where `name`='$username'";
        $execute = mysqli_query($connect, $get_details);
        $recive = mysqli_fetch_assoc($execute);
        $user_id = $recive['id'];

        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['del_account'])) {
                    $get_order = "select * from all_orders where `user_id`='$user_id' and `payment_confirm`='Not Confirmed'";
                    $result_order = mysqli_query($connect, $get_order);
                    $num_rows = mysqli_num_rows($result_order);
                    if ($num_rows > 0){
                        echo "
                            <div class='num-order'>
                                <h2 style='margin-bottom:1rem'>YOU HAVE $num_rows PENDING ORDERS</h2>
                                <h3><a href='profile.php?my_orders' style='color:gray'>Order Details</a>
                            </div>
                        ";
                    } else {
                        echo "
                            <div class='num-order'>
                                <h2 style='margin-bottom:1rem'>YOU HAVE 0 PENDING ORDERS</h2>
                            </div>
                        
                        ";
                    }
                }
            }
        }
    }
}
