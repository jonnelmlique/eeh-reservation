<?php
include './src/config/config.php'; // Include your database configuration

if (isset($_POST['roomtype'], $_POST['checkin'], $_POST['checkout'])) {
    $roomtype = $_POST['roomtype'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Fetch roomfloor and roomnumber based on roomtype and availability
    $sql = "SELECT DISTINCT ri.roomfloor, ri.roomnumber
            FROM roominfo ri
            LEFT JOIN reservationprocess rp ON ri.roomnumber = rp.roomnumber
            AND ((rp.checkindate <= '$checkin' AND rp.checkoutdate >= '$checkin')
            OR (rp.checkindate BETWEEN '$checkin' AND '$checkout')
            OR (rp.checkoutdate BETWEEN '$checkin' AND '$checkout'))
            WHERE ri.roomtype = '$roomtype'
            AND (rp.status IS NULL OR rp.status NOT IN ('Pending', 'Accepted'))";
    $result = $conn->query($sql);
    $roomInfo = [];
    $uniqueFloor = null; // Initialize unique floor variable
    $prevFloor = null; // Initialize previous floor variable

    while ($row = $result->fetch_assoc()) {
        $roomInfo[] = [
            'roomfloor' => $row['roomfloor'],
            'roomnumber' => $row['roomnumber']
        ];

        // Check if the floor is the same as the previous one
        if ($prevFloor !== null && $prevFloor !== $row['roomfloor']) {
            $uniqueFloor = null; // If not, set unique floor to null
        } else {
            $uniqueFloor = $row['roomfloor']; // Otherwise, set it to the current floor
        }

        $prevFloor = $row['roomfloor']; // Update previous floor
    }

    // Prepare response
    $response = [
        'roomInfo' => $roomInfo, // Include room floor and number in the response
        'uniqueFloor' => $uniqueFloor // Include unique floor in the response
    ];

    // Send JSON response
    echo json_encode($response);
} else {
    // Handle invalid request
    echo json_encode(['error' => 'Invalid request']);
}
?>