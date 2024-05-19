<?php

session_start();
// Update Case Here

require_once '../../model/UserRepo.php';

$Admin_profile_page = "/Rookie_Recruit_Job_Marketplace/view/admin/Admin_Profile.php";

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

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "Got Req\n";

//* Email Validation
    $email = $_POST['email'];
    echo "Mail = ".$email.'\n';
//    if (empty($email)) {
//        $emailError = "Email is required";
//        $_POST['email'] = "";
//        $email = "";
//        $everythingOK = FALSE;
//        $everythingOKCounter += 1;
//
//        echo "Mail error 1";
//    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        $emailError = "Invalid email format";
//        $_POST['email'] = "";
//        $email = "";
//        $everythingOK = FALSE;
//        $everythingOKCounter += 1;
//        echo "Mail error 2";
//    } else {
//        $everythingOK = TRUE;
//    }

//* Password Validation
    $newPassword = $_POST['newPassword'];
    echo "pass = ".$newPassword.'\n';
//    if (empty($password) || strlen($password) < 8) {
//        // check if password size in 8 or more and  check if it is empty
//        $passwordError = "Write at least 8 Character";
//        $_POST['newPassword'] = "";
//        $password = "";
//        $everythingOK = FALSE;
//        $everythingOKCounter += 1;
//        echo "Pass error 1";
//    } else if (!preg_match('/[@#$%]/', $password)) {
//        // check if password contains at least one special character
//        $passwordError = "Password must contain at least one special character (@, #, $, %).";
//        $_POST['newPassword'] = "";
//        $password = "";
//        $everythingOK = FALSE;
//        $everythingOKCounter += 1;
//        echo "Pass error 2";
//    } else {
//        $everythingOK = TRUE;
//    }


    $type = $_POST["type"];
    echo "Type = ".$type.'\n';
    $confirmPassword = $_POST['confirmPassword'];
    $everythingOK = TRUE;
    if($everythingOK && $everythingOKCounter === 0){
        $data = findUserByUserID($_SESSION["user_id"]);
        if($data["email"] !== $email && $email !== ""){
            echo "Mail changed \n";
            $data["email"] = $email;
            $_SESSION["data"]["email"] = $email;
        }

        if($data["type"] !== $type && $type !== ""){
            $data["type"] = $type;
            $_SESSION["data"]["type"] = $type;
        }

        if($data["password"] !== $newPassword && $_POST['newPassword'] !== "" && $_POST['newPassword'] !== null){
            $data["password"] = $newPassword;
            $_SESSION["data"]["password"] = $newPassword;
        }

        updateUser($data,$data["id"]);
        echo "user updated \n";
        header("Location: {$Admin_profile_page}");



    }





}