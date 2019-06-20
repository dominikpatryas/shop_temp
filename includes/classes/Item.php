<?php


class Item {

    private $item;
    private $con;
    public function __construct($con, $item_id) {
        
        $this->con = $con;

        $query_item = mysqli_query($con, "SELECT * FROM items WHERE id='$item_id'");
        $this->item = mysqli_fetch_array($query_item);
       
        if (!$query_item) {
            printf("Error: %s\n", mysqli_error($this->con));
        }
    }

    public function addShoppingCartItem($userLoggedIn) {
        $id = $this->item['id'];
        $date_time_now = date("Y-m-d H:i:s");
        $query = mysqli_query($this->con, "INSERT INTO shopping_cart VALUES ('','$userLoggedIn','$id','1','$date_time_now')");

        if (!$query) {
            printf("Error: %s\n", mysqli_error($this->con));
        }
    }


   

}

?>