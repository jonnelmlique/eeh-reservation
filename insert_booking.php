<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/contact/Exception.php';
require './src/contact/PHPMailer.php';
require './src/contact/SMTP.php';

if (
    isset($_POST['transactionID']) && isset($_POST['roomids']) && isset($_POST['guestuserid']) && isset($_POST['roomfloor']) && isset($_POST['roomnumber']) &&
    isset($_POST['adults']) && isset($_POST['children']) && isset($_POST['checkindates']) &&
    isset($_POST['checkintimes']) && isset($_POST['checkoutdates']) && isset($_POST['checkouttimes']) &&
    isset($_POST['prices']) && isset($_POST['reservationprices']) && isset($_POST['totalreservationprice']) &&
    isset($_POST['paymentMethod'])
) {
    include_once './src/config/config.php';

    $transactionID = mysqli_real_escape_string($conn, $_POST['transactionID']);
    $roomids = mysqli_real_escape_string($conn, $_POST['roomids']);
    $guestuserid = mysqli_real_escape_string($conn, $_POST['guestuserid']);
    $roomfloor = mysqli_real_escape_string($conn, $_POST['roomfloor']);
    $roomnumber = mysqli_real_escape_string($conn, $_POST['roomnumber']);


    $adults = mysqli_real_escape_string($conn, $_POST['adults']);
    $children = mysqli_real_escape_string($conn, $_POST['children']);
    $checkindates = mysqli_real_escape_string($conn, $_POST['checkindates']);
    $checkintimes = mysqli_real_escape_string($conn, $_POST['checkintimes']);
    $checkoutdates = mysqli_real_escape_string($conn, $_POST['checkoutdates']);
    $checkouttimes = mysqli_real_escape_string($conn, $_POST['checkouttimes']);
    $prices = mysqli_real_escape_string($conn, $_POST['prices']);
    $reservationprices = mysqli_real_escape_string($conn, $_POST['reservationprices']);
    $totalreservationprice = mysqli_real_escape_string($conn, $_POST['totalreservationprice']);
    $paymentMethod = mysqli_real_escape_string($conn, $_POST['paymentMethod']);

    // Check if roomnumber is unique
    // Check if roomnumber already exists
    $sql_check_roomnumber = "SELECT roomnumber FROM reservationprocess WHERE roomnumber = '$roomnumber'";
    $result_check_roomnumber = mysqli_query($conn, $sql_check_roomnumber);
    if (mysqli_num_rows($result_check_roomnumber) > 0) {
        echo "Error: Room number already exists.";
        exit();
    }

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
    $roomfloorArray = explode(',', $roomfloor);
    $roomnumberArray = explode(',', $roomnumber);


    $adultsArray = explode(',', $adults);
    $childrenArray = explode(',', $children);
    $checkindatesArray = explode(',', $checkindates);
    $checkintimesArray = explode(',', $checkintimes);
    $checkoutdatesArray = explode(',', $checkoutdates);
    $checkouttimesArray = explode(',', $checkouttimes);
    $pricesArray = explode(',', $prices);
    $reservationpricesArray = explode(',', $reservationprices);

    // Construct the SQL query
    $sql = "INSERT INTO reservationprocess (transactionid, roomid, guestuserid, roomfloor, roomnumber, adults, children, checkindate, checkintime, checkoutdate, checkouttime, price, reservationprice, totalreservationprice, prefix, firstname, lastname, suffix, mobilenumber, emailaddress, country, address, city, zipcode, status, paymentmethod) VALUES ";

    // Iterate over each room and add values to the query
    for ($i = 0; $i < count($roomidsArray); $i++) {
        $roomid = isset($roomidsArray[$i]) ? mysqli_real_escape_string($conn, $roomidsArray[$i]) : '';
        $roomfloor = isset($roomfloorArray[$i]) ? mysqli_real_escape_string($conn, $roomfloorArray[$i]) : '';
        $roomnumber = isset($roomnumberArray[$i]) ? mysqli_real_escape_string($conn, $roomnumberArray[$i]) : '';

        $adult = isset($adultsArray[$i]) ? mysqli_real_escape_string($conn, $adultsArray[$i]) : '';
        $child = isset($childrenArray[$i]) ? mysqli_real_escape_string($conn, $childrenArray[$i]) : '';
        $checkindate = isset($checkindatesArray[$i]) ? mysqli_real_escape_string($conn, $checkindatesArray[$i]) : '';
        $checkintime = isset($checkintimesArray[$i]) ? mysqli_real_escape_string($conn, $checkintimesArray[$i]) : '';
        $checkoutdate = isset($checkoutdatesArray[$i]) ? mysqli_real_escape_string($conn, $checkoutdatesArray[$i]) : '';
        $checkouttime = isset($checkouttimesArray[$i]) ? mysqli_real_escape_string($conn, $checkouttimesArray[$i]) : '';
        $price = isset($pricesArray[$i]) ? mysqli_real_escape_string($conn, $pricesArray[$i]) : '';
        $reservationprice = isset($reservationpricesArray[$i]) ? mysqli_real_escape_string($conn, $reservationpricesArray[$i]) : '';

        // Add values to the query
        $sql .= "('$transactionID', '$roomid', '$guestuserid', '$roomfloor', '$roomnumber', '$adult', '$child', '$checkindate', '$checkintime', '$checkoutdate', '$checkouttime', '$price', '$reservationprice', '$totalreservationprice', '$prefix', '$firstname', '$lastname', '$suffix', '$mobilenumber', '$emailaddress', '$country', '$address', '$city', '$zipcode', 'Pending', '$paymentMethod'),";
    }

    // Remove the trailing comma from the query
    $sql = rtrim($sql, ',');

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {

        // Update room status to Reserved for each booked room
        for ($i = 0; $i < count($roomnumberArray); $i++) {
            $roomnumber = mysqli_real_escape_string($conn, $roomnumberArray[$i]);

            // Construct and execute the SQL update statement
            $sql_update_room_status = "UPDATE roominfo SET status = 'Reserved' WHERE roomnumber = '$roomnumber'";
            mysqli_query($conn, $sql_update_room_status);
        }

        $sql_delete_guest = "DELETE FROM guestdetails WHERE guestuserid = '$guestuserid'";
        $sql_delete_bookingcart = "DELETE FROM reservationsummary WHERE guestuserid = '$guestuserid'";

        mysqli_query($conn, $sql_delete_guest);
        mysqli_query($conn, $sql_delete_bookingcart);

        try {
            $mail = new PHPMailer(true);

            // Configure PHPMailer settings here
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'enchantedescapescontact@gmail.com'; // Your Gmail username
            $mail->Password = 'mqgqeokllxumgpzu'; // Your Gmail password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('enchantedescapescontact@gmail.com', 'Your Name');
            $mail->addAddress($emailaddress); // Use the user's email address
            $mail->isHTML(true);

            $mail->Subject = 'Booking Confirmation';
            $mail->Body = 'Hello ' . $firstname . ',<br><br>Your booking has been confirmed. Thank you for choosing our service.<br><br>' .
                'Transaction ID: ' . $transactionID . '<br>' .
                'Room ID: ' . $roomids . '<br>' .
                'Room Floor: ' . $roomfloor . '<br>' .
                'Room Number: ' . $roomnumber . '<br>' .
                'Adults: ' . $adults . '<br>' .
                'Children: ' . $children . '<br>' .
                'Check-in Date: ' . $checkindates . '<br>' .
                'Check-in Time: ' . $checkintimes . '<br>' .
                'Checkout Date: ' . $checkoutdates . '<br>' .
                'Checkout Time: ' . $checkouttimes . '<br>' .
                'Price: ' . $prices . '<br>' .
                'Reservation Price: ' . $reservationprices . '<br>' .
                'Total Reservation Price: ' . $totalreservationprice . '<br>' .
                'Prefix: ' . $prefix . '<br>' .
                'First Name: ' . $firstname . '<br>' .
                'Last Name: ' . $lastname . '<br>' .
                'Suffix: ' . $suffix . '<br>' .
                'Mobile Number: ' . $mobilenumber . '<br>' .
                'Email Address: ' . $emailaddress . '<br>' .
                'Country: ' . $country . '<br>' .
                'Address: ' . $address . '<br>' .
                'City: ' . $city . '<br>' .
                'Zipcode: ' . $zipcode . '<br>' .
                'Payment Method: ' . $paymentMethod . '<br>';

            // Send the email
            $mail->send();
        } catch (Exception $e) {
            echo "Error sending email: " . $e->getMessage();
        }

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
<script>
    // JavaScript code remains unchanged
</script>