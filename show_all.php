<?php

include 'admin/connection.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/88b1c3a02d.js" crossorigin="anonymous"></script>
    <title></title>
    <link rel="stylesheet" href="latest.css">
</head>

<body>
    <div class="latest_product_1">
        <!-- TITLES -->
        <div class="text1">
            <img src="img/normal/light.png" alt="new_arrivals_logo">
            <h2>Flash Deals</h2>
        </div>
        <div class="text2">
            <div class="iconandtext">
                <a href="more.php" class='hatt'>
                    <p>See More</p>
                </a>
                <i class="fa-solid fa-arrow-right" style="color: red;" class='right-arrow'></i>
            </div>
        </div>
    </div>
    <!-- CATEGORY -->
    <div class="category-section">
        <div class="sub-category-section">
            <p class="all">
                <a href="index.php" style="text-decoration: none;">All</a>
            </p>
            <?php
            $select = "select * FROM categories";
            $query = mysqli_query($connect, $select);
            while ($data = mysqli_fetch_assoc($query)) {
                $cat_title = $data['category_title'];
                $cat_id = $data['id'];
                echo "
                        <div class='electronics-category'>
                                <p>
                                    <a href='index.php?category=$cat_id' style='text-decoration:none'>$cat_title</a>
                                </p>
                        </div>
                    ";
            }
            ?>
        </div>
    </div>

    <!-- SHOW ALL PRODUCTS -->
    <div class="latest_container" id='cardsection'>
        <div class="latest_product">
            <div class="latest-product-2">
                <?php
                if (!isset($_GET['category'])) {
                    $query = "select * from products order by rand() limit 3";
                    $execute_query = mysqli_query($connect, $query);
                    $count = mysqli_num_rows($execute_query);
                    if ($count > 0) {
                        while ($fetch = mysqli_fetch_assoc($execute_query)) {
                            $id = $fetch['id'];
                            $product_title = $fetch['product_title'];
                            $product_price = $fetch['product_price'];
                            $product_img1 = $fetch['product_img1'];
                            $discount = $fetch['discount'];
                            $quantityProduct = $fetch['quantity'];
                            echo "
                                <div class='single-card-container'>
                                    <div class='upper-button'>
                                "; ?>
                            <?php
                            if ($discount > 0) {
                                echo "<p class='button1'>$discount% Off</p>";
                            }
                            ?>
                            <?php
                            echo "
                                        <a href='single_product.php?id=$id' style='text-decoration:none;'>
                                            <p class='button2'>View</p>
                                        </a>
                                    </div>
                                    <div class='img-container-latest'>
                                        <img src='admin/product_images/$product_img1' alt=product-image'>
                                    </div>
                                    <div class='stockandtitle'>
                                    <div class='product-single-title'>
                                        <p>$product_title</p>
                                    </div>
                                ";
                            ?>
                            <?php
                                    if ($quantityProduct > 0) {
                                        echo"
                                            <div class='stock'>
                                                <p>In Stock</p>
                                            </div>
                                        ";
                                    } 
                                    else{
                                            echo"
                                                <div class='stock'>
                                                    <p>Not Available</p>
                                                </div>";
                                        }
                            ?>
                                </div>
                            <?php
                                echo "
                                        <div class='priceandcart'>
                                    ";?>
                                    <?php
                                        if($discount>0){
                                            $price=$product_price/100 * $discount;
                                            $final =$product_price-$price;
                                            echo "
                                                <del style='fontweight:bolder;margin-right:10px;margin-left:10px;'>$product_price</del> 
                                                <ins style='text-decoration:none;font-weight:bolder;font-size:1rem'>$final</ins>
                                            ";
                                            }
                                            else{
                                                echo "<p class='cat-price-latest'> <span>Rs</span>$product_price</p>";
                                            }
                                                                
                                     ?>
                            
                                    <?php
                                    if($quantityProduct>0){
                                        echo "
                                            <a href='index.php?add_to_cart=$id' class='cart-add-latest'>
                                                <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>      
                                            </a>";      
                                    }
                                    else{
                                        echo 
                                            "
                                            <a href='index.php' class='cart-add-latest'>
                                                <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>      
                                            </a>  
                                            ";
                                    }
                                    ?>
                                    <?php 
                                    echo "
                                    </div>
                                </div>
                            ";
                        }
                    }
                };

?>

<?php
if (isset($_GET['category'])) {
    include 'category.php';
}
?>
        </div>
    </div>

    </div>
</body>

</html>