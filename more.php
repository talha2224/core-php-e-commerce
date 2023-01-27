<?php
include 'admin/connection.php'

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=A">
    <script src="https://kit.fontawesome.com/88b1c3a02d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="more.css">
    <title>All Products</title>
</head>

<body>
    <div class="main">
        <!-- MAN -->
        <!-- HEADIN PART -->
        <div class="container">
            <div class="product-heading">
                <img src="img/normal/man.png" alt="">
                <h3>For Man</h3>
            </div>
            <div class="iconandtext">
                <i class="fa-solid fa-arrow-left-long" style="color: red;" class='right-arrow'></i>
                <a href="index.php" style="color: black;text-decoration:none" >
                    <p>Go Back</p>
                </a>
            </div>
        </div>

        <!-- PRODUCT SHOW PART -->
        <div class="man-container">
            <?php
            $query = "select * from products where category_id=1";
            $execute = mysqli_query($connect, $query);
            while ($fetch = mysqli_fetch_assoc($execute)) {
                $id = $fetch['id'];
                $product_title = $fetch['product_title'];
                $product_price = $fetch['product_price'];
                $product_img1 = $fetch['product_img1'];
                $discount=$fetch['discount'];
                $quantity=$fetch['quantity']
            ?>
                <div class="single-man">

                    <div class="top-buttons">
                    <?php 
                        if($discount>0){
                            echo "<p class='button1'>$discount% OFF</p>";
                        }
                    ?>
                        <a href='single_product.php?id=<?= $id ?>' style="text-decoration: none;">
                            <p class='button2'>View</p>
                        </a>
                    </div>

                    <div class='img-container'>
                        <img src='admin/product_images/<?= $product_img1 ?>' alt=product-image'>
                    </div>
                    <div class="stockandtitle">
                        <div class='product-single-title'>
                            <p><?= $product_title ?></p>
                        </div>
                        <?php 
                            if($quantity>0){
                                echo "<p class='stock'>In Stock</p>";
                            }
                            else{
                                echo "<p class='stock'>Not Available</p>";
                            }
                        ?>
                    </div>
                    <div class='priceandcart'>
                        <?php 
                            if($discount>0){
                                $price=$product_price/100 * $discount;
                                $final =$product_price-$price;
                                echo 
                                    "
                                        <del style='fontweight:bolder;margin-right:10px;margin-left:10px;'>$product_price</del> 
                                        <ins style='text-decoration:none;font-weight:bolder;font-size:1rem'>$final</ins>
                                    ";
                                    }
                                    else{
                                        echo "<p class='cat-price-latest'> <span>Rs</span>$product_price</p>";
                                    }
                        ?>
                        <?php 
                            if($quantity>0)
                            {
                                echo 
                                    "
                                    <a href='index.php?add_to_cart=$id' class='cart-add-latest'>
                                        <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>
                                    </a>
                                    ";
                            }
                            else{
                                echo 
                                "
                                <a href='more.php' class='cart-add-latest'>
                                    <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>
                                </a>
                                ";
                            }

                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- WOMAN -->
        <!-- HEADIN PART -->
        <div class="container">
            <div class="product-heading">
                <img src="img/normal/woman.png" alt="">
                <h3>For Woman</h3>
            </div>
            <div class="iconandtext">
                <i class="fa-solid fa-arrow-left-long" style="color: red;" class='right-arrow'></i>
                <a href="index.php" style="color: black;text-decoration:none;">
                    <p>Go Back</p>
                </a>
            </div>
        </div>
        <!-- PRODUCT SHOW PART -->
        <div class="man-container">
            <?php
            $query = "select * from products where category_id=2";
            $execute = mysqli_query($connect, $query);
            while ($fetch = mysqli_fetch_assoc($execute)) {
                $id = $fetch['id'];
                $product_title = $fetch['product_title'];
                $product_price = $fetch['product_price'];
                $product_img1 = $fetch['product_img1'];
                $discount=$fetch['discount'];
                $quantity=$fetch['quantity']
            ?>
                <div class="single-man">

                    <div class="top-buttons">
                    <?php 
                        if($discount>0){
                            echo "<p class='button1'>$discount% OFF</p>";
                        }
                    ?>
                        <a href='single_product.php?id=<?= $id ?>' style="text-decoration: none;">
                            <p class='button2'>View</p>
                        </a>
                    </div>

                    <div class='img-container'>
                        <img src='admin/product_images/<?= $product_img1 ?>' alt=product-image'>
                    </div>
                    <div class="stockandtitle">
                        <div class='product-single-title'>
                            <p><?= $product_title ?></p>
                        </div>
                        <?php 
                            if($quantity>0){
                                echo "<p class='stock'>In Stock</p>";
                            }
                            else{
                                echo "<p class='stock'>Not Available</p>";
                            }
                        ?>
                    </div>
                    <div class='priceandcart'>
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
                            if($quantity>0)
                            {
                                echo 
                                    "
                                    <a href='index.php?add_to_cart=$id' class='cart-add-latest'>
                                        <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>
                                    </a>
                                    ";
                            }
                            else{
                                echo 
                                "
                                <a href='more.php' class='cart-add-latest'>
                                    <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>
                                </a>
                                ";
                            }

                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- KIDS -->

        <!-- HEADIN PART -->
        <div class="container">
            <div class="product-heading">
                <img src="img/normal/kid.png" alt="">
                <h3>For Kids</h3>
            </div>
            <div class="iconandtext">
                <i class="fa-solid fa-arrow-left-long" style="color: red;" class='right-arrow'></i>
                <a href="index.php" style="color: black;text-decoration:none;">
                    <p>Go Back</p>
                </a>
            </div>
        </div>
        <!-- PRODUCT SHOW PART -->
        <div class="man-container">
            <?php
            $query = "select * from products where category_id=3";
            $execute = mysqli_query($connect, $query);
            while ($fetch = mysqli_fetch_assoc($execute)) {
                $id = $fetch['id'];
                $product_title = $fetch['product_title'];
                $product_price = $fetch['product_price'];
                $product_img1 = $fetch['product_img1'];
                $discount=$fetch['discount'];
                $quantity=$fetch['quantity']
            ?>
                <div class="single-man">

                    <div class="top-buttons">
                    <?php 
                        if($discount>0){
                            echo "<p class='button1'>$discount% OFF</p>";
                        }
                    ?>
                        <a href='single_product.php?id=<?= $id ?>' style="text-decoration: none;">
                            <p class='button2'>View</p>
                        </a>
                    </div>

                    <div class='img-container'>
                        <img src='admin/product_images/<?= $product_img1 ?>' alt=product-image'>
                    </div>
                    <div class="stockandtitle">
                        <div class='product-single-title'>
                            <p><?= $product_title ?></p>
                        </div>
                        <?php 
                            if($quantity>0){
                                echo "<p class='stock'>In Stock</p>";
                            }
                            else{
                                echo "<p class='stock'>Not Available</p>";
                            }
                        ?>
                    </div>
                    <div class='priceandcart'>
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
                            if($quantity>0)
                            {
                                echo 
                                    "
                                    <a href='index.php?add_to_cart=$id' class='cart-add-latest'>
                                        <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>
                                    </a>
                                    ";
                            }
                            else{
                                echo 
                                "
                                <a href='more.php' class='cart-add-latest'>
                                    <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>
                                </a>
                                ";
                            }

                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- ELECTRONICS -->
        <!-- HEADIN PART -->
        <div class="container">
            <div class="product-heading">
                <img src="img/normal/electronics.png" alt="">
                <h3>ELECTRONICS</h3>
            </div>
            <div class="iconandtext">
                <i class="fa-solid fa-arrow-left-long" style="color: red;" class='right-arrow'></i>
                <a href="index.php" style="color: black;text-decoration:none;">
                    <p>Go Back</p>
                </a>
            </div>
        </div>
        <!-- PRODUCT SHOW PART -->
        <div class="man-container">
            <?php
            $query = "select * from products where category_id=4 limit 3";
            $execute = mysqli_query($connect, $query);
            while ($fetch = mysqli_fetch_assoc($execute)) {
                $id = $fetch['id'];
                $product_title = $fetch['product_title'];
                $product_price = $fetch['product_price'];
                $product_img1 = $fetch['product_img1'];
                $discount=$fetch['discount'];
                $quantity=$fetch['quantity']
            ?>
                <div class="single-man">

                    <div class="top-buttons">
                    <?php 
                        if($discount>0){
                            echo "<p class='button1'>$discount% OFF</p>";
                        }
                    ?>
                        <a href='single_product.php?id=<?= $id ?>' style="text-decoration: none;">
                            <p class='button2'>View</p>
                        </a>
                    </div>

                    <div class='img-container'>
                        <img src='admin/product_images/<?= $product_img1 ?>' alt='product-image'>
                    </div>
                    <div class="stockandtitle">
                        <div class='product-single-title'>
                            <p><?= $product_title ?></p>
                        </div>
                        <?php 
                            if($quantity>0){
                                echo "<p class='stock'>In Stock</p>";
                            }
                            else{
                                echo "<p class='stock'>Not Available</p>";
                            }
                        ?>
                    </div>
                    <div class='priceandcart'>
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
                            if($quantity>0)
                            {
                                echo 
                                    "
                                    <a href='index.php?add_to_cart=$id' class='cart-add-latest'>
                                        <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>
                                    </a>
                                    ";
                            }
                            else{
                                echo 
                                "
                                <a href='more.php' class='cart-add-latest'>
                                    <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>
                                </a>
                                ";
                            }

                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <!-- SHOES -->
        <div class="container">
            <div class="product-heading">
                <img src="img/normal/shoes.png" alt="">
                <h3>Shoes</h3>
            </div>
            <div class="backbutton">
                <div class="iconandtext">
                    <i class="fa-solid fa-arrow-left-long" style="color: red;" class='right-arrow'></i>
                    <a href="index.php" style="color: black;text-decoration:none;">
                        <p>Go Back</p>
                    </a>
                </div>
            </div>
        </div>
        <!-- PRODUCT SHOW PART -->
        <div class="man-container">
            <?php
            $query = "select * from products where category_id=5";
            $execute = mysqli_query($connect, $query);
            while ($fetch = mysqli_fetch_assoc($execute)) {
                $id = $fetch['id'];
                $product_title = $fetch['product_title'];
                $product_price = $fetch['product_price'];
                $product_img1 = $fetch['product_img1'];
                $discount=$fetch['discount'];
                $quantity=$fetch['quantity']
            ?>
                <div class="single-man">

                    <div class="top-buttons">
                        <?php 
                        if($discount>0){
                            echo "<p class='button1'>$discount% OFF</p>";
                        }
                        ?>
                        <a href='single_product.php?id=<?= $id ?>' style="text-decoration: none;">
                            <p class='button2'>View</p>
                        </a>
                    </div>

                    <div class='img-container'>
                        <img src='admin/product_images/<?= $product_img1 ?>' alt=product-image'>
                    </div>
                    <div class="stockandtitle">
                        <div class='product-single-title'>
                            <p><?= $product_title ?></p>
                        </div>
                        <?php 
                            if($quantity>0){
                                echo "<p class='stock'>In Stock</p>";
                            }
                            else{
                                echo "<p class='stock'>Not Available</p>";
                            }
                        ?>
                    </div>
                    <div class='priceandcart'>
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
                            if($quantity>0)
                            {
                                echo 
                                    "
                                    <a href='index.php?add_to_cart=$id' class='cart-add-latest'>
                                        <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>
                                    </a>
                                    ";
                            }
                            else{
                                echo 
                                "
                                <a href='more.php' class='cart-add-latest'>
                                    <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>
                                </a>
                                ";
                            }

                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>