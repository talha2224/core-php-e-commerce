<?php include "./admin/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/single_product.css">
    <title>Document</title>
</head>

<body>
    <a href='index.php'>
        <button class="back">Go Back</button>
    </a>
    <h2 class="detail-heading">Product Details</h2>
    <div class='container'>
        <div class='sub-container'>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "Select * from `products` WHERE id=$id";
                $query_execute = mysqli_query($connect, $query);
                while ($data = mysqli_fetch_assoc($query_execute)) {
                    $product_title = $data['product_title'];
                    $product_desc = $data['product_desc'];
                    $product_price = $data['product_price'];
                    $product_img1 = $data['product_img1'];
                        echo "
                            <div class='first'>
                                <img src='./admin/product_images/$product_img1' />
                            </div>
                            <div class='second'>
                                <h3 class='title'>$product_title</h3>
                                <p class='price'>Rs $product_price</p>
                                <h3 class='description_heading'>Description</h3>
                                <p class='description'>$product_desc</p>
                                ";
                                ?>
                                <?php
                                $available_size = $data['available_size'];
                                $selectBrand="select * from shoes where shoes_id='$available_size'";
                                $exe=mysqli_query($connect,$selectBrand);
                                $ount=mysqli_num_rows($exe);
                                // echo "<script>alert('$available_size')</script>";
                                // echo "<script>alert('$ount')</script>";
                                while($fetch=mysqli_fetch_assoc($exe)){

                                    $size=$fetch['shoes_number'];
                                    if($fetch>=0){
                                        echo "
                                        <h3 class='size'>Size Available</h3>
                                        <p class='size-available'>$size</p>
                                        ";
                                    }

                                }
                                echo "
                                
                                <a href='index.php?add_to_cart=$id'>
                                    <button>Add To Cart</button>                            
                                    </div>
                                <a/>
                            
                                
                                ";
                    }
            }
            ?>
        </div>
    </div>

</body>

</html>