<?php
$invalid = 0;
$success = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connection.php';

    $user = $_POST['username'];
    $pass = $_POST['password'];


    $sql = "select * from `registration` where (username = '$user' and password = '$pass')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $num =  mysqli_num_rows($result);
        if ($num > 0) {
            // echo "Succesfully Logged in";
            $success = 1;
            session_start();
            $_SESSION['username'] = $user;
            header('location:home.php');
        } else {
            // echo "invalid username & Password";
            $invalid = 1;
        }
    }
}
?>
<!-- form part -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <?php
        if ($invalid) {
            echo '<div class="alert alert-danger" role="alert">
                Error! <strong>Username & Password is invalid</strong> </div>';
        }

        // for success message
        if ($success) {
            echo '<div class="alert alert-success" role="alert">
                Congrates! <strong>User Succesfully Logged in</strong> </div>';
        }

        ?>

        <h1 class="text-center mb-4 mt-2">Login form</h1>
        <!-- Section: Design Block -->
        <section class=" text-center text-lg-start">
            <style>
                .rounded-t-5 {
                    border-top-left-radius: 0.5rem;
                    border-top-right-radius: 0.5rem;
                }

                @media (min-width: 992px) {
                    .rounded-tr-lg-0 {
                        border-top-right-radius: 0;
                    }

                    .rounded-bl-lg-5 {
                        border-bottom-left-radius: 0.5rem;
                    }
                }
            </style>
            <div class="card mb-3">
                <div class="row g-0 d-flex align-items-center">
                    <div class="col-lg-4 d-none d-lg-flex">
                        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes" class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
                    </div>
                    <div class="col-lg-8">
                        <div class="card-body py-5 px-md-5">

                            <form action="login.php" method="post">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="form2Example1" class="form-control" name="username" />
                                    <label class="form-label" for="form2Example1">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form2Example2" class="form-control" />
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
                                <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>

                                <div>
                                    <a href="signup.php">Not a user! sign up</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>
</body>

</html>