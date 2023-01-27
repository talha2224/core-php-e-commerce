<?php
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/88b1c3a02d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="order_detail.css">
    <title>Order Details</title>
</head>
<body>
    <div class="container">
        <h2 class="heading">Order Deatils</h2>
        <button class="btn">
            <a href="index.php?orders_list">Go Back</a>
        </button>
        <div class="display-details">
        <table>
            <tr>
                <th>Sl number</th>
                <th>Name</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Quantity</th>
                <th>Total Amount</th>
                <th>Order Data</th>
                <th>Delete</th>

            </tr>
            <?php
            if(isset($_GET['id'])){
                $product_id=$_GET['id'];
            $query = "select * from all_orders as order_items inner join user_info as info  on (order_items.user_id=info.id) where product_id='$product_id'"; 
            $execute = mysqli_query($connect, $query);
            $serial_no=1;
            while ($result = mysqli_fetch_assoc($execute)) {
                $id = $result['order_id'];
                $quantity = $result['product_quantity'];
                $total_amount = $result['total_amount'];
                $order_date = $result['date'];
                $name=$result['name'];            
                $product_query="select * from products where id='$product_id'";
                $product_query_execution=mysqli_query($connect,$product_query);
                while($fetch=mysqli_fetch_assoc($product_query_execution)) { 
                    $product_title=$fetch['product_title'];
                    $img=$fetch['product_img1'];
                ?>
                <tr>
                    <td><?php  echo "$serial_no"?></td>
                    <td><?php  echo "$name"?></td>
                    <td><?php echo "$product_title"?></td>
                    <td><?php echo "<img src='product_images/$img' style='height:3rem;'/>"?></td>
                    <td><?php echo "$quantity "?></td>
                    <td><?php echo "$total_amount"?></td>
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
               }
            }
            ?>
        </table>
        </div>
    </div>
</body>
</html>


