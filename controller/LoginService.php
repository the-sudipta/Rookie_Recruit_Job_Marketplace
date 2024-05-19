<?php

require_once '../model/HRRepo.php';
require_once '../model/ApplicantRepo.php';
require_once '../model/UserRepo.php';


session_start();

$First_page =   '/Rookie_Recruit_Job_Marketplace/?';
$HR_Login_page =   '/Rookie_Recruit_Job_Marketplace/view/login_signup/Login_Signup_HR.php';
$Applicant_Login_page =   '/Rookie_Recruit_Job_Marketplace/view/login_signup/Login_Signup_Applicant.php';

$HR_Dashboard_page = '/Rookie_Recruit_Job_Marketplace/view/hr/HR_Dashboard.php';
$Applicant_Dashboard_page = '/Rookie_Recruit_Job_Marketplace/view/applicant/Applicant_Dashboard.php';

$everythingOK = FALSE;
$everythingOKCounter = 0;
$emailError = "";
$passwordError = "";
$checkBoxError = "";

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
    $email = $_POST['loginEmail'];
    if (empty($email)) {
        $emailError = "Email is required";
        $_POST['loginEmail'] = "";
        $email = "";
        $everythingOK = FALSE;
        $everythingOKCounter += 1;

        echo "Mail error 1";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
        $_POST['loginEmail'] = "";
        $email = "";
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Mail error 2";
    } else {
        $everythingOK = TRUE;
    }

//* Password Validation
    $password = $_POST['loginPassword'];
    if (empty($password) || strlen($password) < 8) {
        // check if password size in 8 or more and  check if it is empty
        $passwordError = "Write at least 8 Character";
        $_POST['loginPassword'] = "";
        $password = "";
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Pass error 1";
    } else if (!preg_match('/[@#$%]/', $password)) {
        // check if password contains at least one special character
        $passwordError = "Password must contain at least one special character (@, #, $, %).";
        $_POST['loginPassword'] = "";
        $password = "";
        $everythingOK = FALSE;
        $everythingOKCounter += 1;
        echo "Pass error 2";
    } else {
        $everythingOK = TRUE;
    }

    if ($everythingOK && $everythingOKCounter === 0){

//        echo "all ok";
        $data = findUserByEmailAndPassword($email, $password);
//        echo '\nData id = '.$data["id"].'\n';
        $_SESSION["data"] = $data;
        $_SESSION["data"]["status"] = $_SESSION["data"]["status"]==='1'? "Active" : "De-Activated";
        $_SESSION["user_id"] = $data["id"];

        if($_SESSION["data"]["id"] > 0){
            echo "\n\nAll Clear to Dashboard";
            echo "Type is = ".$_SESSION["data"]["type"];
            if($_SESSION["data"]["type"] === "HR"){
                echo "   HR FOUND";
                $hr_data = findHRByUserID($data["id"]);
                echo "   Company = ".$hr_data["company_name"];
                $_SESSION["company_name"] = $hr_data["company_name"];
                echo "\nRedirecting to HR Dashboard page";
                header("Location: {$HR_Dashboard_page}");
            }else{
                echo "   Applicant FOUND";
                $applicant_data = findApplicantByUserID($data["id"]);
                echo "\nUser ID = ".$data["id"];
                echo "\nApplicant ID = ".$applicant_data["id"];

                $_SESSION["full_name"] = $applicant_data["full_name"];
                echo "\nRedirecting to Applicant Dashboard page";
                header("Location: {$Applicant_Dashboard_page}");
            }
        }else{
            echo "\nRedirecting to first page because id not found";
            header("Location: {$First_page}");
        }

    }else{
        $_SESSION['emailError'] = $emailError;
        $_SESSION['passwordError'] = $passwordError;
        echo "\nRedirecting to first page because Email or Password Error";
//        header("Location: {$First_page}");
    }



}


