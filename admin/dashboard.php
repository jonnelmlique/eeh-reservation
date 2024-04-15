<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Admin</title>

    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <link href="../styles/scrollbar.css" rel="stylesheet" />
    <link href="../styles/admin/dashboard.css" rel="stylesheet" />
</head>

<body>
    <?php include("components/header.php"); ?>

    <div class="row w-100">
        <div class="col-lg-1">
            <?php include("components/sidebar.php"); ?>
        </div>

        <div class="col-lg-8 bg-white shadow-lg">
            <div class="px-4">
                <h4 class="fw-bold text-uppercase">&gt; Dashboard</h4>
                <h5>2:08 PM &mdash; 4/5/2024</h5>
                <hr>
                <br />
                <div class="cont">

                    <div class="row">
                        <div class="col-3">
                            <div class="card card-body bg-primary text-white px-4" style="border-radius: 8px"
                                align="center">
                                <h6 class="fw-bold">New Bookings</h6>
                                <h4 class="fw-bold">0</h4>
                            </div>
                            <br />

                            <div class="card card-body bg-primary text-white px-4" style="border-radius: 8px"
                                align="center">
                                <h6 class="fw-bold">Cancelled</h6>
                                <h4 class="fw-bold">0</h4>
                            </div>
                            <br />

                            <div class="card card-body bg-primary text-white px-4" style="border-radius: 8px"
                                align="center">
                                <h6 class="fw-bold">Rooms</h6>
                                <h4 class="fw-bold">0</h4>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="card card-body bg-primary text-white px-4" style="border-radius: 8px"
                                align="center">
                                <h6 class="fw-bold">Expected Arrival</h6>
                                <h4 class="fw-bold">0</h4>
                            </div>
                            <br />

                            <div class="card card-body bg-primary text-white px-4" style="border-radius: 8px"
                                align="center">
                                <h6 class="fw-bold">Expected Departure</h6>
                                <h4 class="fw-bold">0</h4>
                            </div>
                            <br />

                            <div class="card card-body bg-primary text-white px-4" style="border-radius: 8px"
                                align="center">
                                <h6 class="fw-bold">Current In-House</h6>
                                <h4 class="fw-bold">0</h4>
                            </div>
                        </div>

                        <div class="col-6">
                            <img src="../assets/pie-chart.png" width="100%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/bootstrap.bundle.min.js"></script>
</body>

</html>