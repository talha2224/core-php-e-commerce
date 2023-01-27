<?php
include 'connection.php';
if (isset($_POST['submit_brand'])) {
    $brand_title= $_POST['insert_brand'];
    // checking if brand already present
    $select_query2 = "SELECT * FROM `brands` WHERE `brand_title`='$brand_title'";
    $result_select2 = mysqli_query($connect, $select_query2);
    $number2 = mysqli_num_rows($result_select2);
    if ($number2>0) {
        echo "<script>alert('brand already present')</script>";
    } 
    else {
        $submit = "INSERT INTO `brands`(`brand_title`) VALUES ('$brand_title')";
        $push = mysqli_query($connect, $submit);
        if (!$push) {
            echo "<script>alert('brand not added')</script>";
        }
    }
}

?>


<form action="" method="POST" class="insert">
    <h1 class="submit-title">Insert Brand</h1>
    <input type="text" name="insert_brand" placeholder="enter brand" class="insert-data" required>
    <button  name="submit_brand" class="cat-submit">+</button>
</form>