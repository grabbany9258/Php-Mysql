<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$con = new mysqli('localhost', 'root', '', 'php_crud');
if (!$con) {
    die(mysqli_error($con));
} 
// }
