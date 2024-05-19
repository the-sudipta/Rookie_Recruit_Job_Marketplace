<?php

require_once __DIR__ . '/../../model/UserRepo.php';


session_start();

$ADMIN_Signup_page =   '../../view/login_signup/Login_Signup_Admin.php';
$ADMIN_Login_page =   '../../view/login_signup/Login_Signup_Admin.php';


$everythingOK = FALSE;
$everythingOKCounter = 0;
$emailError = "";
$passwordError = "";

$email = "";
$password = "";
$_SESSION['emailError'] = "";
$_SESSION['passwordError'] = "";

$_SESSION['cookie_mail'] = "";
$_SESSION['cookie_pass'] = "";

//echo $_SERVER['REQUEST_METHOD'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    echo "Got Req";

//* Email Validation
    $email = $_POST['registerEmail'];
    if (empty($email)) {
        $emailError = "Email is required";
        $_POST['registerEmail'] = "";
        $email = "";
        $everythingOK = FALSE;
        $everythingOKCounter += 1;

        echo "Mail error 1";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
        $_POST['registerEmail'] = "";
        $email = "";
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Mail error 2";
    } else {
        $everythingOK = TRUE;
    }

//* Password Validation
    $password = $_POST['registerPassword'];
    if (empty($password) || strlen($password) < 8) {
        // check if password size in 8 or more and  check if it is empty
        $passwordError = "Write at least 8 Character";
        $_POST['registerPassword'] = "";
        $password = "";
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Pass error 1";
    } else if (!preg_match('/[@#$%]/', $password)) {
        // check if password contains at least one special character
        $passwordError = "Password must contain at least one special character (@, #, $, %).";
        $_POST['registerPassword'] = "";
        $password = "";
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Pass error 2";
    } else {
        $everythingOK = TRUE;
    }

    if ($everythingOK && $everythingOKCounter === 0){

        $inserted_id = createUser($email, $password, "Admin");


        if($inserted_id > 0){
            echo "\n\nAll Clear to Login";
            header("Location: {$ADMIN_Login_page}");
        }else{
            header("Location: {$ADMIN_Signup_page}");
        }

    }else{
        $_SESSION['emailError'] = $emailError;
        $_SESSION['passwordError'] = $passwordError;
        header("Location: {$ADMIN_Signup_page}");
    }



}


