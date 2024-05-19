<?php



// Delete User
session_start();

require_once '../model/UserRepo.php';

$show_all_users_page = '/Rookie_Recruit_Job_Marketplace/view/admin/Show_All_Users.php';


echo 'User Service ';
echo 'Selected id = ' . $_POST["selected_id"];

deleteUser($_POST["selected_id"]);

header("Location: {$show_all_users_page}");


