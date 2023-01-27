<?php
@session_start();
include '../admin/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/diplayorder.css">
    <title>ALL ORDERS</title>
</head>

<body>
    <div class="detail-order">
        <div class="detail-order-heading">
            <h2>ALL YOUR ORDERS</h2>
        </div>
        <div class="detail-order-table">
            <table>
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Total Amount</th>
                        <th>Total Products</th>
                        <th>Payment Confirm</th>
                        <th>Payment Method</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $username = $_SESSION['username'];
                    $user_id = "SELECT * FROM `user_info` WHERE `name`='$username'";
                    $get_user = mysqli_query($connect, $user_id);
                    $fetch_id = mysqli_fetch_assoc($get_user);
                    $id = $fetch_id['id'];
                    $getting_order = "SELECT * FROM `all_orders`WHERE `user_id`=$id";
                    $getting__order_query = mysqli_query($connect, $getting_order);
                    $number = 1;

                    while ($finally = mysqli_fetch_assoc($getting__order_query)) {
                        $order_id = $finally['order_id'];
                        $total_amount = $finally['total_amount'];
                        $total_products= $finally['product_quantity'];
                        $Payment_confirm= $finally['payment_confirm'];
                        $payment_method = $finally['payment_method'];
                        $date=$finally['date'];
                        if ($payment_method == 'Not Selected') {
                            $Payment_confirm = 'Not Confirmed';
                        } else {
                            $Payment_confirm = 'confirmed';
                        }
                        echo
                        "
                            <tr>
                                <td>$number</td>
                                <td>RS $total_amount</td>
                                <td>$total_products</td>
                                <td>$Payment_confirm</td>
                                    <td>
                                        <a href='confirm_payment.php?order_id=$order_id' style='cursor:pointer;color:black;'>$payment_method </a>
                                    </td>
    
                                <td>$date</td>";
                                $number++;
                            }
                    ?>

                
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>