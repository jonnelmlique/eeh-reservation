<?php
include './src/config/config.php';

if (isset($_POST['roomtype'], $_POST['checkin'], $_POST['checkout'])) {
    $roomtype = $_POST['roomtype'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

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
    $uniqueFloors = [];

    while ($row = $result->fetch_assoc()) {
        $roomInfo[] = [
            'roomfloor' => $row['roomfloor'],
            'roomnumber' => $row['roomnumber']
        ];

        if (!in_array($row['roomfloor'], $uniqueFloors)) {
            $uniqueFloors[] = $row['roomfloor'];
        }
    }

    $response = [
        'roomInfo' => $roomInfo,
        'uniqueFloors' => $uniqueFloors
    ];

    echo json_encode($response);
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>