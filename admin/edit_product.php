<?php
include 'connection.php';
if (isset($_GET['single'])) {
    $id = $_GET['single'];
    $selecting="select * from products where id=$id";
    $select_execute=mysqli_query($connect,$selecting);
    $recieve=mysqli_fetch_assoc($select_execute);
        $title=$recieve['product_title'];
        $desc=$recieve['product_desc'];
        $keyword=$recieve['product_keyword'];
        $brand=$recieve['brand'];
        $available_size=$recieve['available_size'];
        $img1=$recieve['product_img1'];
        $product_price=$recieve['product_price'];
        $purchase_price=$recieve['purchase_price'];
        $discount=$recieve['discount'];
        $quantity=$recieve['quantity'];
        
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin/insertproduct.css">
    <title>Insert Product</title>
</head>

<body>
    <div class="addPrroductMain">
        <div class="back">
            <button>
                <a href="index.php">
                    Go Back
                </a>
            </button>
        </div>
        <div class="addProductSub">
            <form action="" method="POST" enctype="multipart/form-data">
                <h2>Add Products</h2>
                <div class="all-input">

                    <div class="first">
                        <!-- title -->
                        <div class="title">
                            <h3>Product Title</h3>
                            <input type="text" name="product_title" id="product_title" value=<?=$title?> placeholder="Enter Product Title" autocomplete="off" required>
                        </div>
                        <!-- description -->
                        <div class="description">
                            <h3>Product Description</h3>
                            <input type="text" value=<?php echo $desc?> name="product_desc" id="product_desc" placeholder="Enter Product Description" autocomplete="off" required>
                        </div>
                    </div>

                </div>

                <div class="third">
                    <!-- Product Age -->
                    <div class="age-group">
                        <h3>Brand</h3>
                        <select name="brand_category" class="pro-cat">
                            <option class="cat">Select a brand</option>
                            <?php
                            $query = "SELECT * FROM `brands`";
                            $result = mysqli_query($connect, $query);
                            while ($data = mysqli_fetch_assoc($result)) {
                                $brand_title = $data['brand_title'];
                                $brand_id = $data['id'];
                                echo "<option value='$brand_id'>$brand_title</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Categories -->
                    <div class="categories">
                        <h3>Category</h3>
                        <select name="product_category" class="pro-cat">
                            <option>Select a Category</option>
                            <?php
                            $query = "SELECT * FROM `categories`";
                            $result = mysqli_query($connect, $query);
                            while ($data = mysqli_fetch_assoc($result)) {
                                $category_title = $data['category_title'];
                                $category_id = $data['id'];
                                echo "<option value='$category_id'>$category_title</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="second">
                    <!-- Product Keyword -->
                    <div class="keyword">
                        <h3>Product Keyword</h3>
                        <input type="text" value="<?=$keyword?>" name="product_keyword" id="product_keyword" placeholder="Enter Product Keyword Seprated By COMMA" autocomplete="off" required>
                    </div>

                    <!-- Product size -->
                    <div class="size">
                        <h3>Product Size</h3>
                        <select name="available_size" class="pro-size">
                            <option class="cat" value="">Select a size </option>
                            <?php
                            $query = "SELECT * FROM `shoes`";
                            $result = mysqli_query($connect, $query);
                            while ($data = mysqli_fetch_assoc($result)) {
                                $shoes_number = $data['shoes_number'];
                                $shoes_id = $data['shoes_id'];
                                echo "<option value='$shoes_id'>$shoes_number</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Product image1 -->
                <div class="fourth">
                    <div class="img1">
                        <h3>Product image1</h3>
                        <input type="file" name="product_img1" id="product_img" placeholder="Enter Product Image" required>
                    </div>

                    <!-- Product image2 -->
                    <div class="img2">
                        <h3>Product image2</h3>
                        <input type="file" name="product_img2" id="product_img" placeholder="Enter Product Image">
                    </div>
                </div>

                <div class="fifth">
                    <!-- Product image3 -->
                    <!-- Product Price -->
                    <div class="price">
                        <h3>Selling Price</h3>
                        <input value="<?=$product_price?>" type="text" name="product_price" id="product_price" placeholder="Enter Product Price" required>
                    </div>

                    <div class="quantity">
                        <h3>Purchase Price</h3>
                        <input value="<?=$purchase_price?>" type="number" name="purchase_price" id="quantity" placeholder="Enter Purchase Price">
                    </div>
                </div>

                <div class="sixth">
                    <!-- Latest Product -->
                    <div class="quantity">
                        <h3>Quantity Product</h3>
                        <input value="<?=$quantity?>"type="number" name="quantity" id="quantity" placeholder="Enter Quantity Of Product">
                    </div>

                    <div class="discount">
                        <h3>Discount %</h3>
                        <input value="<?=$discount?>" type="number" name="discount" id="discount" placeholder="Enter Discount In Percentage">
                    </div>
                </div>


                <!-- Product Submit -->
                <div class="submit">
                    <input type="submit" name="product_submit" id="submit_btn" value="ADD PRODUCT">
                </div>
        </div>
        </form>
    </div>
    </div>
</body>

</html>

<?php
if(isset($_POST['product_submit'])){
    $title=$_POST['product_title'];
    $desc=$_POST['product_desc'];
    $product_keyword=$_POST['product_keyword'];
    $brand=$_POST['brand_category'];
    $available_size=$_POST['available_size'];
    $product_price=$_POST['product_price'];
    $purchase_price=$_POST['purchase_price'];
    $quantity=$_POST['quantity'];
    $discount=$_POST['discount'];
    
    $category_id=$_POST['product_category'];
        // GETTING IMAGES:-
        $product_img1=$_FILES['product_img1']['name'];
        // accessing temp name for image
        $temp_img1=$_FILES['product_img1']['tmp_name'];
        //creating folder for storing image and moving image:-
    
        move_uploaded_file($temp_img1,"./product_images/$product_img1");


       $update= "update `products` set `product_title`= '$title', `product_desc`='$desc',`product_keyword`='$product_keyword',`brand`='$brand',`category_id`='$category_id',`product_img1`='$product_img1',`product_price`='$product_price',`date` = NOW(),`status`='true',`available_size`='$available_size',`quantity`='$quantity',`discount`='$discount',`purchase_price`='$purchase_price' where id=$id";
       $update_execute=mysqli_query($connect,$update);
       if($update_execute){
        echo "<script>alert('update sucessfuly')</script>";
        echo "<script>
        setTimeout(()=>{
            window.open('index.php?view_pro','_self')
        },1000)
        </script>";
       }
}


?>