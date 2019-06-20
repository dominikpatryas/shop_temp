<?php
require 'config/config.php';
include "includes/header.php";
include "includes/handlers/logout-redirect.php";

?>

<div class="container">
    <div class="profile-content" >
        <h2><?php echo 'Witaj ' . $userLoggedIn . '!';?></h2> <br>
        <h3><i class="fa fa-shopping-cart"></i> Koszyk:</h3>
        <ul>
            <?php 
                $query = mysqli_query($con, "SELECT * FROM shopping_cart WHERE username = '$userLoggedIn'");
                while($row = mysqli_fetch_array($query)) {
                    $item_id = $row['item_id'];
                $query_item = mysqli_query($con, "SELECT * FROM items WHERE id = '$item_id'");
                $row_item = mysqli_fetch_array($query_item);
                $row_photo = $row_item['photo_url'];
                    echo "<li class='profile_item_photos'> <img src='". $row_photo . "'>" . $row['item_name'] . "-" . " ilość: " . $row['count'] .">". "</li>" ;
                }
            
            
            
            ?>
        </ul>
    </div>
    
</div>




