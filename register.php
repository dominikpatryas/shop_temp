<?php 

include ("includes/header.php");

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
// require 'includes/form_handlers/login_handler';

?>


<div class="container">
    <div class="form_register">
        <form action="register.php" method="POST">
            <input type="text" name="register_firstname" placeholder="Imię" value="<?php if(isset($_SESSION['register_firstname'])) echo $firstname; ?>" required>
            <?php if(in_array("Za długie lub za krótkie imię", $error_array)) echo "Za długie lub za krótkie imię"; ?>


            <input type="text" name="register_lastname" placeholder="Nazwisko" value="<?php if(isset($_SESSION['register_lastname'])) echo $lastname; ?>" required>
            <?php if(in_array("Za długie lub za krótkie nazwisko", $error_array)) echo "Za długie lub za krótkie nazwisko"; ?>


            <input type="text" name="register_email" placeholder="Email"  required>
            <?php if(in_array("Email już jest w użyciu", $error_array)) echo "Email już jest w użyciu"; 
            else  if(in_array("Niepoprawny format email", $error_array)) echo "Niepoprawny format email"; 
            else if(in_array("Emaile różnią się od siebie", $error_array)) echo "Emaile różnią się od siebie"; ?>
            
            <input type="text" name="register_email2" placeholder="Potwierdź email" required>


            <input type="text" name="register_password" placeholder="Hasło" required>
            <?php if(in_array("Hasło może mieć litery bez ogonków i cyfry", $error_array)) echo "Hasło może mieć litery bez ogonków i cyfry";
           else if(in_array("Twoje hasło musi mieć mieć w przedziale od 5 do 30 znaków", $error_array)) echo "Twoje hasło musi mieć mieć w przedziale od 5 do 30 znaków";
            else if(in_array("Hasła różnią się od siebie", $error_array)) echo "Hasła różnią się od siebie"; ?>

            <input type="text" name="register_password2" placeholder="Potwierdź hasło" required>


            <input type="submit" name="register_button">
            <?php if(in_array("<h4 style='color: #14C800'>Rejestracja pomyślna</h4>",$error_array)) echo "<h4 style='color: #14C800'>Rejestracja pomyślna</h4>"; ?>
        </form>
        
    </div>
</div>




</body>
</html>