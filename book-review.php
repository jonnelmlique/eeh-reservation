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
        } else {
        }
    } else {
    }
}

?>
<?php

if (isset($_SESSION['guestuserid'])) {
    $guestuserid = $_SESSION['guestuserid'];

    $sql_check_cart = "SELECT * FROM reservationsummary WHERE guestuserid = '$guestuserid'";
    $result_check_cart = $conn->query($sql_check_cart);

    if ($result_check_cart->num_rows == 0) {
        header("Location: book-now.php");
        exit();
    }
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Book Review</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="styles/booking.css" rel="stylesheet" />
    <link href="styles/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/dashboard.css" rel="stylesheet" />
    <link href="styles/guest-details.css" rel="stylesheet" />
    <link href="styles/scrollbar.css" rel="stylesheet" />
</head>
<div><?php include ("componentshome/navbar.php"); ?>

    <div class="bg-white">
        <br /><br />
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h3 class="fw-bold">Almost Done! Review Your Stay</h3>
                    <img src="assets/step-3.png" width="100%" />
                    <br /><br />

                    <div class="border border-primary w-100 p-2 px-3" style="border-radius: 12px">
                        <br />
                        <?php
                        if (isset($_SESSION['guestuserid'])) {
                            $guestuserid = $_SESSION['guestuserid'];

                            $sql = "SELECT bc.*, r.roomtype 
                FROM reservationsummary bc 
                INNER JOIN room r ON bc.roomid = r.roomid 
                WHERE bc.guestuserid = '$guestuserid'";
                            $result = $conn->query($sql);
                            $totalReservationPrice = 0;

                            echo "<h4 class='fw-bold text-uppercase'>Room Details</h4><br/>";

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $checkinDate = $row['checkindate'];
                                    $checkinTime = date("h:i A", strtotime($row['checkintime']));
                                    $checkoutDate = $row['checkoutdate'];
                                    $checkoutTime = date("h:i A", strtotime($row['checkouttime']));
                                    $roomtype = $row['roomtype'];
                                    $roomId = $row['roomid'];
                                    $reservationPrice = $row['reservationprice'];
                                    $totalReservationPrice += $reservationPrice;

                                    echo "<p><strong>Room Type:</strong> $roomtype</p>";
                                    echo "<p><strong>Check-in:</strong> $checkinDate $checkinTime</p>";
                                    echo "<p><strong>Check-out:</strong> $checkoutDate $checkoutTime</p>";
                                    echo "<p><strong>Reservation Price:</strong> ₱" . number_format($reservationPrice, 2) . "</p>";
                                    echo "<hr>";
                                }

                                echo "<p><strong>Total Reservation Price:</strong> ₱" . number_format($totalReservationPrice, 2) . "</p>";
                            } else {
                                echo "<p>No bookings found.</p>";
                            }
                        } else {
                            echo "<p>Guest user ID not found in session.</p>";
                        }
                        ?>

                        <br />
                        <div style="border-width: 1px; border-color: black; border-style: dashed"></div>

                        <br /><br />
                        <?php
                        if (isset($_SESSION['guestuserid'])) {
                            $guestuserid = $_SESSION['guestuserid'];

                            $sql = "SELECT * FROM guestdetails WHERE guestuserid = '$guestuserid' ORDER BY guestid DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "<h4 class='fw-bold text-uppercase'>Guest Information</h4><br/>";
                                echo "<table class='table'>";
                                echo "<thead><tr><th></th><th></th></tr></thead>";
                                echo "<tbody>";
                                $row = $result->fetch_assoc(); // Fetch only one row
                                $namePrefix = $row['prefix'] . ' ' . $row['firstname'] . ' ' . $row['lastname'] . ' ' . $row['suffix'];
                                echo "<tr><td>Name:</td><td>" . $namePrefix . "</td></tr>";
                                echo "<tr><td>Mobile Number</td><td>" . $row['mobilenumber'] . "</td></tr>";
                                echo "<tr><td>Email Address</td><td>" . $row['emailaddress'] . "</td></tr>";
                                echo "<tr><td>Country</td><td>" . $row['country'] . "</td></tr>";
                                echo "<tr><td>Address</td><td>" . $row['address'] . "</td></tr>";
                                echo "<tr><td>City</td><td>" . $row['city'] . "</td></tr>";
                                echo "<tr><td>Zip Code</td><td>" . $row['zipcode'] . "</td></tr>";
                                echo "</tbody>";
                                echo "</table>";
                            } else {
                                echo "<p>No guest information found.</p>";
                            }
                        } else {
                            echo "<p>Guest user ID not found in session.</p>";
                        }


                        ?>

                        <br />
                        <div style="border-width: 1px; border-color: black; border-style: dashed"></div>

                        <br /><br />
                        <h4 class="fw-bold text-uppercase">Terms &amp; Conditions</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                            in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <br />
                    </div>
                    <br />




                    <div class="p-2 w-100 border border-primary" style="border-radius: 8px">
                        <?php
                        if (isset($_SESSION['guestuserid'])) {
                            $guestuserid = $_SESSION['guestuserid'];

                            $sql = "SELECT bc.*, r.roomtype 
                        FROM reservationsummary bc 
                        INNER JOIN room r ON bc.roomid = r.roomid 
                        WHERE bc.guestuserid = '$guestuserid'";
                            $result = $conn->query($sql);
                            $totalReservationPrice = 0;

                            echo "<h4 class='fw-bold text-uppercase mt-2' align='center'>Your Booking Summary</h4>";

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $checkinDate = $row['checkindate'];
                                    $checkinTime = date("h:i A", strtotime($row['checkintime']));
                                    $checkinDay = date("l", strtotime($checkinDate));
                                    $checkoutDate = $row['checkoutdate'];
                                    $checkoutTime = date("h:i A", strtotime($row['checkouttime']));
                                    $checkoutDay = date("l", strtotime($checkoutDate));
                                    $roomtype = $row['roomtype'];
                                    $roomfloor = $row['roomfloor'];
                                    $roomnumber = $row['roomnumber'];
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
                            <label>Room Floor:</label>
                                <small class='text-primary'>$roomfloor</small>
                            </div>
                            <div class='col-6'>
                            <label>Room Number:</label>
                            <small class='text-primary'>$roomnumber</small>
                            </div>
                        </div>  
                            <div class='row pt-4' align='center'>
                                <div class='col-6'>
                                    <small class='text-primary'>$roomtype</small>
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

                            } else {
                                echo "<div align='center'>No bookings found.</div>";
                            }
                        } else {
                            echo "Guest user ID not found in session.";
                        }
                        ?>
                    </div>
                </div>
                <br />
                <select class="form-control" id="paymentMethod" name="paymentMethod">
                    <option value="PayPal">PayPal</option>
                    <option value="gcashqr">GCash QR</option>
                </select>

                <div class="btnpaypal" id="paypal-button-container" style="max-width: 50%; margin: 20px auto 0 220px;">
                </div>

                <br />
                <button id="proceedButton" class="btn continue-btn w-100 text-uppercase"
                    style="border-radius: 8px">Continue</button>
            </div>

        </div>

        <div class=" col-4">
        </div>
    </div>
