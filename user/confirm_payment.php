<?php
include '../admin/connection.php';
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_order="SELECT * FROM `all_orders` WHERE `order_id`='$order_id'";
    $execute=mysqli_query($connect,$select_order);
    $fetch=mysqli_fetch_assoc($execute);
    $payment_method=$fetch['payment_method'];
    $product_quantity=$fetch['product_quantity'];
    $total_amount=$fetch['total_amount'];
    $date=$fetch['date'];

    if(isset($_POST['confirm_pay'])){
    
        $payment_mode=$_POST['payment_mode'];
        echo "<script>alert('$payment_mode')</script>";    
        
        $Updating_status="update `all_orders` set `payment_method`='$payment_mode',`payment_confirm`='Confirmed' where `order_id`='$order_id'";
        $update_query=mysqli_query($connect,$Updating_status);
        if($update_query){
            echo "<script>window.open('profile.php','_self')</script>";    
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
    <link rel="stylesheet" href="../css/confirm_payment.css">
    <title>Payment</title>
</head>
<body>
    <div class="payment-container">
        <div class="payment-container-heading">
            <h1>Confirm Payment</h1>
            <div class="payment-methods">
                <form action="" method="POST">
                    <p>Product Quantity</p>
                    <input disabled class="input" type="text" name="product_quant" id="invoice" placeholder="invoice number" value="<?php echo $product_quantity?>">
                    <p>Total Amount</p>
                    <input disabled class="input"  type="text" name="total" id="payment" placeholder="Total Amount" value='<?php echo $total_amount?>'>
                    <p>Select Payment Method</p>
                    <select name="payment_mode" id="payment_mode" required>
                        <option>Select Payment Method</option>
                        <option>UPI</option>
                        <option >Net Banking</option>
                        <option>Paypal</option>
                        <option>Cash on Delievery</option>
                    </select>
                    <input class="submit" type="submit" value="Submit" name="confirm_pay">
                </form>
            </div>
        </div>
    </div>
</body>
</html>