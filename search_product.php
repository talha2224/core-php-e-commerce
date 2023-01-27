<?php
include './function/common_func.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/search.css">
    <script src="https://kit.fontawesome.com/88b1c3a02d.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <main class="main-container">
        <div class="back">
            <?php
            if(isset($_GET['search_data_product'])){
                $search_data=$_GET['search_data'];
                echo "<h2 class='products'>SEARCH RESULTS FOR ".strtoupper($search_data)."</h2>";
            }
            ?>
            <button>
                <a href="index.php">
                    Go Back
                </a>
            </button>
        </div>
        <div class="display-container">
            <?php
            if (isset($_GET['search_data_product'])) {
                $search_data = $_GET['search_data'];
                $select = "SELECT * FROM `products` where product_keyword like '%$search_data%'";
                $query = mysqli_query($connect, $select);
                $num=mysqli_num_rows($query);
                if($num==0){
                    echo '<h2 style="margin-top: 5rem;">Sorry No Products Founds 😥</h2>';
                }
                else{
                    while ($result = mysqli_fetch_assoc($query)) {
                        $id=$result['id'];
                        $title = $result['product_title'];
                        $productimage1 = $result['product_img1'];
                        $price = $result['product_price'];
                        echo
                        " 
                            <div class='single-card'>
                                <div class='top-container'>
                                    <p class='discount'>10% Off</p>
                                    <a href='single_product.php?id=$id' style='text-decoration:none;'>
                                        <p class='show-more'>View</p>
                                    <a/>
                                </div>
                                <div class='product-image'>
                                    <img src='./admin/product_images/$productimage1' alt='image'>
                                </div>
                                <p class='cat-name'>$title </p>
                                <div class='add_price'>
                                    <p class='cat-price'> <span>Rs</span>$price</p>
                                    <a href='index.php?add_to_cart=$id'>
                                        <i class='fa fa-shopping-cart' id='add-to-cart-icon'></i>
                                    <a/>
                                </div>
                            </div>           
                        ";
                    }
                }
            }
            ?>
        </div>
    </main>
</body>

</html>