<?php
$category_id = $_GET['category'];
$select = "select * FROM products where `category_id`=$category_id order by rand() limit 3";
$query = mysqli_query($connect, $select);
while ($fetch = mysqli_fetch_assoc($query)) {
    $id = $fetch['id'];
    $product_title = $fetch['product_title'];
    $product_price = $fetch['product_price'];
    $product_img1 = $fetch['product_img1'];
    $quantityProduct=$fetch['quantity'];
    echo "
            <div class='single-card-container'>
                <div class='upper-button'>
                    <p class='button1'>10% Off</p>
                    <a href='single_product.php?id=$id'>
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
            ";?>
            <?php 
                if($quantityProduct>0){
                    echo 
                    "
                    <div class='stock'>
                        <p>In Stock</p>
                    </div>
                    ";
                }
                else{
                    echo 
                    "
                    <div class='stock'>
                        <p>Not Available</p>
                    </div>
                    ";
                }
            ?>
            </div>
            <?php 
                echo "
                    <div class='priceandcart'>
                        <p class='cat-price-latest'> <span>Rs</span>$product_price</p>
                        ";
            ?>

            <?php
                            if($quantityProduct>0){
                                echo "
                                    <a href='index.php?add_to_cart=$id' class='cart-add-latest'>
                                        <i class='fa fa-shopping-cart' id='add-to-cart-icon-latest'></i>
                                    </a>
                                ";
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
