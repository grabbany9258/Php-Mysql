<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Crud with Bootstrap Modal</title>
    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <h1 class="text-center mt-5 bg-red">Php Crud with Bootstrap Modal</h1>
    <div class="container">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark mb-4" data-bs-toggle="modal" data-bs-target="#completeModal">
            Add User
        </button>

        <!-- below id for displaying html data -->
        <div id="displayDataTable"></div>

        <!-- Modal -->
        <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Insert User Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="modalName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="modalName" placeholder="Enter Name">
                        </div>

                        <div class="mb-3">
                            <label for="modalEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="modalEmail" placeholder="Enter Email">
                        </div>

                        <div class="mb-3">
                            <label for="modalMobile" class="form-label">Mobile </label>
                            <input type="text" class="form-control" id="modalMobile" placeholder="Enter Mobile Nb">
                        </div>

                        <div class="mb-3">
                            <label for="modalAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="modalAddress" placeholder="Enter Address">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="adduser()" class="btn btn-dark">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- update modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="updateName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="updateName" placeholder="Enter Name">
                    </div>

                    <div class="mb-3">
                        <label for="updateEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="updateEmail" placeholder="Enter Email">
                    </div>

                    <div class="mb-3">
                        <label for="updateMobile" class="form-label">Mobile </label>
                        <input type="text" class="form-control" id="updateMobile" placeholder="Enter Mobile Nb">
                    </div>

                    <div class="mb-3">
                        <label for="updateAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="updateAddress" placeholder="Enter Address">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" id="hiddendata">
                </div>
            </div>
        </div>
    </div>

    <!-- Script cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        // Preventing refreshing table gone problem
        $(document).ready(function() {
            displayData();
        })

        // This function is for Displyaing User
        function displayData() {
            var displayData = "true";

            $.ajax({
                url: "display.php",
                type: "POST",
                data: {
                    displaySend: displayData
                },

                success: function(data, status) {
                    $('#displayDataTable').html(data);
                }

            });
        }

        // This function is for Adding User
        function adduser() {
            var nameAdd = $('#modalName').val();
            var emailAdd = $('#modalEmail').val();
            var mobileAdd = $('#modalMobile').val();
            var addressAdd = $('#modalAddress').val();

            $.ajax({
                url: ('addUser.php'),
                type: 'POST',
                data: {
                    nameSend: nameAdd,
                    emailSend: emailAdd,
                    mobileSend: mobileAdd,
                    addressSend: addressAdd
                },
                success: function(data, status) {
                    // console.log(status);
                    displayData();
                }

            })
        }

        // This is for deleting user
        function deleteUser(deleteid) {
            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: {
                    deleteSend: deleteid
                },
                success: function(data, status) {
                    displayData();
                }

            })
        }


        // This is for Showing Data Before update
        function editUser(updateid) {
            $('#hiddendata').val(updateid)

            $.post("update.php", {
                updateid: updateid
            }, function(data, status) {
                var userid = JSON.parse(data)
                $('#updateName').val(userid.name);
                $('#updateEmail').val(userid.email);
                $('#updateMobile').val(userid.mobile);
                $('#updateAddress').val(userid.address);
            })

            $('#updateModal').modal('show');
        }
    </script>
</body>

</html>