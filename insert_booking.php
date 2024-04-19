<?php
if (
    isset($_POST['transactionID']) && isset($_POST['roomids']) && isset($_POST['guestuserid']) &&
    isset($_POST['adults']) && isset($_POST['children']) && isset($_POST['checkindates']) &&
    isset($_POST['checkintimes']) && isset($_POST['checkoutdates']) && isset($_POST['checkouttimes']) &&
    isset($_POST['prices']) && isset($_POST['reservationprices']) && isset($_POST['totalreservationprice']) &&
    isset($_POST['paymentMethod']) // New check for payment method
) {
    include_once './src/config/config.php';

    $transactionID = mysqli_real_escape_string($conn, $_POST['transactionID']);
    $roomids = mysqli_real_escape_string($conn, $_POST['roomids']);
    $guestuserid = mysqli_real_escape_string($conn, $_POST['guestuserid']);
    $adults = mysqli_real_escape_string($conn, $_POST['adults']);
    $children = mysqli_real_escape_string($conn, $_POST['children']);
    $checkindates = mysqli_real_escape_string($conn, $_POST['checkindates']);
    $checkintimes = mysqli_real_escape_string($conn, $_POST['checkintimes']);
    $checkoutdates = mysqli_real_escape_string($conn, $_POST['checkoutdates']);
    $checkouttimes = mysqli_real_escape_string($conn, $_POST['checkouttimes']);
    $prices = mysqli_real_escape_string($conn, $_POST['prices']);
    $reservationprices = mysqli_real_escape_string($conn, $_POST['reservationprices']);
    $totalreservationprice = mysqli_real_escape_string($conn, $_POST['totalreservationprice']);
    $paymentMethod = mysqli_real_escape_string($conn, $_POST['paymentMethod']); // Extracting payment method

    // Retrieve prefix and firstname from guestdetails table
    $sql_guest = "SELECT prefix, firstname, lastname, suffix, mobilenumber, emailaddress, country, address, city, zipcode FROM guestdetails WHERE guestuserid = '$guestuserid'";
    $result_guest = mysqli_query($conn, $sql_guest);
    $row_guest = mysqli_fetch_assoc($result_guest);
    $prefix = $row_guest['prefix'];
    $firstname = $row_guest['firstname'];
    $lastname = $row_guest['lastname'];
    $suffix = $row_guest['suffix'];
    $mobilenumber = $row_guest['mobilenumber'];
    $emailaddress = $row_guest['emailaddress'];
    $country = $row_guest['country'];
    $address = $row_guest['address'];
    $city = $row_guest['city'];
    $zipcode = $row_guest['zipcode'];

    $roomidsArray = explode(',', $roomids);
    $adultsArray = explode(',', $adults);
    $childrenArray = explode(',', $children);
    $checkindatesArray = explode(',', $checkindates);
    $checkintimesArray = explode(',', $checkintimes);
    $checkoutdatesArray = explode(',', $checkoutdates);
    $checkouttimesArray = explode(',', $checkouttimes);
    $pricesArray = explode(',', $prices);
    $reservationpricesArray = explode(',', $reservationprices);

    // Construct the SQL query
    $sql = "INSERT INTO reservationprocess (transactionid, roomid, guestuserid, adults, children, checkindate, checkintime, checkoutdate, checkouttime, price, reservationprice, totalreservationprice, prefix, firstname, lastname, suffix, mobilenumber, emailaddress, country, address, city, zipcode, status, paymentmethod) VALUES ";

    // Iterate over each room and add values to the query
    for ($i = 0; $i < count($roomidsArray); $i++) {
        $roomid = $roomidsArray[$i];
        $adult = $adultsArray[$i];
        $child = $childrenArray[$i];
        $checkindate = $checkindatesArray[$i];
        $checkintime = $checkintimesArray[$i];
        $checkoutdate = $checkoutdatesArray[$i];
        $checkouttime = $checkouttimesArray[$i];
        $price = $pricesArray[$i];
        $reservationprice = $reservationpricesArray[$i];
        $totalreservationprice = $totalreservationprice;

        // Add values to the query
        $sql .= "('$transactionID', '$roomid', '$guestuserid', '$adult', '$child', '$checkindate', '$checkintime', '$checkoutdate', '$checkouttime', '$price', '$reservationprice', '$totalreservationprice', '$prefix', '$firstname', '$lastname', '$suffix', '$mobilenumber', '$emailaddress', '$country', '$address', '$city', '$zipcode', 'Pending', '$paymentMethod'),";
    }

    // Remove the trailing comma from the query
    $sql = rtrim($sql, ',');

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {

        $sql_delete_guest = "DELETE FROM guestdetails WHERE guestuserid = '$guestuserid'";
        $sql_delete_bookingcart = "DELETE FROM reservationsum WHERE guestuserid = '$guestuserid'";

        mysqli_query($conn, $sql_delete_guest);
        mysqli_query($conn, $sql_delete_bookingcart);


        echo "Booking information inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Error: Some required fields are not set.";
}
?>