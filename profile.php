<?php
require 'config/config.php';
include "includes/header.php";
include "includes/handlers/logout-redirect.php";

if (isset($_POST['item_id'])) {
    $item_id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM shopping_cart WHERE item_id='$item_id' ");
}


?>
<div class="container">
    <div class="profile-content">
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
                    echo 
                "<div class='profile_item'>
                
                     <li class='profile_item_photos'>
                     <form action='profile.php?id=".$item_id."' method='POST'>
                        <input type='submit' value='Usuń'  name='item_id'>
                  </form>
                        <img src='"
                    . $row_photo . "'><h2>" . $row['item_name'] . "-</h2>" . "<h3> ilość: "
                     . $row['count'] ."</h3>". "</li>  </div> " ;
                     
                }
            
            
            
            ?>
        </ul>
    </div>
   
</div>