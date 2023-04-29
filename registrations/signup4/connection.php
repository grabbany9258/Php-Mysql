<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'signup_forms';

$con = mysqli_connect($host, $user, $pass, $db);

// if ($con) {
//     echo "Succesfully connected";
// } else {
//     die(mysqli_error($con));
// }


if (!$con) {
    die(mysqli_error($con));
}
