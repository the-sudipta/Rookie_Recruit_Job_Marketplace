<?php

require_once __DIR__ . '/../../model/UserRepo.php';
require_once __DIR__ . '/../../model/ApplicantRepo.php';



session_start();

$Applicant_Signup_page =   '/Rookie_Recruit_Job_Marketplace/view/login_signup/Login_Signup_Applicant.php';
$Applicant_Login_page =   '/Rookie_Recruit_Job_Marketplace/view/login_signup/Login_Signup_Applicant.php';


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

    $fullName = $_POST["registerFull_name"];

    if ($everythingOK && $everythingOKCounter === 0){

        $inserted_id = createUser($email, $password, "Applicant");
        $inserted_id_applicant = createApplicant($fullName, $inserted_id);
        echo '<h1>'.$inserted_id_applicant.'</h1>';


        // Inserting Data into JSON
        if (isset($_POST["registerCheck"])) {
            // Checkbox is checked

            $filePath = '../../static/json/terms_condition_accepted_info.json';
            $existingData = file_get_contents($filePath);

            // Decode the JSON content to an associative array
            $existingArray = json_decode($existingData, true);

            $data = array(
                'card_number' => 'Terms and Condition Accepted',
                'user_id' => $inserted_id
            );

            // Append the new data to the existing array
            $existingArray[] = $data;

            // Convert the combined array to JSON format
            $jsonData = json_encode($existingArray, JSON_PRETTY_PRINT);

            // Write the updated JSON data back to the file
            file_put_contents($filePath, $jsonData);
        }


        if($inserted_id > 0 && $inserted_id_applicant > 0){
            echo "\n\nAll Clear to Login";
            header("Location: {$Applicant_Login_page}");
        }else{
            header("Location: {$Applicant_Signup_page}");
        }

    }else{
        $_SESSION['emailError'] = $emailError;
        $_SESSION['passwordError'] = $passwordError;
        header("Location: {$Applicant_Signup_page}");
    }



}





