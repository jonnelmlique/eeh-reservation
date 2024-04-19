<?php
include './src/config/config.php'; // Include your database configuration

if (isset($_POST['roomtype'])) {
    $roomtype = $_POST['roomtype'];

    // Fetch roomfloor and roomnumber based on roomtype
    $sql = "SELECT DISTINCT roomfloor FROM roominfo WHERE roomtype = '$roomtype'";
    $result = $conn->query($sql);
    $floors = [];
    while ($row = $result->fetch_assoc()) {
        $floors[] = $row['roomfloor'];
    }

    // Fetch room numbers and their statuses
    $sql = "SELECT roomnumber, status FROM roominfo WHERE roomtype = '$roomtype'";
    $result = $conn->query($sql);
    $roomNumbers = [];
    while ($row = $result->fetch_assoc()) {
        $roomNumbers[] = [
            'roomnumber' => $row['roomnumber'],
            'status' => $row['status']
        ];
    }

    // Prepare response
    $response = [
        'floors' => $floors,
        'roomNumbers' => $roomNumbers
    ];

    // Send JSON response
    echo json_encode($response);
} else {
    // Handle invalid request
    echo json_encode(['error' => 'Invalid request']);
}
?>