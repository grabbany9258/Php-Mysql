<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <button class="btn btn-primary mt-5 mb-3"><a href="user.php" class="text-light"> Add User</a></button>

        <table class="table table-striped table-borderd text-center">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "select * from `crud`";
            $result = mysqli_query($con, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $mobile = $row['mobile'];
                    $password = $row['password'];
                    echo ' <tr>
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>' . $email . '</td>
                    <td>' . $mobile . '</td>
                    <td>' . $password . '</td>
                    <td>

                    <a href="update.php" class="btn btn-primary" >Edit</a>
                    <a href="delete.php?deleteid = ' . $id . '" class="btn btn-danger">Delete</a>
                     
                    </td>
                    
                    
                </tr>
                    
                    ';
                }
            }
            ?>


        </table>
    </div>

</body>

</html>