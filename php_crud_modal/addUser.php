<?php
include 'connect.php';

// echo "php crud";

extract($_POST);
// print_r($id);

if (isset($_POST['nameSend']) && isset($_POST['emailSend']) && isset($_POST['mobileSend']) && isset($_POST['addressSend']));

$sql = "insert into `crud_modal`(name,email,mobile,address) values('$nameSend','$emailSend','$mobileSend','$addressSend')";

$result = mysqli_query($con, $sql);
if ($result) {
    echo "inserted";
} else {
    die(mysqli_error($con));
}
