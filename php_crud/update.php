<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "select * from `crud` where id =$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "update `crud` set id=$id,name='$name',email='$email',mobile='$mobile',password='$password' where id = $id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo "user inserted successfully";
        header('location:user_list.php');
    } else {
        die(mysqli_error($con));
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 col-lg-8">
        <button type="button" class="btn btn-primary mt-3 "><a href="user_list.php" class="text-light">User List</a></button>
        <form action="" method="post">


            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Your Name</label>
                <input type="text" class="form-control" name="name" value="<?= $name ?>" placeholder="Enter Your Name">
            </div>

            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value=<?= $email ?> placeholder="Enter email">
            </div>

            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Mobile</label>
                <input type="text" class="form-control" name="mobile" value=<?= $mobile ?> placeholder="Enter Mobile Nb">
            </div>

            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" value=<?= $password ?> placeholder="Password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</body>

</html>