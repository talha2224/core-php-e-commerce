<?php
$connect=mysqli_connect('localhost','root','','mystore');

if (!$connect){
    echo 'failed database connection';
}

?>