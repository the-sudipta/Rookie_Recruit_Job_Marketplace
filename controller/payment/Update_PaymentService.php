<?php

require_once '../../model/PaymentRepo.php';
$Show_all_Payment_Admin_file = '/Rookie_Recruit_Job_Marketplace/view/payment/All_Payments_Admin.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "Got Req\n";

//* Amount Validation
    $amount = $_POST['amount'];
    $id = $_POST['selected_id'];

    echo "Amount = ".$amount. " id = ".$id;
    $decision = updatePayment($amount, $id);

    if($decision){
    header("Location: {$Show_all_Payment_Admin_file}");
    }
}
