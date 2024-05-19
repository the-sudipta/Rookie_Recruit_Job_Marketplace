<?php
require_once '../../model/UserRepo.php';

$data = findAllUsers();


foreach ($data as $row) {

    echo $row['email'];

}