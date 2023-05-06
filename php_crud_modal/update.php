<?php
include 'connect.php';
if (isset($_POST['updateid'])) {
    $user_id = $_POST['updateid'];

    $sql = "select * from  `crud_modal` where id = $user_id";
    $result = $con->query($sql);
    // $response = array();
    while ($row = $result->fetch_array()) {
        $response = $row;
    }
    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "No Data Found";
}

//Update Query
if (isset($_POST['hiddendata'])) {
    $unique_id = $_POST['hiddendata'];

    $name = $_POST['updateName'];
    $email = $_POST['updateEmail'];
    $mobile = $_POST['updateMobile'];
    $address = $_POST['updateAddress'];

    $sql = "update `crud_modal` set name = '$name', email = '$email', mobile ='$mobile', address = '$address' where id = $unique_id ";

    $result = $con->query($sql);
}
