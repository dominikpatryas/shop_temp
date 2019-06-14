<?php

//Variables

$firstname = "";
$lastname = "";
$email = "";
$email2 = "";
$password = "";
$password2 = "";
$date ="";
$error_array = array();
if (isset($_POST['register_button'])) {

    $firstname = strip_tags($_POST['register_firstname']);
    $firstname = str_replace(' ', '',$firstname);
    $firstname = ucfirst(strtolower($firstname)); 
    $_SESSION['register_firstname'] = $firstname;

    $lastname = strip_tags($_POST['register_lastname']);
    $lastname = str_replace(' ', '',$lastname);
    $lastname = ucfirst(strtolower($lastname)); 
    $_SESSION['register_lastname'] = $lastname;

    $password = strip_tags($_POST['register_password']);
    $password2 = strip_tags($_POST['register_password2']);
    $_SESSION['register_password'] = $password;

    $email = strip_tags($_POST['register_email']);
    $email = str_replace(' ', '', $email);
    $email = ucfirst(strtolower($email));
    $_SESSION['register_email'] = $email; 


    $email2 = strip_tags($_POST['register_email2']);
    $email2 = str_replace(' ', '', $email2);
    $email2 = ucfirst(strtolower($email2));
    $_SESSION['register_email2'] = $email2; 

    $date = date("Y-m-d");

    if ($email == $email2) {

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            $em_query = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
            if (mysqli_num_rows($em_query) > 0) {
                array_push($error_array, "Email już jest w użyciu");
            }
        }
        else {
            array_push($error_array, "Niepoprawny format email");
        }
}
else {
    array_push($error_array, "Emaile różnią się od siebie");
}

if(strlen($firstname) > 30 || strlen($firstname) < 4) {
    array_push($error_array,"Za długie lub za krótkie imię");
}

if(strlen($lastname) > 30 || strlen($lastname) < 4) {
    array_push($error_array,"Za długie lub za krótkie nazwisko");
}

if($password != $password2) {
    array_push($error_array,"Hasła różnią się od siebie");
} else {
    if(preg_match('/[^A-Za-z0-9]/', $password)) {
        array_push($error_array,"Hasło może mieć litery bez ogonków i cyfry");
    }
}

if (strlen($password > 30 || strlen($password) < 5)) {
    array_push($error_array,"Twoje hasło musi mieć mieć w przedziale od 5 do 30 znaków");
}

if (empty($error_array)) {
    $password = md5($password);
    $username = strtolower($firstname . "_" . $lastname);

    $check_username = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $i=0;
    while (mysqli_num_rows($check_username) != 0) {
        $i++;
        $username = $username . "_" . i;
        $check_username = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    }

    $insert_query = mysqli_query($con, "INSERT INTO users VALUES ('', '$username', '$password', '$date', '$email', '$firstname', '$lastname')");


    $_SESSION['register_firstname'] = "";
    $_SESSION['register_lastname'] = "";
    $_SESSION['register_email'] = "";
    $_SESSION['register_email2'] = "";

    array_push($error_array, "<h4 style='color: #14C800'>Rejestracja pomyślna</h4>");
}
}

?>

