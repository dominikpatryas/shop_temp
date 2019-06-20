<?php
require 'config/config.php';
include "includes/header.php";
include "includes/handlers/logout-redirect.php";
include "includes/sidebar.php";
include "includes/classes/Item.php";
?>


<div class='main-content'>

    <?php
if (isset($_GET['id'])) {
    $item_id = $_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM items WHERE id=$item_id");
    $row = mysqli_fetch_array($query);
}
if (isset($_POST['shopping_cart_button'])) {
    $item = new Item($con, $row['id']);
    $item->addShoppingCartItem($userLoggedIn);
}

?>


    <div class='sub-item'>
        <div class='sub-img-box'>
            <img src='<?php echo $row['photo_url'] ?>'>
        </div>
        <div class='sub-description-box'>
            <div class="sub-description-content">
                <h2><?php echo $row['name'] ?>
                    <hr>
                </h2>
                <span>Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum.
                    <hr>
                </span>
            </div>
            <div class="sub-price-buttons">
                <div class="sub-price">
                    Cena: <?php echo $row['price']; ?>.00 zł

                </div>
                <div class="sub-buttons">
                    <form action="subitem.php?category=<?php echo $row['category']."&id=". $row['id']; ?>"
                        method="POST">
                        <input type="submit" name='shopping_cart_button' class='butn buy_button' value="Koszyk">
                    </form>

                    <input type="submit" name='buy_button' class='butn buy_button' value="Kup">
                </div>

            </div>
            <hr>

        </div>
    </div>

</div>

</div>

</body>

</html>