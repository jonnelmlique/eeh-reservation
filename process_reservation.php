<?php
session_start();

include './src/config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['guestuserid'])) {
        $guestuserid = $_SESSION['guestuserid'];
    } else {
        exit("Error: Guest user ID not found in session.");
    }
    $roomid = $_POST['roomid'];
    $adults = $_POST['add-adults'];
    $children = $_POST['add-children'];
    $checkindate = $_POST['checkInDate'];
    $checkintime = $_POST['checkInTime'];
    $checkoutdate = $_POST['checkOutDate'];
    $checkouttime = $_POST['checkOutTime'];
    $price = $_POST['price']; // Retrieve the price from the form
    $reservationprice = $_POST['reservationprice']; // Retrieve the reservation price from the form


    // Perform database insertion
    $sql = "INSERT INTO reservationsum (guestuserid, roomid, adults, children, checkindate, checkintime, checkoutdate, checkouttime, price, reservationprice) 
            VALUES ('$guestuserid', '$roomid', '$adults', '$children', '$checkindate', '$checkintime', '$checkoutdate', '$checkouttime', '$price', '$reservationprice')";

    if ($conn->query($sql) === TRUE) {
        // Insertion successful
        echo "Reservation successfully added!";
    } else {
        // Insertion failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    // If the form is not submitted
    echo "Form submission error!";
}
?>