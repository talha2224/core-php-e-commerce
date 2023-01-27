<?php
include 'connection.php';
?>

<div class="container">
    <h2>All Orders</h2>
    <div class="cat-table">
        <table>
            <tr>
                <th>Sl number</th>
                <th>Name</th>
                <th>Product Quantity</th>
                <th>Total Amount</th>
                <th>Payment Confirmation</th>
                <th>Payment Method</th>
                <th>Details</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
            <?php
            $query = "select * from all_orders as order_items inner join user_info as info  on (order_items.user_id=info.id)"; 
            $execute = mysqli_query($connect, $query);
            $serial_no=1;
            while ($result = mysqli_fetch_assoc($execute)) {
                $id = $result['order_id'];
                $product_id=$result['product_id'];
                $quantity = $result['product_quantity'];
                $total_amount = $result['total_amount'];
                $payment_confirm = $result['payment_confirm'];
                $payment_method = $result['payment_method'];
                $order_date = $result['date'];
                $name=$result['name'];
            ?>
                <tr>
                    <td><?php  echo "$serial_no"?></td>
                    <td><?php  echo "$name"?></td>
                    <td><?php echo "$quantity"?></td>
                    <td><?php echo "$total_amount "?></td>
                    <td><?php echo "$payment_confirm"?></td>
                    <td><?php echo "$payment_method"?></td>
                    <td>
                        <?php 
                            echo 
                                "
                                    <a href='order_details.php?id=$product_id'>See Details</a>
                                "
                        ?>
                    </td>
                    <td><?php echo  "$order_date"?></td>
                    <td>
                        <a href='del_order.php?id=<?php echo $id?>'>
                            <i class='fa-solid fa-trash' style='color:black;'></i>
                        </a>
                    </td>
                </tr>
            <?php
            $serial_no++;
            }
            ?>
        </table>
    </div>
</div>