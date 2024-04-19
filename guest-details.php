<?php
session_start();
include './src/config/config.php';

if (!isset($_SESSION['data_inserted'])) {
    $sql = "INSERT INTO guestusers () VALUES ()";
    if ($conn->query($sql) === TRUE) {
        $sql_select = "SELECT guestuserid FROM guestusers ORDER BY timestamp_column DESC LIMIT 1";
        $result = $conn->query($sql_select);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $guestuserid = $row['guestuserid'];
            $_SESSION['guestuserid'] = $guestuserid;
            $_SESSION['data_inserted'] = true;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $prefix = $_POST['prefix'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $suffix = $_POST['suffix'];
    $mobileNumber = $_POST['mobile_number'];
    $emailAddress = $_POST['email_address'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    // Insert guest details into the database
    $sql = "INSERT INTO guestdetails (guestuserid, prefix, firstname, lastname, suffix, mobilenumber, emailaddress, country, address, city, zipcode) 
            VALUES ('" . $_SESSION['guestuserid'] . "', '$prefix', '$firstName', '$lastName', '$suffix', '$mobileNumber', '$emailAddress', '$country', '$address', '$city', '$zip')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to book-review.php after successful insertion
        header("Location: book-review.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Guest Details</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="styles/booking.css" rel="stylesheet" />
    <link href="styles/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/dashboard.css" rel="stylesheet" />
    <link href="styles/guest-details.css" rel="stylesheet" />
    <link href="styles/scrollbar.css" rel="stylesheet" />
</head>

<div> <?php include ("componentshome/navbar.php"); ?>

    <div class="bg-white">
        <br /><br />
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h3 class="fw-bold">Guest Details</h3>
                    <img src="assets/step-2.png" width="100%" />
                    <br /><br />

                    <div class="border border-primary w-100 p-2 px-3" style="border-radius: 12px">
                        <br />
                        <h4 class="fw-bold">Contact Info</h4>
                        <form method="post" class="needsvalidation">
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" class="form-control" name="prefix" placeholder="Prefix" />
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name"
                                        required />
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                        required />
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" name="suffix" placeholder="Suffix" />
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" class="form-control" name="mobile_number"
                                        placeholder="Mobile Number" required />
                                </div>
                                <div class="col-6">
                                    <input type="email" class="form-control" name="email_address"
                                        placeholder="Email Address" required />
                                </div>
                            </div>
                            <br /><br />

                            <h4 class="fw-bold">Address</h4>
                            <div class="row">
                                <div class="col-4">
                                    <input type="text" class="form-control" name="country" placeholder="Country"
                                        required />
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" name="address" placeholder="Address"
                                        required />
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" name="city" placeholder="City" required />
                                </div>
                                <div class="col-4">
                                    <input type="number" class="form-control" name="zip" placeholder="Zip Postal Code"
                                        required />
                                </div>
                            </div>

                            <button type="submit" class="btn continue-btn w-100 text-uppercase"
                                style="border-radius: 8px; margin-top: 15px;">Continue to Book</button>
                        </form>
                    </div>
                </div>

                <?php
                if (isset($_SESSION['guestuserid'])) {
                    $guestuserid = $_SESSION['guestuserid'];

                    $sql = "SELECT bc.*, r.roomname 
                                FROM reservationsum bc 
                                INNER JOIN room r ON bc.roomid = r.roomid 
                                WHERE bc.guestuserid = '$guestuserid'";
                    $result = $conn->query($sql);
                    $totalReservationPrice = 0;

                    echo "<div class='col-4'>
                                <div class='p-2 w-100 border border-primary border-2' style='border-radius: 8px'>
                                    <h4 class='fw-bold text-uppercase mt-2' align='center'>Your Booking Summary</h4>
                                    <hr class='mt-2 mx-3' />";

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $checkinDate = $row['checkindate'];
                            $checkinTime = date("h:i A", strtotime($row['checkintime']));
                            $checkinDay = date("l", strtotime($checkinDate));
                            $checkoutDate = $row['checkoutdate'];
                            $checkoutTime = date("h:i A", strtotime($row['checkouttime']));
                            $checkoutDay = date("l", strtotime($checkoutDate));
                            $roomName = $row['roomname'];
                            $reservationPrice = $row['reservationprice'];
                            $totalReservationPrice += $reservationPrice;

                            echo "<div class='row mx-2 pt-2'>
                                        <div class='col-6' align='center'>
                                            <b class='text-uppercase'>Check-in</b><br />
                                            <small>$checkinDay, $checkinDate $checkinTime</small>
                                        </div>
                                        <div class='col-6' align='center'>
                                            <b class='text-uppercase'>Check-out</b><br />
                                            <small>$checkoutDay, $checkoutDate $checkoutTime</small>
                                        </div>
                                    </div>
                                    <div class='row pt-4' align='center'>
                                        <div class='col-6'>
                                            <small class='text-primary'>$roomName</small>
                                        </div>
                                        <div class='col-6'>
                                            <small>₱" . number_format($reservationPrice, 2) . "</small>
                                        </div>
                                    </div>
                                    <div align='center'>
                                        <div class='row w-75 pt-4'>
                                        </div>
                                        <hr class='mt-2 mx-3' />";
                        }
                        echo "<div class='row mx-2 pt-2'>
                                    <div class='col-6'><b>Total</b></div>
                                    <div class='col-6' align='right'>₱" . number_format($totalReservationPrice, 2) . "</div>
                                </div>";

                        echo "</div></div></div>";
                        echo "</div>";
                    } else {
                        echo "<div align='center'>No bookings found.</div>";
                    }
                } else {
                    echo "Guest user ID not found in session.";
                }
                ?>
            </div>
        </div>
    </div>
    <br /><br />
</div>


<script src="scripts/jquery.min.js"></script>
<script src="scripts/bootstrap.bundle.min.js"></script>

<?php include ("components/footer.php"); ?>
</body>

</html>