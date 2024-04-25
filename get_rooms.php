<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hotelreservation');

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("ERROR: Could not connect. " . $conn->connect_error);
}

if (isset($_POST['roomType']) && !empty($_POST['roomType'])) {
    $roomType = $conn->real_escape_string($_POST['roomType']);

    $query = "SELECT roominfo.roomfloor, roominfo.roomnumber 
              FROM roominfo 
              JOIN room ON roominfo.roomtype = room.roomtype 
              WHERE room.roomtype = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $roomType);
        $stmt->execute();
        $result = $stmt->get_result();

        $rooms = $result->fetch_all(MYSQLI_ASSOC);

        $response = ['floorRooms' => [], 'roomNumbers' => []];
        foreach ($rooms as $room) {
            $response['floorRooms'][] = $room['roomfloor'];
            $response['roomNumbers'][] = $room['roomnumber'];
        }

        echo json_encode($response);
    } else {
        echo "ERROR: Unable to prepare SQL statement.";
    }
} else {
    echo "ERROR: No room type provided.";
}

$stmt->close();
$conn->close();
?>