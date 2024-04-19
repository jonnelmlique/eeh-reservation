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
    $roomfloor = $_POST['floorSelect'];
    $roomnumber = $_POST['roomNumberSelect'];
    $adults = $_POST['add-adults'];
    $children = $_POST['add-children'];
    $checkindate = $_POST['checkInDate'];
    $checkintime = $_POST['checkInTime'];
    $checkoutdate = $_POST['checkOutDate'];
    $checkouttime = $_POST['checkOutTime'];
    $price = $_POST['price']; 
    $reservationprice = $_POST['reservationprice']; 
    
    $sql = "INSERT INTO reservationsummary (guestuserid, roomid, roomfloor, roomnumber, adults, children, checkindate, checkintime, checkoutdate, checkouttime, price, reservationprice) 
            VALUES ('$guestuserid', '$roomid', '$roomfloor', '$roomnumber', '$adults', '$children', '$checkindate', '$checkintime', '$checkoutdate', '$checkouttime', '$price', '$reservationprice')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successfully added!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Form submission error!";
}
?>