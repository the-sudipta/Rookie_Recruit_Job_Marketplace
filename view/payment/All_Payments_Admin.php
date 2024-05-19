<?php include '../../view/Renderer.php'; ?>

<?php

$navbar_admin = '../../view/Navbar_Admin.php';


// Your specific content goes here
Renderer::start();

?>


<?php

require_once '../../model/PaymentRepo.php';
$login_email_error = '';
$login_password_error = '';
$Payment_service_file = '/Rookie_Recruit_Job_Marketplace/?';
$Show_Single_Payment = '/Rookie_Recruit_Job_Marketplace/view/payment/Show_Single_Payment_Admin.php';



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rookie Recruit Job Marketplace</title>

    <link rel="stylesheet" href="../../view/css/payment.css">





</head>
<body>


<?php

$data = findAllPayments();







echo '<table class="table table-striped table-hover">';
echo '
    <tr>
        <th>Id</th>
        <th>Amount</th>
        <th>Edit</th>
        
    </tr>
    ';

foreach ($data as $row){
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['amount'] . '</td>';

//    echo '<td>  <a href=""><button id="edit_btn" name="edit_btn">Edit</button></a>';
    echo '<td>';
    echo '<form method="post" action="'.$Show_Single_Payment.'">';
    echo '<input type="number" id="selected_id" name="selected_id" hidden="hidden" value="' . $row['id'] . '" />';
    echo '<input type="submit" class="btn btn-warning" value="Edit" id="delete_btn" name="delete_btn"/>';
    echo '</td>';
    echo '</form>';
    echo '</tr>';
}







echo '</table>'


?>

</body>
</html>
<?php Renderer::end(); ?>


<?php include $navbar_admin;?>
