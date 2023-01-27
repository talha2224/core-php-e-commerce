<?php
include 'connection.php';

if (isset($_POST['submit_category'])) {
    $category_title = $_POST['insert_category'];

    // checking if the category already present
    $select_query="SELECT * FROM `categories` WHERE category_title='$category_title'";
    $result_select = mysqli_query($connect, $select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('category already added')</script>";
    }
    else{
        $submit = "INSERT INTO `categories`(`category_title`) VALUES ('$category_title')";
        $push = mysqli_query($connect, $submit);
        if (!$push) {
            echo "<script>alert('category not added')</script>";
        }
    }
}

?>


<form action="" method="POST" class="insert">
    <h1 class="submit-title">Insert Category</h1>
    <input type="text" name="insert_category" placeholder="enter category" class="insert-data" required>
    <input type="submit" value="+" name="submit_category" class="cat-submit">
</form>