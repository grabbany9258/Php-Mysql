<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "connect.php";
    echo "<br>";

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "insert into registration (username, password) Values('$user' , '$pass')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data inserted in Table";
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
    <title>Signup page</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <section class="vh-100" style="background-color: #508bfc;">
                <div class="container py-2 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">

                                    <h3 class="mb-5">Sign in</h3>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="username" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX-2">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX-2">Password</label>
                                    </div>

                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <input class="form-check-input" type="checkbox" value="" name="password" />
                                        <label class="form-check-label" for="form1Example3"> Remember password </label>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</body>

</html>