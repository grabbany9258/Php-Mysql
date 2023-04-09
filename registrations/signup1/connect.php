<?php
$hostname = 'localhost';
$username = 'root';
$pass = '';
$database = 'signup_forms';

$con = mysqli_connect($hostname, $username, $pass, $database);

if ($con) {
    echo "Succesfully connected";
} else {
    die(mysqli_error($con));
}
