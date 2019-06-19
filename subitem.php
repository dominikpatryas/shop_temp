<?php 
require 'config/config.php';
include("includes/header.php");
include("includes/handlers/logout-redirect.php");
include("includes/sidebar.php");
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
       <img src='<?php echo $row['photo_url']  ?>' >
        </div> 
        <div class='sub-description-box'>
            <span> Cena: <br> <?php echo $row['price']   ?> .00 zł
            </span>
            <button class='butn buy_button'> Kup </butto>
        </div>
    </div> 

</div>

</div>

</body>

</html>