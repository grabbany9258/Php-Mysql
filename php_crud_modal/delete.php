<?php
include 'connect.php';
if (isset($_POST['deleteSend'])) {
    $uniqueId = $_POST['deleteSend'];

    $sql = "delete from `crud_modal` where id = $uniqueId";
    $result = $con->query($sql);
}
