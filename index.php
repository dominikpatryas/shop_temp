<?php 
require 'config/config.php';
include("includes/header.php");
include("includes/handlers/logout-redirect.php");
 ?>


<div class='main-content'>



<div class="search">

<h4>Wyszukaj produkty: </h4>
<form action="" >
    <input type="text" name="fraza">
    <input type="submit">
</form>

</div>
<div class="results">
<?php 
if (isset($_GET['fraza'])) {
    $fraza = $_GET['fraza'];
    $query = mysqli_query($con, "SELECT * FROM items where name like '%$fraza%'");

    while ($row = mysqli_fetch_array($query)) {
        echo "<div class='item'>
        <div class='img-box'>
        <a href='subitem.php?category=".$row['category']."&id=".$row['id']."'>    <img src=' ".$row['photo_url'] ." '></a>
        </div> <h6>".$row['name']."</h6>
        <div class='description-box'>
       
            <span> ".$row['price'] . '.00 zł' ."
            </span>
        </div>
    </div> ";
    }
}
?>

</div>

</div>

</div>

</body>

</html>