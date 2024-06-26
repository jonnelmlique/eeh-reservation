<?php
session_start();

if (isset($_SESSION['guestuserid'])) {
    // Retrieve guestuserid from session
    $guestuserid = $_SESSION['guestuserid'];

    include './src/config/config.php';

    $sql = "SELECT roomid, adults, children, checkindate, checkintime, checkoutdate, checkouttime, price, reservationprice FROM reservationsum WHERE guestuserid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $guestuserid);
    $stmt->execute();
    $result = $stmt->get_result();

    $bookingCartData = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookingCartData[] = $row; // Push each row into the array
        }
    }

    $stmt->close();
    $conn->close();

    echo json_encode($bookingCartData); // Encode all data as JSON
} else {
    echo "Guest user ID not found in session.";
}
?>