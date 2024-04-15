<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Reports</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <link href="../styles/booking.css" rel="stylesheet" />
    <link href="../styles/scrollbar.css" rel="stylesheet" />
    <link href="../styles/admin/reports.css" rel="stylesheet" />

</head>

<body class="bg-dark w-100">
    <?php include("components/header.php"); ?>

    <div class="row w-100">
        <div class="col-lg-1">
            <?php include("components/sidebar.php"); ?>
        </div>

        <div class="col-lg-8 bg-white shadow-lg">
            <div class="px-4">
                <h4 class="fw-bold text-uppercase">&gt; Reports</h4>
                <hr>
                <br />

                <div align="right">
                    <input type="search" class="form-control w-auto" name="search" placeholder="Search"
                        style="border-radius: 8px" />
                </div>
                <br />

                <table class="table table-hover table-stripped border border-dark" style="border-radius: 8px">
                    <thead>
                        <tr>
                            <td class="bg-dark text-white">ID</td>
                            <td class="bg-dark text-white">Resident Name</td>
                            <td class="bg-dark text-white">Room No.</td>
                            <td class="bg-dark text-white">Price</td>
                            <td class="bg-dark text-white">Date</td>
                            <td class="bg-dark text-white">Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6" align="center">
                                <br />
                                <b class="text-uppercase">No Data</b>
                                <br /><br />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <br /><br />
        </div>
    </div>

    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/bootstrap.bundle.min.js"></script>
</body>

</html>