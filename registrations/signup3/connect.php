<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'signup_forms';

$con = mysqli_connect($hostname, $username, $password, $database);

if ($con) {
    echo "Database connected";
} else {
    die(mysqli_error($con));
}
