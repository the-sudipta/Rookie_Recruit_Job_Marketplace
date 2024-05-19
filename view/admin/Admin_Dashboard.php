<?php include '../../view/Renderer.php'; ?>

<?php

$navbar_admin = '../../view/Navbar_Admin.php';
// Your specific content goes here
Renderer::start();
?>


<?php
$login_email_error = '';
$login_password_error = '';




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rookie Recruit Job Marketplace</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>


WELCOME ADMIN! TO THE DASHBOARD


</body>
</html>
<?php Renderer::end(); ?>


<?php include $navbar_admin;?>
