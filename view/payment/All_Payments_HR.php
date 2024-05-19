<?php include '../../view/Renderer.php'; ?>

<?php

$navbar_hr = '../../view/Navbar_HR.php';


// Your specific content goes here
Renderer::start();

?>


<?php

require_once '../../model/PaymentRepo.php';
$login_email_error = '';
$login_password_error = '';
$Payment_service_file = '/Rookie_Recruit_Job_Marketplace/?';



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rookie Recruit Job Marketplace</title>

    <link rel="stylesheet" href="../../view/css/style.css">


</head>
<body>


<?php

$data = findAllPayments();







echo '<table class="table table-striped table-hover">';
echo '
    <tr>
        <th>Id</th>
        <th>Amount</th>
        
    </tr>
    ';

foreach ($data as $row){
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['amount'] . '</td>';
    echo '</tr>';


}







echo '</table>'


?>

</body>
</html>
<?php Renderer::end(); ?>


<?php include $navbar_hr;?>
