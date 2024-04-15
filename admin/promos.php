<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Promos</title>

    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <link href="../styles/booking.css" rel="stylesheet" />
    <link href="../styles/scrollbar.css" rel="stylesheet" />
    <link href="../styles/admin/promos.css" rel="stylesheet" />

</head>

<body>
    <?php include("components/header.php"); ?>

    <div class="row w-100">
        <div class="col-lg-1">
            <?php include("components/sidebar.php"); ?>
        </div>

        <div class="col-lg-8 bg-white shadow-lg">

            <div class="px-4">
                <h4 class="fw-bold text-uppercase">&gt; Promos</h4>
                <hr>
                <br />

                <div class="row">
                    <div class="col-4">
                        <div class="card" style="border-radius: 8px; background-color: #FAEBD7">
                            <div class="card-header">Promo Form</div>
                            <div class="card-body">
                                <label for="promo-name">Promo Name</label>
                                <input type="text" name="promo-name" placeholder="Promo Name" class="form-control"
                                    style="border-radius: 8px" />

                                <label for="percentage" class="mt-4">Percentage</label>
                                <input type="number" name="percentage" placeholder="Percentage" class="form-control"
                                    style="border-radius: 8px" />
                            </div>
                            <div class="card-footer" align="center">
                                <button class="btn btn-primary text-white text-uppercase">Save</button>
                                <button class="btn btn-secondary text-uppercase">Cancel</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div align="right">
                            <input type="search" class="form-control w-auto" name="search" placeholder="Search"
                                style="border-radius: 8px" />
                        </div>
                        <br />

                        <table class="table table-hover table-stripped border border-dark" style="border-radius: 8px">
                            <thead>
                                <tr>
                                    <td class="bg-dark text-white">Promo Name</td>
                                    <td class="bg-dark text-white">Percentage</td>
                                    <td class="bg-dark text-white">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <button class="btn btn-success w-100" style="border-radius: 8px"
                                            data-bs-toggle="modal" data-bs-target="#updateModal">Edit</button><br />
                                        <button class="btn btn-danger w-100 mt-2" style="border-radius: 8px"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br /><br />
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #FAEBD7">
                <div class="modal-header" align="center">
                    <h5 class="modal-title fw-bold">Update Promo Details</h5>
                </div>
                <div class="modal-body">
                    <label for="update-promo-name">Promo Name</label>
                    <input type="text" name="update-promo-name" placeholder="Promo Name" class="form-control"
                        style="border-radius: 8px" />

                    <label for="update-percentage" class="mt-4">Percentage</label>
                    <input type="number" name="update-percentage" placeholder="Percentage" class="form-control"
                        style="border-radius: 8px" />
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn continue-btn">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #FAEBD7">
                <div class="modal-body" align="center">
                    <br /><br />
                    <p>Are you sure you want to delete this item?</p>
                    <br />
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn continue-btn">Continue</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/bootstrap.bundle.min.js"></script>
</body>

</html>