<?php

session_start();

include_once '../../model/PaymentRepo.php';



$Admin_Dashboard_page = "/Rookie_Recruit_Job_Marketplace/view/admin/Admin_Dashboard.php";
$Applicant_Dashboard_page = "/Rookie_Recruit_Job_Marketplace/view/applicant/Applicant_Dashboard.php";
$HR_Dashboard_page = "/Rookie_Recruit_Job_Marketplace/view/hr/HR_Dashboard.php";


$Admin_Payment_page = "/Rookie_Recruit_Job_Marketplace/view/payment/Payment_Create_Admin.php";
$Applicant_Payment_page = "/Rookie_Recruit_Job_Marketplace/view/payment/Payment_Create_Applicant.php";
$HR_Payment_page = "/Rookie_Recruit_Job_Marketplace/view/payment/Payment_Create_HR.php";

$HOLY_FIRST_PAGE = "/Rookie_Recruit_Job_Marketplace/view/HOLY_FIRST_PAGE.php";


$amount = $_POST["amount"];
$user_id = $_SESSION["user_id"];

$card_number = $_POST["card_number"];
$holder_name = $_POST["holder_name"];
$expiration = $_POST["expireDate"];
$cvv = $_POST["cvv"];

echo "Amount = ".$amount."  ";
echo "User id = ".$user_id." ";


// Insert Payment Details to JSON file

$filePath = '../../static/json/payment_details.json';
$existingData = file_get_contents($filePath);

// Decode the JSON content to an associative array
$existingArray = json_decode($existingData, true);
$data = array(
    'card_number' => $card_number,
    'holder_name' => $holder_name,
    'expiration' => $expiration,
    'cvv' => $cvv,
    'user_id' => $user_id
);

// Append the new data to the existing array
$existingArray[] = $data;

// Convert the combined array to JSON format
$jsonData = json_encode($existingArray, JSON_PRETTY_PRINT);

// Write the updated JSON data back to the file
file_put_contents($filePath, $jsonData);


// Insert Payment Amount and User id to Database
$payment_id = createPayment($amount, $user_id);
if($payment_id > 0){

    if($_SESSION["data"]["type"] === "HR"){
        header("Location: {$HR_Dashboard_page}");
    }elseif ($_SESSION["data"]["type"] === "Applicant"){
        header("Location: {$Applicant_Dashboard_page}");
    }elseif(($_SESSION["data"]["type"] === "Admin")){
        header("Location: {$Admin_Dashboard_page}");
    }else{
        header("Location: {$HOLY_FIRST_PAGE}");
    }


}else{

    if($_SESSION["data"]["type"] === "HR"){
        header("Location: {$HR_Payment_page}");
    }elseif ($_SESSION["data"]["type"] === "Applicant"){
        header("Location: {$Applicant_Payment_page}");
    }elseif(($_SESSION["data"]["type"] === "Admin")){
        header("Location: {$Admin_Payment_page}");
    }else{
        header("Location: {$HOLY_FIRST_PAGE}");
    }

}