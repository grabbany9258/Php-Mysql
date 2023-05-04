<?php
include 'connect.php';

// Fetching data with individual id
$id = $_GET['updateid'];
$sql = "select * from `crud` where id = $id";
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

    // $sql = "insert into `crud`(name,email,mobile,password) values('$name','$email','$mobile','$password')";

    $sql = "update `crud` set id = $id,  name = '$name',email = '$email',mobile = '$mobile', password = '$password' where id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // echo "successfully connected";


        header('location:display_user.php');
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
    <title>Php Crud</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container col-lg-8 mt-5">
        <!-- <a href="display_user.php" class="btn btn-primary mb-2">View User</a> -->
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Your Name </label>
                <input type="text" name="name" value="<?= $row['name'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" name="email" value="<?= $row['email'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mobile Nb </label>
                <input type="number" name="mobile" value="<?= $row['mobile'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" value="<?= $row['password'] ?>">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>