<?php 

include ("includes/header.php");

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>
 
<div class="container">
    <div class="form_register">
        <h2>REJESTRACJA</h2>
        <form action="register.php" method="POST">
            <input type="text" name="register_firstname" placeholder="Imię" value="<?php if(isset($_SESSION['register_firstname'])) echo $firstname; ?>" required>
            <?php if(in_array("Za długie lub za krótkie imię", $error_array)) echo "Za długie lub za krótkie imię<br>"; ?>


            <input type="text" name="register_lastname" placeholder="Nazwisko" value="<?php if(isset($_SESSION['register_lastname'])) echo $lastname; ?>" required>
            <?php if(in_array("Za długie lub za krótkie nazwisko", $error_array)) echo "Za długie lub za krótkie nazwisko<br>"; ?>


            <input type="text" name="register_email" placeholder="Email"  required>
            <?php if(in_array("Email już jest w użyciu", $error_array)) echo "Email już jest w użyciu<br>"; 
            else  if(in_array("Niepoprawny format email", $error_array)) echo "Niepoprawny format email<br>"; 
            else if(in_array("Emaile różnią się od siebie", $error_array)) echo "Emaile różnią się od siebie<br>"; ?>
            
            <input type="text" name="register_email2" placeholder="Potwierdź email" required>


            <input type="password" name="register_password" placeholder="Hasło" required>
            <?php if(in_array("Hasło może mieć litery bez ogonków i cyfry", $error_array)) echo "Hasło może mieć litery bez ogonków i cyfry";
           else if(in_array("Twoje hasło musi mieć mieć w przedziale od 5 do 30 znaków", $error_array)) echo "Twoje hasło musi mieć mieć w przedziale od 5 do 30 znaków<br>";
            else if(in_array("Hasła różnią się od siebie", $error_array)) echo "Hasła różnią się od siebie<br>"; ?>

            <input type="password" name="register_password2" placeholder="Potwierdź hasło" required>

            <a href="#" id="signin" class="signin">Masz już konto? Zaloguj się</a>
            <button class="butn login_register_button" name="register_button">Zarejestruj się</button>
            <?php if(in_array("<h4 style='color: #14C800'>Rejestracja pomyślna</h4>",$error_array)) echo "<h4 style='color: #14C800'>Rejestracja pomyślna</h4>"; ?>
        </form>
        
    </div>
    <div class="form_login">
    <h2>Logowanie</h2>

        <form action="register.php" method="POST">
            <input type="text" name="login_email" placeholder="Email" required>

            <input type="password" name="login_password" placeholder="Hasło" required>
            <a href="#" id="signup" class="signup">Nie masz konta? Zarejestruj się</a>
           
           <button class="butn login_register_button" name="login_button">Zaloguj się</button>
           <?php if (in_array("Zalogowano",$error_array)) echo "<br><h4 style='color: #14C800'>Zalogowano</h4>";  ?>
            <?php if (in_array("Niepoprawny email lub hasło",$error_array)) echo "<br>Niepoprawny email lub hasło";  ?>
        </form>    
    </div>
</div>



</body>
</html>