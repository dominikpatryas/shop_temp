<?php 

include("includes/header.php");

if (isset($_POST['add_item_button'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $photo_url = $_POST['photo_url'];
    $price = $_POST['price'];
    $count = $_POST['count'];
    $date_time_now = date("Y-m-d");
    $query = mysqli_query($con, "INSERT INTO items VALUES 
    ('','$name', '$category', '$price', '$count','$photo_url', '$date_time_now')");

    printf($query);
    if (!$query) {
        printf("Error: %s\n", mysqli_error($con));
    }

}

?>


<div class="main-content">
    <div class="container">
        <div class="add_item_page">
            <h1>Dodaj przedmiot</h1>
            <div class="add_form">
                <form action="" method="POST">
                    <input type="text" name="name" placeholder="Nazwa">
                    <select name="category">
                        <option value="Select">kategoria....</option>
                        <?php 
                            $query = mysqli_query($con, "SELECT DISTINCT category FROM items");
                            while ($row = mysqli_fetch_array($query)) {
                                $category = $row['category'];
                                echo $category;
                                echo "<option value='$category'>$category</option>";
                            }
                        ?>
                    </select>
                    <input type="text" name="price" placeholder="Cena">
                    <input type="text" name="count" placeholder="Ilość">
                    <input type="text" name="photo_url" placeholder="Photo path">
                    <input type="submit" name="add_item_button" value="Dodaj">
                </form>


            </div>
        </div>

    </div>
</div>