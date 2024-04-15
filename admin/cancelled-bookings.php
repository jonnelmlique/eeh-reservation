<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Cancelled Bookings</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <link href="../styles/booking.css" rel="stylesheet" />
    <link href="../styles/scrollbar.css" rel="stylesheet" />
    <link href="../styles/admin/cancelledbookings.css" rel="stylesheet" />

</head>

<body>
    <?php include ("components/header.php"); ?>

    <div class="row w-100">
        <div class="col-lg-1">
            <?php include ("components/sidebar.php"); ?>
        </div>

        <div class="col-lg-8 bg-white shadow-lg">
            <div class="px-4">
                <h4 class="fw-bold text-uppercase">&gt; Cancelled Bookings</h4>
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
                            <td class="bg-dark text-white">#</td>
                            <td class="bg-dark text-white">Guest Details</td>
                            <td class="bg-dark text-white">Room Details</td>
                            <td class="bg-dark text-white">Cancel Amount</td>
                            <td class="bg-dark text-white">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td><i class="lni lni-eye text-primary fw-bold"></i></td>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
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