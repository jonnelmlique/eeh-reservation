<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Manage Accounts</title>

    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <link href="../styles/booking.css" rel="stylesheet" />
    <link href="../styles/scrollbar.css" rel="stylesheet" />
    <link href="../styles/admin/manageaccounts.css" rel="stylesheet" />

</head>

<body class="bg-dark w-100">
    <?php include ("components/header.php"); ?>

    <div class="row w-100">
        <div class="col-lg-1">
            <?php include ("components/sidebar.php"); ?>
        </div>

        <div class="col-lg-8 bg-white shadow-lg">
            <div class="px-4">
                <h4 class="fw-bold text-uppercase">&gt; Manage Accounts</h4>
                <hr>
                <br />

                <div align="right">
                    <input type="search" class="form-control w-auto d-inline mx-2" name="search"
                        placeholder="Search User" style="border-radius: 8px" />
                    <button class="btn btn-primary text-uppercase px-4" data-bs-toggle="modal"
                        data-bs-target="#addModal">Add User</button>
                </div>
                <br />

                <table class="table table-hover table-stripped border border-dark"
                    style="border-radius: 8px; table-layout: fixed">
                    <thead>
                        <tr>
                            <td class="bg-dark text-white">#</td>
                            <td class="bg-dark text-white">Name</td>
                            <td class="bg-dark text-white">User Role</td>
                            <td class="bg-dark text-white">Status</td>
                            <td class="bg-dark text-white">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="fw-bold">Isaac</td>
                            <td>Manager</td>
                            <td class="text-success text-uppercase">Active</td>
                            <td><button class="btn btn-success w-100" data-bs-toggle="modal"
                                    data-bs-target="#editModal">Edit</button></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td class="fw-bold">John Doe</td>
                            <td>Security</td>
                            <td class="text-danger text-uppercase">Inactive</td>
                            <td><button class="btn btn-success w-100" data-bs-toggle="modal"
                                    data-bs-target="#editModal">Edit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <br /><br />
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #FAEBD7">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit User</h5>
                </div>
                <div class="modal-body" align="center">
                    <div class="row">
                        <div class="col-4" align="right">
                            <p class="mt-2">Name</p>
                        </div>
                        <div class="col-8"><input type="text" class="form-control" name="edit-name"
                                style="border-radius: 8px" placeholder="Name" /></div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-4" align="right">
                            <p class="mt-2">User Role</p>
                        </div>
                        <div class="col-8"><input type="text" class="form-control" name="edit-user-role"
                                style="border-radius: 8px" placeholder="User Role" /></div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-4" align="right">
                            <p class="mt-2">Status</p>
                        </div>
                        <div class="col-8">
                            <select class="form-control" name="edit-status" style="border-radius: 8px">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn continue-btn">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #FAEBD7">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add User</h5>
                </div>
                <div class="modal-body" align="center">
                    <div class="row">
                        <div class="col-4" align="right">
                            <p class="mt-2">Name</p>
                        </div>
                        <div class="col-8"><input type="text" class="form-control" name="edit-name"
                                style="border-radius: 8px" placeholder="Name" /></div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-4" align="right">
                            <p class="mt-2">User Role</p>
                        </div>
                        <div class="col-8"><input type="text" class="form-control" name="edit-user-role"
                                style="border-radius: 8px" placeholder="User Role" /></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn continue-btn">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/bootstrap.bundle.min.js"></script>
</body>

</html>