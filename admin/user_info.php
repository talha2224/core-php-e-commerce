<?php
include 'connection.php';
?>

<div class="container">
    <h2>All Users</h2>
    <div class="cat-table">
        <table>
            <tr>
                <th>Sl Number</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Address</th>
                
            </tr>
            <?php
            $query = "Select * from `user_info`";
            $execute = mysqli_query($connect, $query);
            $serial_no=1;
            while ($result = mysqli_fetch_assoc($execute)) {
                $id = $result['id'];
                $name = $result['name'];
                $address = $result['address'];
                $Email=$result['email'];
            ?>
                <tr>
                    <td><?php  echo " $serial_no"?></td>
                    <td><?php echo "$name"?></td>
                    <td><?php echo $Email?></td>
                    <td><?php echo $address?></td>
                </tr>
            <?php
            $serial_no++;
            }
            ?>
        </table>
    </div>
</div>