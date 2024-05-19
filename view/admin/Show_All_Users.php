<?php include '../../view/Renderer.php'; ?>

<?php
$navbar_admin = '../../view/Navbar_Admin.php';
// Your specific content goes here
Renderer::start();
?>

<?php
require_once '../../model/UserRepo.php';
$login_email_error = '';
$login_password_error = '';
$user_service_file = '/Rookie_Recruit_Job_Marketplace/controller/UserService.php';
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

<?php
$data = findAllUsers();

echo '<table class="table table-striped table-hover">';
echo '
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Position</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
';

foreach ($data as $row) {
//    echo '<h1>'.$row['id'].'</h1>';
    if ($row["status"] === '1') {
        $stat = $row['status'] == '1' ? "Active" : "De-Activated";
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['type'] . '</td>';
        echo '<td>' . $stat . '</td>';
        echo '<td>';
        echo '<div class="btn-group" role="group">';
        echo '<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal' . $row['id'] . '">Edit</a>';

        // Edit Modal
        echo '<div class="modal fade" id="editModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="editModalLabel' . $row['id'] . '" aria-hidden="true">';
        echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="editModalLabel' . $row['id'] . '">Edit User</h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<p>Edit user details here</p>';
        // Add your form elements for editing here
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
        echo '<button type="button" class="btn btn-primary">Save changes</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Delete Form
        echo '<form method="post" action="' . $user_service_file . '" class="ml-2">';
        echo '<input type="number" id="selected_id" name="selected_id" hidden="hidden" value="' . $row['id'] . '" />';
        echo '<button type="submit" class="btn btn-danger">Delete</button>';
        echo '</form>';
        echo '</div>';
        echo '</td>';
        echo '</tr>';
    }
}

echo '</table>';
?>

</body>
</html>
<?php Renderer::end(); ?>

<?php include $navbar_admin; ?>
