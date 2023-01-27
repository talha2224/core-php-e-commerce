<?php
include 'connection.php';
?>
<div class="container">
    <h2>All Products</h2>


    <div class="prduct-table" style="overflow-x:auto;">

        <table class="table">
            <tr class="tablerow">
                <th class='table_heading'>Image</th>
                <th class='table_heading'>Title</th>
                <th class='table_heading'>Description</th>
                <th class='table_heading'>KeyWords</th>
                <th class='table_heading'>Selling Price</th>
                <th class='table_heading'>Purchasing Price</th>
                <th class='table_heading'>Discounted Price</th>
                <th class='table_heading'>Discount</th>
                <th class='table_heading'>Profit</th>
                <th class='table_heading'>Edit</th>
                <th class='table_heading'>Delete</th>
            </tr>
            <?php
            $query = "Select * from `products`";
            $execute = mysqli_query($connect, $query);
            while ($result = mysqli_fetch_assoc($execute)) {
                $id = $result['id'];
                $product_title = $result['product_title'];
                $product_desc = $result['product_desc'];
                $product_keyword = $result['product_keyword'];
                $brand = $result['brand'];
                $available_size = $result['available_size'];
                $quantity=$result['quantity'];
                $product_img1 = $result['product_img1'];
                $selling_price = $result['product_price'];
                $purchase_price	=$result['purchase_price'];
                $discount=$result['discount'];
            ?>
                <tr class="tablerow">
                    <td  class='tabledata'>
                        <img src='./product_images/<?php echo "$product_img1" ?>' class='img' />
                    </td>
                    <td class='tabledata'><?php echo " $product_title"?></td>
                    <td class='tabledata'><?php echo "$product_desc"?></td>
                    <td class='tabledata'><?php echo "$product_keyword"?></td>
                    <td class='tabledata'><?php echo "$selling_price"?></td>
                    <td class='tabledata'><?php echo "$purchase_price"?></td>
                    <td>
                        <?php
                        if($discount>0){
                            $result= $selling_price/100 * $discount ;
                            echo $selling_price-$result;
                        }
                        else{
                            echo "no discount";
                        }
                        ?>
                    </td>

                    <td class='tabledata'>
                        <?php
                        if($discount>0){
                            echo "$discount%";
                        }
                        else{
                            echo "no discount";
                        }
                        ?>
                    <td class='tabledata'>
                        <?php 
                        if($discount>0){
                            $result= $selling_price/100 * $discount ;
                            $discounted_price= $selling_price-$result;
                            echo $discounted_price-$purchase_price;
                        }
                        else{
                            echo $selling_price-$purchase_price ;
                        }
                        ?>
                    </td>
                    <td class='tabledata'>
                        <a href='edit_product.php?single=<?php echo "$id" ?>'>
                            <i class='fa-regular fa-pen-to-square' style='color:black;'></i>
                        </a>
                    </td>
                    <td class='tabledata'>
                        <a href='delete_product.php?delete_id=<?=$id?>'>
                            <i class='fa-solid fa-trash' style='color:black;'></i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
<!-- updateproduct.php?id=$id -->