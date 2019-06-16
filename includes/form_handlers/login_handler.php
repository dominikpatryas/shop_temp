<?php 
if (isset($_POST['login_button'])) {
    
$password = $_POST['login_password'];
$password = md5($password);

    $email = filter_var($_POST['login_email'], FILTER_SANITIZE_EMAIL);

    $_SESSION['email'] = $email;

    $em_query = mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    $num_rows = mysqli_num_rows($em_query);

    if ($num_rows == 1) {
        $row = mysqli_fetch_array($em_query);
        $username = $row['username'];

        $_SESSION['username'] = $username;
        array_push($error_array, "Zalogowano");

        header("Location: index.php");
        exit();
    }
    else {
        array_push($error_array, "Niepoprawny email lub hasło");
    }
}




?>