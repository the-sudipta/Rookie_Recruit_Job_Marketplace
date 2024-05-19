<?php

session_start();
$_SESSION["data"] = null;
$_SESSION["data"]["status"] = -1;
$_SESSION["user_id"] = -1;
session_destroy();

$holy_first_page = "/Rookie_Recruit_Job_Marketplace/view/HOLY_FIRST_PAGE.php";

header("Location: {$holy_first_page}");