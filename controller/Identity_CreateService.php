<?php

session_start();

include_once '../model/IdentityRepo.php';

$Identity_submit_page = "/Rookie_Recruit_Job_Marketplace/view/Identity_Verification_Applicant.php";

$PDF_FILE_NAME = $_SESSION["PDF_FILE_NAME"];
$USER_ID = $_SESSION["user_id"];

$identity_id = createIdentity($PDF_FILE_NAME,$USER_ID);

$_SESSION["PDF_FILE_NAME"] = "";

header("Location: {$Identity_submit_page}");