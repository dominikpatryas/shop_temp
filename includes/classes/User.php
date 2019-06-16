<?php 

class User {

    private $con = "";
    private $user = "";
    public function __construct($con, $username) {
        $this->con = $con;
        $query_user = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
        $this->user = mysqli_fetch_array($query_user);
    }

    public function getUsername() {
        return  $this->user['username'];
    }

    public function getDateRegistered() {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT date_registered FROM users WHERE username='$username'");
        $row = mysqli_fetch_array($query);
        
        return $row['date_registered'];
    }
    
}

?>