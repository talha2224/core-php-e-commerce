<?php
include 'connection.php';
?>

<div class="container">
    <h2>All Payments</h2>
    <div class="cat-table">
        <table>
            <tr>
                <th>Sl number</th>
                <th>Order Id</th>
                <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Date</th>
            </tr>
            <?php
            $query = "Select * from `user_payments`";
            $execute = mysqli_query($connect, $query);
            $serial_no=1;
            while ($result = mysqli_fetch_assoc($execute)) {
                $id = $result['order_id'];
                $order_id = $result['order_id'];
                $invoice_number = $result['invoice_number'];
                $amount = $result['amount'];
                $payment_mode = $result['payment_mode'];
                $date = $result['date'];
            ?>
                <tr>
                    <td><?php  echo " $serial_no"?></td>
                    <td><?php  echo " $order_id"?></td>
                    <td><?php echo "$invoice_number"?></td>
                    <td><?php echo $amount?></td>
                    <td><?php echo "$payment_mode"?></td>
                    <td><?php echo $date?></td>
                </tr>
            <?php
            $serial_no++;
            }
            ?>
        </table>
    </div>
</div>