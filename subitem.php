<?php
require 'config/config.php';
include "includes/header.php";
include "includes/handlers/logout-redirect.php";
include "includes/sidebar.php";
?>


<div class='main-content'>

    <?php
if (isset($_GET['id'])) {
    $item_id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM items WHERE id=$item_id");
    $row = mysqli_fetch_array($query);
}
echo "
    ";

?>
    <div class='sub-item'>
        <div class='sub-img-box'>
            <img src='<?php echo $row['photo_url'] ?>'>
        </div>
        <div class='sub-description-box'>
            <div class="sub-description-content">
                <h2><?php echo $row['name'] ?><hr> </h2>
                <span>Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum. <hr>
                </span>
            </div>
            <div class="sub-price-buttons">
                <div class="sub-price">
                     Cena: <?php echo $row['price']; ?>.00 zł
                    
                </div>
                <div class="sub-buttons">
                    <button class='butn buy_button'><i class="fa fa-shopping-cart"></i> Koszyk </butto>
                        <button class='butn buy_button'><i class="fa fa-credit-card"></i> Kup </butto>
                        
                </div>

            </div>
            <hr>

        </div>
    </div>

</div>

</div>

</body>

</html>