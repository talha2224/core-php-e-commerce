<?php
include 'connection.php';
?>

<div class="container">
    <h2>All Categories</h2>
    <div class="cat-table">
        <table>
            <tr>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $query = "Select * from `categories`";
            $execute = mysqli_query($connect, $query);
            while ($result = mysqli_fetch_assoc($execute)) {
                $category_title = $result['category_title'];
                $id = $result['id'];
                echo "
                <tr>
                    <td>$category_title</td>
                    <td>
                            <i class='fa-regular fa-pen-to-square'></i>
                    </td>
                    <td>
                    <a href='deletecat.php?id=$id' style='color:black;'>
                        <i class='fa-solid fa-trash'></i>
                    </a>
                    </td>
                </tr>
                
                ";
            }
            ?>
        </table>
        <form action="" method="POST" class="insert">
            <h1 class="submit-title">Update Category</h1>
            <input type="text" name="oldname" id="old" placeholder="enter old category name" style="display: block;">
            <input type="text" id="new" name="new" placeholder="enter new category name">
            <input type="submit" style="display: block;" class="newbtn" value="Update" name="Update">
        </form>
    </div>
</div>
<?php
if(isset($_POST['Update'])){
    $oldname=$_POST['oldname'];
    $new=$_POST['new'];
    $update="UPDATE `categories` SET `category_title`='$new' WHERE `category_title`='$oldname' ";
    $update_execute=mysqli_query($connect,$update);
    if($count<0){
        echo "<script>alert('Please Enter Correct Old Name Of Category ')</script>";
    }
    else{
        echo "<script>alert('Category Updated ')</script>";
    }
}



?>