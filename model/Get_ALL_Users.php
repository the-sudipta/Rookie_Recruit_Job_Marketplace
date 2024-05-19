<?php
// fetch_users_ajax.php

// Include your database connection and UserRepo.php if needed
require_once __DIR__ . '/../model/UserRepo.php';
// Fetch data from the database
$data = findAllUsers();

// Return data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>
