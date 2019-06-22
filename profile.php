<?php
require 'config/config.php';
include "includes/header.php";
include "includes/handlers/logout-redirect.php";

if (isset($_POST['item_id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM shopping_cart WHERE id='$id' ");
}
$price =0;

?>
<div class="container">
    <div class="profile-content">
        <h2><?php echo 'Witaj ' . $userLoggedIn . '!';?></h2> <br>
        <h3><i class="fa fa-shopping-cart"></i> Koszyk: <?php  ?></h3>
        <ul>
            <?php 
                $query = mysqli_query($con, "SELECT * FROM shopping_cart WHERE username = '$userLoggedIn'");
                while($row = mysqli_fetch_array($query)) {
                    $item_id = $row['item_id'];
                $query_item = mysqli_query($con, "SELECT * FROM items WHERE id = '$item_id'");
                $row_item = mysqli_fetch_array($query_item);

                $row_photo = $row_item['photo_url'];
                    echo  
                    
                "<div class='profile_item'>
                
                     <li class='profile_item_photos'>
                     <form action='profile.php?id=".$row['id']."' method='POST'>
                        <input class='butn cancel_button' type='submit' value='Zrezygnuj'  name='item_id'>
                  </form> 
                        <img src='"
                    . $row_photo . "'><h3>" . $row['item_name'] . "-</h3>" . "<h3> ilość: "
                     . $row['count'] ." (". $row_item['price'] . " zł) </h3>". "</li>  </div> " ;
                     
                $price = $price + $row_item['price'];

                }
            ?>
            <div class="sum-pay">
                <h1>Cena łączna: <?php echo $price; ?> zł</h1>
                <input class="butn" type="submit" name="buy_button" value="Kup">
            </div>

        </ul>
    </div>
   
</div>