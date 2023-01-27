<?php
include './admin/connection.php';
include './function/common_func.php';

// DELTE CODE
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $query = "DELETE FROM `cart` WHERE `product_id`=$id ";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header('location:cart.php');
    } else {
        echo 'failed to delete';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/88b1c3a02d.js" crossorigin="anonymous"></script>
    <title>CART PAGE</title>
    <link rel="stylesheet" href="./css/cart.css">
</head>

<body>
    <div class="heading">
        <a href="index.php">
            <button class="back">Back</button>
        </a>
        <h2>Cart Details</h2>
    </div>
    <div class="container">
        <form action="" method="POST">
            <table>
                <?php
                $ip = getIPAddress();
                $total_price = 0;
                $cart_query = "SELECT * FROM `cart` WHERE `ip_address`='$ip'";
                $result = mysqli_query($connect, $cart_query);
                $number = mysqli_num_rows($result);
                if ($number > 0) {
                    echo "
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        
                        ";
                    while ($row = mysqli_fetch_array($result)) {
                        $id=$row['id'];
                        $product_id = $row['product_id'];
                        $quantity=$row['quantity'];
                        $select_product = "SELECT * FROM `products` WHERE `id`=$product_id";
                        $result_product = mysqli_query($connect, $select_product);
                        while ($row_product = mysqli_fetch_array($result_product)) {
                            $product_price = array($row_product['product_price']);
                            $product_values = array_sum($product_price);
                            $total_price += $product_values;
                            $price = $row_product['product_price'];
                            $title = $row_product['product_title'];
                            $img = $row_product['product_img1'];
                ?>
                            <tr>
                                <td>
                                    <img src='./admin/product_images/<?php echo $img ?>' class='img' />
                                </td>
                                <td>
                                    <?php echo $title ?>
                                </td>
                                <td><?php echo $price ?></td>
                                <?php
                                if (isset($_POST['submit'])) {
                                    // $ip = getIPAddress();
                                    $quantity = $_POST['quantity'];
                                    $update_cart = "UPDATE `cart` SET `quantity`='$quantity' WHERE `id`='$id'";
                                    $run = mysqli_query($connect, $update_cart);
                                    $total_price = $total_price * $quantity;
                                }
                                ?>
                                <td>
                                    <input type='text' name='quantity' class='quantity' value=<?php echo $quantity?> />
                                </td>
                                <td>
                                    <input type='submit' name='submit' value='submit' class='submit-btn' />
                                </td>
                                <td>
                                    <a href='cart.php?delete_id=<?php echo $product_id ?>'>
                                        <i class='fa-solid fa-trash' style='color:black;'></i>
                                    </a>
                                </td>
                            </tr>
                <?php
                        }
                    }
                } 
                else {
                    echo "
                    <h2 
                        style =
                            '  
                            text-align: center;
                            margin-top: 2rem;
                            margin-bottom: 2rem;
                            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                            '
                        >Your cart is empty
                    </h2>";
                }
                ?>
            </table>

            <div class='last'>
                <?php
                $ip = getIPAddress();
                $cart_query = "SELECT * FROM `cart` WHERE `ip_address`='$ip'";
                $result = mysqli_query($connect, $cart_query);
                $number = mysqli_num_rows($result);
                if ($number > 0) {
                    echo "
                            <h2 class='total'>
                                Total: Rs $total_price
                            </h2>
                                <button class='check'><a href='user/checkout.php' style='color:white;'>Check Out</a></button>
                        
                        ";
                }

                ?>
                <form action="" method="POST">
                    <input type="submit" name="home" class='cont' value="continue shopping">
                </form>
                <?php
                if (isset($_POST['home'])) {
                    echo "<script>window.open('index.php','_self')</script>";
                }
                ?>
            </div>
        </form>
    </div>
</body>

</html>