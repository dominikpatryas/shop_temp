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

      
   }

   while ($row = mysqli_fetch_array($query)) {
    
    echo "  
    <div class='item'>
        <div class='img-box'>
            <img src=' ".$row['photo_url'] ." '>
        </div>
        <div class='description-box'>
            <p>Lorem ipsum Lorem ipsum Lorem ipsum. Lorem ipsum
                Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum.
            </p>
        </div>
    </div> ";
}
?>
</div>

</div>

</body>

</html>