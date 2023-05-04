<?php
$con = new mysqli('localhost', 'root', '', 'php_crud_modal');

if (!$con) {
    die(mysqli_error($con));
}
