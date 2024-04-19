<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the POST request
    $roomid = $_POST['roomid'];
    $roomName = $_POST['roomName'];
    $roomType = $_POST['roomType'];
    $reservationPrice = $_POST['reservationPrice'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $checkInDate = $_POST['checkInDate'];
    $checkInTime = $_POST['checkInTime'];
    $checkOutDate = $_POST['checkOutDate'];
    $checkOutTime = $_POST['checkOutTime'];

    // Store data in session variables
    $_SESSION['reservation_data'] = array(
        'roomid' => $roomid,
        'roomName' => $roomName,
        'roomType' => $roomType,
        'reservationPrice' => $reservationPrice,
        'adults' => $adults,
        'children' => $children,
        'checkInDate' => $checkInDate,
        'checkInTime' => $checkInTime,
        'checkOutDate' => $checkOutDate,
        'checkOutTime' => $checkOutTime
    );

    // Send a success response
    echo json_encode(array('success' => true));
} else {
    // If the request method is not POST, send an error response
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Method Not Allowed'));
}
?>