<?php

$user2 = 0;
$success = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';


    $user = $_POST['username'];
    $pass = $_POST['password'];


    // $sql = "insert into `registration`(username, password) Values('$user' , '$pass')";

    // $result = mysqli_query($con, $sql);

    // if ($result) {
    //     echo "Data inserted Succesfully";
    // } else {
    //     die(mysqli_error($con));
    // }

    $sql = "select * from `registration` where(username= '$user')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            // echo "Username Already Exist";
            $user2 = 1;
        } else {
            $sql = "insert into `registration`(username, password) Values('$user' , '$pass')";

            $result = mysqli_query($con, $sql);

            if ($result) {
                // echo "Data inserted Succesfully";
                $success = 1;
            } else {
                die(mysqli_error($con));
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php
    if ($user2) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Ohh No Sorry!</strong> User Already Exist.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

    if ($success) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>You have succesfully inserted!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>


    <div class="col-md-4 offset-4 ">
        <h1 class="mt-5 text-center">Signup Form</h1>
        <form action="" method="post">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" name="username" class="form-control" />
                <label class="form-label" for="form2Example1">Username</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" name="password" class="form-control" />
                <label class="form-label" for="form2Example2">Password</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                </div>

                <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Already a member? <a href="login.php">Sign In</a></p>
                <p>or Log in with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>
        </form>
    </div>


</body>

</html>