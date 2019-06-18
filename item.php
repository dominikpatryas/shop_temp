<?php 
require 'config/config.php';
include("includes/header.php");
include("includes/handlers/logout-redirect.php");
include("includes/sidebar.php");
 ?>


<div class='main-content'>

<?php 
   if (isset($_GET['category'])) {
       $category = $_GET['category'];
       $query = mysqli_query($con, "SELECT * FROM items WHERE category='$category'");
       $count = mysqli_num_rows($query);

      

   while ($row = mysqli_fetch_array($query)) {
    echo "  
    <div class='item'>
        <div class='img-box'>
        <a href='subitem.php/item?category=".$row['category']."&id=".$row['id']."'>    <img src=' ".$row['photo_url'] ." '></a>
        </div> <h6>".$row['name']."</h6>
        <div class='description-box'>
       
            <span> ".$row['price'] . '.00 zł' ."
            </span>
        </div>
    </div> ";
}
} 
else {
    echo "<h2>NOWOŚĆI:</h2>";
}
?>

</div>

</div>

</body>

</html>