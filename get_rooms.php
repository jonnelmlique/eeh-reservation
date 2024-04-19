<?php
// Define database connection constants
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hotelreservation');

// Establish a database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Check if roomType is set and not empty
if (isset($_POST['roomType']) && !empty($_POST['roomType'])) {
    // Sanitize the input to prevent SQL injection
    $roomType = $conn->real_escape_string($_POST['roomType']);

    // Prepare SQL query to fetch roomfloor and roomnumber based on roomtype
    $query = "SELECT roominfo.roomfloor, roominfo.roomnumber 
              FROM roominfo 
              JOIN room ON roominfo.roomtype = room.roomtype 
              WHERE room.roomtype = ?";

    // Prepare and execute the statement
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $roomType);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the results into an associative array
        $rooms = $result->fetch_all(MYSQLI_ASSOC);

        // Prepare the response data
        $response = ['floorRooms' => [], 'roomNumbers' => []];
        foreach ($rooms as $room) {
            $response['floorRooms'][] = $room['roomfloor'];
            $response['roomNumbers'][] = $room['roomnumber'];
        }

        // Send the response back to the client-side as JSON
        echo json_encode($response);
    } else {
        echo "ERROR: Unable to prepare SQL statement.";
    }
} else {
    echo "ERROR: No room type provided.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>