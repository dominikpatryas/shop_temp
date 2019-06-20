<?php
require 'config/config.php';
include "includes/header.php";
include "includes/handlers/logout-redirect.php";

?>

<div class="container">
    <div class="profile-content" >
        <h2><?php echo 'Witaj ' . $userLoggedIn . '!';?></h2> <br>
        <h3><i class="fa fa-shopping-cart"></i> Koszyk:</h3>
    </div>
    
</div>




