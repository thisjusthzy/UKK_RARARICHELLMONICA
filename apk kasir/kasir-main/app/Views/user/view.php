<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Table User</h3>
                <p class="text-subtitle text-muted">Data-data user</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Table User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($vuser as $k) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $k->username ?>
                                </td>
                                <td>
                                    <?php echo $k->password ?>
                                </td>
                                <td>
                                    <?php echo $k->email ?>
                                </td>
                                <td>
                                    <?php echo $k->nama_level ?>
                                </td>
                                <td>
                                    <?php echo $k->user_created_at ?>
                                </td>
                                <td>
                                    <button class="btn btn-warning" onclick="confirmReset(<?= $k->id_user ?>)"
                                        data-toggle="tooltip" data-placement="bottom" title="Reset user password"><i
                                            class="bi bi-key-fill"></i> Reset</button>
                                    <button class="btn btn-danger" onclick="confirmDelete(<?= $k->id_user ?>)"
                                        data-toggle="tooltip" data-placement="bottom" title="Reset user password"><i
                                            class="bi bi-trash-fill"></i> Delete</button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>
        <!-- Add jQuery before your script -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <!-- Add the success SweetAlert script to the bottom of your page -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            function confirmReset(userId) {
                Swal.fire({
                    title: 'Confirmation',
                    text: 'Are you sure you want to reset this user\'s password?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user clicks "Yes"
                        resetPassword(userId);
                    } else {
                        // If the user clicks "No" or closes the dialog
                        Swal.fire({
                            icon: 'info',
                            title: 'Operation Cancelled',
                            showConfirmButton: false,
                            timer: 1500  // Adjust the timer as needed
                        });
                    }
                });
            }
            function confirmDelete(userId) {
                Swal.fire({
                    title: 'Confirmation',
                    text: 'Are you sure you want to delete this user\'s password?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user clicks "Yes"
                        deletePassword(userId);
                    } else {
                        // If the user clicks "No" or closes the dialog
                        Swal.fire({
                            icon: 'info',
                            title: 'Operation Cancelled',
                            showConfirmButton: false,
                            timer: 1500  // Adjust the timer as needed
                        });
                    }
                });
            }


            function resetPassword(userId) {
                // Use AJAX to perform the password reset asynchronously
                $.ajax({
                    url: `/user/reset/${userId}`,
                    method: 'POST', // Adjust the HTTP method as needed
                    success: function () {
                        // Password reset was successful
                        Swal.fire({
                            icon: 'success',
                            title: 'Password Reset Successfully!',
                            showConfirmButton: false,
                            timer: 1500  // Adjust the timer as needed
                        });

                        // Refresh the page after the success SweetAlert
                        setTimeout(() => {
                            location.reload();
                        }, 1500); // Adjust the timer as needed
                    },
                    error: function () {
                        // Handle the error if the password reset fails
                        Swal.fire({
                            icon: 'error',
                            title: 'Password Reset Failed',
                            showConfirmButton: false,
                            timer: 1500  // Adjust the timer as needed
                        });
                    }
                });
            }

            function deletePassword(userId) {
                // Use AJAX to perform the password reset asynchronously
                $.ajax({
                    url: `/user/hapus/${userId}`,
                    method: 'POST', // Adjust the HTTP method as needed
                    success: function () {
                        // Password reset was successful
                        Swal.fire({
                            icon: 'success',
                            title: 'Password Reset Successfully!',
                            showConfirmButton: false,
                            timer: 1500  // Adjust the timer as needed
                        });

                        // Refresh the page after the success SweetAlert
                        setTimeout(() => {
                            location.reload();
                        }, 1500); // Adjust the timer as needed
                    },
                    error: function () {
                        // Handle the error if the password reset fails
                        Swal.fire({
                            icon: 'error',
                            title: 'Password Reset Failed',
                            showConfirmButton: false,
                            timer: 1500  // Adjust the timer as needed
                        });
                    }
                });
            }
        </script>