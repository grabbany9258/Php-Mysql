<?php
include 'connect.php';

if (isset($_POST['displaySend'])) {
    $table =
        '<table class="table table-striped text-center ">
        <thead class="table-dark">
   <tr>
        <th>S.N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    </thead>';

    $sql = "Select * from `crud_modal`";
    $result = $con->query($sql);
    $number = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = $row['address'];

        $table .=
            '<tr>
        <td>' . $number . '</td>
        <td>' . $name . '</td>
        <td>' . $email . '</td>
        <td>' . $mobile . '</td>
        <td>' . $address . '</td>
        <td>
            <button class="btn btn-dark" onclick="editUser(' . $id . ')">Edit</button>
            <button class="btn btn-danger" onclick="deleteUser(' . $id . ')">Delete</button>
        </td>
        </tr>';
        $number++;
    }
    $table .= '</table>';
    echo $table;
}
