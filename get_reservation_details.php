<?php
include './src/config/config.php';

// Check if checkin date and checkout date are set in the POST request
if (isset($_POST['checkin_date']) && isset($_POST['checkout_date'])) {
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];

    // Prepare SQL query to select reservation details for the given date range and status
    $sql = "SELECT checkindate, checkoutdate FROM reservationprocess WHERE status IN ('Pending', 'Accepted') AND ((checkindate <= ? AND checkoutdate >= ?) OR (checkindate >= ? AND checkindate <= ?) OR (checkoutdate >= ? AND checkoutdate <= ?))";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $checkin_date, $checkin_date, $checkin_date, $checkout_date, $checkin_date, $checkout_date);

    // Execute the query
    $stmt->execute();

    // Store the result
    $stmt->store_result();

    // Bind result variables
    $stmt->bind_result($existing_checkin_date, $existing_checkout_date);

    // Initialize an array to store reserved dates
    $reserved_dates = array();

    // Fetch the result
    while ($stmt->fetch()) {
        // Store the existing check-in and check-out dates in the reserved_dates array
        $reserved_dates[] = array('checkin_date' => $existing_checkin_date, 'checkout_date' => $existing_checkout_date);
    }

    // Close statement
    $stmt->close();

    // Echo the reserved dates as JSON
    echo json_encode($reserved_dates);
} else {
    // Handle error if checkin date and checkout date are not set
    echo json_encode(array('error' => 'Check-in date and checkout date not provided'));
}

// Close the database connection
$conn->close();
?>