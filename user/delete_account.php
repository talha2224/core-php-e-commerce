<?php
@session_start();
include '../admin/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <link rel="stylesheet" href="../css/del_account.css">
</head>

<body>
    <div class="container3">
        <div class="heading">
            <h3>
                <?php
                if (isset($_SESSION['username'])) {
                    echo "Welcome   " . $_SESSION['username'];
                } else {
                }
                ?>
            </h3>
        </div>
    </div>

    <div class="user-info-container">

        <form method="POST" class="form">

            <div class="edit-heading">
                <h2 class="edit-heading">ARE YOU SURE YOU WANT TO DELETE?</h2>
            </div>
            <div class='form_container'>
                <div class="buttons">
                    <input type='submit' name='submit' class='submit' value='Delete' />
                    <button class='dele'>
                        <a href="../index.php" style="color: white;">Cancel</a>
                    </button>

                </div>
            </div>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $name = $_SESSION['username'];
    $delete = "DELETE FROM `user_info` WHERE `name`='$name' ";
    $del_query = mysqli_query($connect, $delete);
    if ($del_query) {
        session_unset();
        session_destroy();
        echo "<script>alert('Account Deleted Sucessfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
    else{
        echo "<script>alert('Failed To Delete')</script>";
    }
}

?>