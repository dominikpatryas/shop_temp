<?php 
if (isset($_POST['login_button'])) {
    
$password = $_POST['login_password'];
$password = md5($password);

    $email = $_POST['login_email'];

    if ($password != "" && $email != "") {

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $em_query = mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    $num_rows = mysqli_num_rows($em_query);

    if ($num_rows == 1) {
        array_push($error_array, "Zalogowano");
    }
    else {
        array_push($error_array, "Niepoprawny email lub hasło");
    }
}
}




?>