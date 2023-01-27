<?php
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
$ip = getIPAddress();
include '../admin/connection.php';


if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $total_price = 0;
    // STEP#1 GETTING USER INFORMATION START
    $USER_INFO = "select * from user_info where id='$user_id'";
    $USER_INFO_QUERY = mysqli_query($connect, $USER_INFO);

    //  STEP # 2 GETTING GETTING PRICE START :-
    $USER_CART_INFO = "SELECT * FROM `cart` WHERE `ip_address`='$ip'";
    $USER_CART_QUERY = mysqli_query($connect, $USER_CART_INFO);
    $USER_CART_ROWS = mysqli_num_rows($USER_CART_QUERY);    // LOOPING TO GET SINGLE PRODUCT ID
    while ($SINGLE_PRODUCT_ID = mysqli_fetch_array($USER_CART_QUERY)) {
        $GETTING_PRODUCT_ID = $SINGLE_PRODUCT_ID['product_id'];

        $SELECTING_EACH_PRODUCT = "SELECT * FROM `products` WHERE `id`='$GETTING_PRODUCT_ID'";

        $RUN_GETTING_CART = mysqli_query($connect, $SELECTING_EACH_PRODUCT);

        while ($EACH_PRODUCT_PRICE = mysqli_fetch_array($RUN_GETTING_CART)) {
            $EACH_PRODUCT_PRICE = array($EACH_PRODUCT_PRICE['product_price']);
            $sum_all_product_price = array_sum($EACH_PRODUCT_PRICE);
            $total_price += $sum_all_product_price;
        }
    }

    //STEP # 3 GETTING TOTAL PRICE 

    $get_cart = "SELECT * FROM `cart`";
    $run_cart = mysqli_query($connect, $get_cart);
    $get_item_quan = mysqli_fetch_array($run_cart);
    $quantity = $get_item_quan['quantity'];
    if ($quantity == 0) {
        $quantity = 1;
        $subtotal = $total_price;
    } else {
        $quantity = $quantity;
        $subtotal = $total_price * $quantity;
    }
}

//ID OF PRODUCT
$getting_single_id="select * from cart where ip_address='$ip'";
$getting_single_id_execution=mysqli_query($connect,$getting_single_id);
$counting=mysqli_num_rows($getting_single_id_execution);
if($counting>0){
    while($fetch=mysqli_fetch_assoc($getting_single_id_execution)){
        $product_id=$fetch['product_id'];
        $quantity_product=$fetch['quantity'];

        $getting_product_price="select * from products where id='$product_id'";
        $getting_product_price_execution=mysqli_query($connect,$getting_product_price);
        while($fetchprice=mysqli_fetch_assoc($getting_product_price_execution)){
            $single_price=$fetchprice['product_price']*$quantity_product;
            $product_available=$fetchprice['quantity'];
            $after_order=$product_available-$quantity_product;
            // INSERT QUERY:-

            $INSERT_ORDER="insert into `all_orders` (`product_quantity`, `total_amount`, `ip`, `payment_confirm`, `date`, `user_id`, `payment_method`,product_id) 
            values('$quantity_product','$single_price','$ip','Not Confirmed',NOW(),'$user_id','Not Selected','$product_id')
            ";
            $INSERT_ORDER_EXECUTION=mysqli_query($connect,$INSERT_ORDER);
            if($INSERT_ORDER_EXECUTION){
                echo "<script>alert('order placed sucessfully')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
                //UPDATING PRODUCT QUANTITY
                $updating_query="update products set quantity='$after_order' where id='$product_id'";
                $updating_query_exe=mysqli_query($connect,$updating_query);
                // DELETING CART ITEM:-
                $del_cart="DELETE FROM `cart` WHERE `ip_address`='$ip'";
                $del_run_query=mysqli_query($connect,$del_cart);
            }
        }
    }
}
else{
    echo "<script>window.open('../index.php','_self')</script>";
}









// if(isset($_GET['user_id'])){
//     $user_id=$_GET['user_id'];
//     // echo "<script>alert('$user_id')</script>";
//     $total_price=0;
//     $query="SELECT * FROM `cart` WHERE `ip_address`='$ip'";
//     $execute=mysqli_query($connect,$query);

// $count=mysqli_num_rows($execute);

// while($price=mysqli_fetch_array($execute)){
//     $product_id=$price['product_id'];

//     $product_query="SELECT * FROM `products` WHERE `id`='$product_id'";
//     $run_product=mysqli_query($connect,$product_query);
//     while($product_price=mysqli_fetch_array($run_product)){
//         $product_price=array($product_price['product_price']);
//         $product_price_value=array_sum($product_price);
//         $total_price+=$product_price_value;
//     }
// }

//     //quantity items

//     $get_cart="SELECT * FROM `cart`";
//     $run_cart=mysqli_query($connect,$get_cart);
//     $get_item_quan=mysqli_fetch_array($run_cart);
//     $quantity=$get_item_quan['quantity'];
//     if($quantity==0){
//         $quantity=1;
//         $subtotal=$total_price;
//     }
//     else{
//         $quantity=$quantity;
//         $subtotal=$total_price*$quantity;
//     }
// }

// // insert orders
// $insert_order="INSERT INTO `user_orders` ( `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `status`) 
// VALUES
// ($user_id,$subtotal,$invoice_number,$count,NOW(),'$status')";

// $result_query=mysqli_query($connect,$insert_order);
// if($result_query){
//     echo "<script>alert('order placed sucessfully')</script>";
//     echo "<script>window.open('profile.php','_self')</script>";

// }

// // PENDING ORDERS
// $insert_pending_order="INSERT INTO `pending_orders` (`user_id`, `invoice_number`, `product_id`, `product_quantity`, `status`) 
// VALUES
// ('$user_id','$invoice_number','$product_id','$quantity','$status')";

// $order_pending_query=mysqli_query($connect,$insert_pending_order);

?>

<!-- 

$payment_confirm="not confirmed";
    $payment_method="not selected"; -->