<?php
$hostname = 'localhost';
$username = 'root';
$pass = '';
$database = 'signup_forms';

$con = mysqli_connect($hostname, $username, $pass, $database);


// if ($con) {
//     echo "succesfully connected";
// } else {
//     die(mysqli_error($con));
// }

// instead of previous code we can do below cause we don't want successfully connected everytime
if (!$con) {
    die(mysqli_error($con));
}