</div>
</div>
</div>
<br /><br />
</div>
<script
    src="https://www.paypal.com/sdk/js?client-id=AS4sEArJLWv67KwtFroZxWfiRZvI_X2Tuc899WJvoHsL96xjHUFdw5m-TGP02kafr5y37nXZGVQfbNGI&currency=PHP&disable-funding=card"
    data-sdk-integration-source="button-factory"></script>

<script src="scripts/jquery.min.js"></script>
<script src="scripts/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php include ("components/footer.php"); ?>
<script>
document.getElementById("proceedButton").addEventListener("click", function() {
    console.log("Clicked Proceed to Checkout button");

    var paymentMethod = document.getElementById("paymentMethod").value;
    if (paymentMethod === "PayPal") {
        var container = document.getElementById("paypal-button-container");
        container.innerHTML = "";

        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            currency_code: 'PHP',
                            value: '<?php echo $totalReservationPrice; ?>'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    var transactionID = details.id;

                    console.log("Transaction ID:", transactionID);

                    var xhrBookingCart = new XMLHttpRequest();
                    xhrBookingCart.open("GET", "get_roomid.php",
                        true); // Corrected file name
                    xhrBookingCart.onreadystatechange = function() {
                        if (xhrBookingCart.readyState === 4 && xhrBookingCart.status ===
                            200) {
                            var bookingCartData = JSON.parse(xhrBookingCart
                                .responseText);
                            var roomids = [];
                            var roomfloor = [];
                            var roomnumber = [];
                            var adults = [];
                            var children = [];
                            var checkindates = [];
                            var checkintimes = [];
                            var checkoutdates = [];
                            var checkouttimes = [];
                            var prices = [];
                            var reservationprices = [];
                            var totalreservationprice =
                                '<?php echo $totalReservationPrice; ?>';


                            for (var i = 0; i < bookingCartData.length; i++) {
                                roomids.push(bookingCartData[i].roomid);
                                roomfloor.push(bookingCartData[i].roomfloor);
                                roomnumber.push(bookingCartData[i].roomnumber);
                                adults.push(bookingCartData[i].adults);
                                children.push(bookingCartData[i].children);
                                checkindates.push(bookingCartData[i].checkindate);
                                checkintimes.push(bookingCartData[i].checkintime);
                                checkoutdates.push(bookingCartData[i].checkoutdate);
                                checkouttimes.push(bookingCartData[i].checkouttime);
                                prices.push(bookingCartData[i].price);
                                reservationprices.push(bookingCartData[i]
                                    .reservationprice);
                            }

                            var guestuserid =
                                '<?php echo $_SESSION['guestuserid']; ?>';

                            var xhrBooking = new XMLHttpRequest();
                            xhrBooking.open("POST", "insert_booking.php", true);
                            xhrBooking.setRequestHeader("Content-Type",
                                "application/x-www-form-urlencoded");
                            xhrBooking.onreadystatechange = function() {
                                if (xhrBooking.readyState === 4 && xhrBooking
                                    .status === 200) {
                                    console.log(xhrBooking.responseText);

                                }
                            };
                            var bookingData =
                                "transactionID=" + transactionID +
                                "&roomids=" + roomids.join(',') +
                                "&roomfloor=" + roomfloor.join(',') +
                                "&roomnumber=" + roomnumber.join(',') +

                                "&adults=" + adults.join(',') +
                                "&children=" + children.join(',') +
                                "&checkindates=" + checkindates.join(',') +
                                "&checkintimes=" + checkintimes.join(',') +
                                "&checkoutdates=" + checkoutdates.join(',') +
                                "&checkouttimes=" + checkouttimes.join(',') +
                                "&prices=" + prices.join(',') +
                                "&reservationprices=" + reservationprices.join(',') +
                                "&totalreservationprice=" + totalreservationprice +
                                "&paymentMethod=" + paymentMethod +
                                "&guestuserid=" +
                                guestuserid;
                            console.log("Booking Data:", bookingData);
                            xhrBooking.send(bookingData);

                        }
                    };
                    xhrBookingCart.send();
                    window.location.href =
                        'transactioncomplete.php';
                });


            }
        }).render('#paypal-button-container');
    } else if (paymentMethod === "gcashqr") {
        window.location.href = 'transactioncomplete.php';
    } else {
        alert("Proceeding with other payment method.");
    }
});
</script>





</body>

</html>