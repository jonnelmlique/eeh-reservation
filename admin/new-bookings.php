<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | New Bookings</title>

    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <link href="../styles/booking.css" rel="stylesheet" />
    <link href="../styles/scrollbar.css" rel="stylesheet" />
    <link href="../styles/admin/newbookings.css" rel="stylesheet" />

</head>

<body>
    <?php include ("components/header.php"); ?>

    <div class="row w-100">
        <div class="col-lg-1">
            <?php include ("components/sidebar.php"); ?>
        </div>

        <div class="col-lg-8 bg-white shadow-lg">
            <div class="px-4">
                <h4 class="fw-bold text-uppercase">&gt; New Bookings</h4>
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
                            <td class="bg-dark text-white">Booking Details</td>
                            <td class="bg-dark text-white">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>1</td>
                            <td>
                                <p>
                                    <b>Booking ID</b>: 123456<br />
                                    <b>Name</b>: John Doe<br />
                                    <b>Phone No.</b>: 123456
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Room Type</b>: Deluxe<br />
                                    <b>Room No.</b>: DR101<br />
                                    <b>Price</b>: Php10,000
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Check-In</b>: 01-22-24<br />
                                    <b>Check-Out</b>: 01-26-24<br />
                                    <b>Paid</b>: Php2,000<br />
                                    <b>Date</b>: 01-26-24
                                </p>
                            </td>
                            <td>
                                <button class="btn btn-success w-100" style="border-radius: 8px" data-bs-toggle="modal"
                                    data-bs-target="#confirmModal">Confirm</button><br />
                                <button class="btn btn-danger w-100 mt-2" style="border-radius: 8px"
                                    data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</button>
                            </td>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr> -->
                        <?php
                        include '../src/config/config.php';

                        $sql = "SELECT rp.*, r.roomtype, r.roomnumber AS roomno 
        FROM reservationprocess rp 
        INNER JOIN room r ON rp.roomid = r.roomid";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["recervationprocessid"] . "</td>";
                                echo "<td>";
                                echo "<b>Booking ID</b>: " . $row["recervationprocessid"] . "<br />";
                                echo "<b>Name</b>: " . $row["firstname"] . " " . $row["lastname"] . "<br />";
                                echo "<b>Phone No.</b>: " . $row["mobilenumber"];
                                echo "</td>";
                                echo "<td>";
                                echo "<b>Room Type</b>: " . $row["roomtype"] . "<br />";
                                echo "<b>Room No.</b>: " . $row["roomno"] . "<br />";
                                echo "<b>Price</b>: Php" . $row["price"];
                                echo "</td>";
                                echo "<td>";
                                echo "<b>Check-In</b>: " . $row["checkindate"] . " " . $row["checkintime"] . "<br />";
                                echo "<b>Check-Out</b>: " . $row["checkoutdate"] . " " . $row["checkouttime"] . "<br />";
                                echo "<b>Paid</b>: Php" . $row["reservationprice"] . "<br />";
                                echo "<b>Date</b>: " . $row["checkoutdate"];
                                echo "</td>";
                                echo "<td>";
                                echo "<button class='btn btn-success w-100' style='border-radius: 8px' data-bs-toggle='modal' data-bs-target='#confirmModal'>Confirm</button><br />";
                                echo "<button class='btn btn-danger w-100 mt-2' style='border-radius: 8px' data-bs-toggle='modal' data-bs-target='#cancelModal'>Cancel</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No reservations found</td></tr>";
                        }

                        // Close database connection
                        $conn->close();
                        ?>

                    </tbody>
                </table>
            </div>

            <br /><br />
        </div>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #FAEBD7">
                <div class="modal-body" align="center">
                    <br /><br />

                    <p>Are you sure you want to confirm?</p>
                    <br />
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn continue-btn">Continue</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #FAEBD7">
                <div class="modal-header" align="center">
                    <h5 class="modal-title fw-bold">Are you sure?</h5>
                </div>
                <div class="modal-body" align="center">
                    <p>You will not be able to undo this action!</p>
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