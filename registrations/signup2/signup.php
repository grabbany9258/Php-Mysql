<?php
$users = 0;
$success = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connection.php';
    // echo "<br>";

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];




    // $sql = "insert into `registration` (username,password) Values ('$user' ,'$pass')";

    // $result = mysqli_query($con, $sql);

    // if ($result) {
    //     echo "succesfully inserted";
    // } else {
    //     die(mysqli_error($con));
    // }

    $sql = "Select * from `registration` where(username = '$user')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            // echo "User Already Exist";
            $users = 1;
        } else {

            if ($pass === $cpass) {


                $sql = "insert into `registration` (username, password) Values('$user', '$pass')";

                $result = mysqli_query($con, $sql);
                if ($result) {
                    // echo "Username password inserted succesfully";
                    $success = 1;
                    // header('location:login.php');
                }
            } else {
                // die(mysqli_error($con));

                $invalid = 1;
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
    <title>signup form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" </head>

<body>

    <?php
    if ($users) {
        echo '<div class="alert alert-danger" role="alert">
User Already Exist!
</div>';
    }

    // For New user insert 

    if ($success) {
        echo '<div class="alert alert-success" role="alert">
User Inserted Successfully!
</div>';
    }

    // For invalid credentials

    if ($invalid) {
        echo '<div class="alert alert-danger" role="alert">
Credentials did not Match!
</div>';
    }

    ?>

    <div class="container">
        <!-- <div class="col-md-4 offset-2"> -->
        <section class="vh-100 gradient-custom">
            <div class="container py-2 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <form action="signup.php" method="post">

                                    <div class="mb-md-5 mt-md-4 ">

                                        <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                        <p class="text-white-50 mb-4">Please enter your Username and password!</p>

                                        <div class="form-outline form-white mb-2">
                                            <input type="text" name="username" class="form-control form-control-lg" />
                                            <label class="form-label" for="typeEmailX">Username</label>
                                        </div>

                                        <div class="form-outline form-white mb-2">
                                            <input type="password" name="password" class="form-control form-control-lg" />
                                            <label class="form-label" for="typePasswordX">Password</label>
                                        </div>

                                        <div class="form-outline form-white mb-2">
                                            <input type="password" name="cpassword" class="form-control form-control-lg" />
                                            <label class="form-label" for="typePasswordX">Confirm Password</label>
                                        </div>

                                        <p class="small mb-2 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                                        <button type="submit" class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>



                                    </div>

                                    <div>
                                        <p class="mb-0">You have an account? <a href="login.php" class="text-white-50 fw-bold">Sign In</a>
                                        </p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- </div> -->

</body>

</html>