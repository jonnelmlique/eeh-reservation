<?php
// Include the database connection file
include "../src/config/config.php";

// Check if room_id is set and is a valid integer
if (isset($_POST['room_id']) && filter_var($_POST['room_id'], FILTER_VALIDATE_INT)) {
    // Check if the request is for fetching room information or updating room information
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        // Update room information
        $room_id = $_POST['room_id'];
        $room_type = $_POST['room_type'];
        $room_inc = $_POST['room_inc'];
        $beds_available = $_POST['beds_available'];
        $max_occupancy = $_POST['max_occupancy'];
        $deposit = $_POST['deposit'];
        $price = $_POST['price'];
        $reservation_price = $_POST['reservation_price'];
        $status = $_POST['status'];


        
        // Prepare and execute an UPDATE statement
        $query = "UPDATE room SET roomtype=?, roominclusion=?, bedsavailable=?, maxoccupancy=?, deposit=?, price=?, reservationprice=?, status=?";
        $params = "sssiidds";
        $param_values = array($room_type, $room_inc, $beds_available, $max_occupancy, $deposit, $price, $reservation_price, $status);

        // Check if a new image file is uploaded
        if (isset($_FILES['edit-image']) && $_FILES['edit-image']['error'] === UPLOAD_ERR_OK) {
            // Handle image upload
            $target_dir = "../rooms/";
            $target_file = $target_dir . basename($_FILES['edit-image']['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES['edit-image']['tmp_name']);
            if ($check !== false) {
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo json_encode(array('error' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'));
                    exit();
                }
            } else {
                echo json_encode(array('error' => 'File is not an image.'));
                exit();
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo json_encode(array('error' => 'Sorry, your file was not uploaded.'));
                exit();
            } else {
                // if everything is ok, try to upload file
                if (move_uploaded_file($_FILES['edit-image']['tmp_name'], $target_file)) {
                    // Update image path in the database
                    $image_path = basename($_FILES['edit-image']['name']);
                    $query .= ", image=?";
                    $params .= "s";
                    array_push($param_values, $image_path);
                } else {
                    echo json_encode(array('error' => 'Sorry, there was an error uploading your file.'));
                    exit();
                }
            }
        }

        $query .= " WHERE roomid=?";
        $params .= "i";
        array_push($param_values, $room_id);

        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param($params, ...$param_values);
            if ($stmt->execute()) {
                echo json_encode(array('success' => 'Room information updated successfully.'));
            } else {
                echo json_encode(array('error' => 'Error updating room information.'));
            }
            $stmt->close();
        } else {
            echo json_encode(array('error' => 'Error preparing the update statement.'));
        }
    } else {
        // Fetch room information
        $room_id = $_POST['room_id'];
        $query = "SELECT * FROM room WHERE roomid = ?";
        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("i", $room_id);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo json_encode($row);
                } else {
                    echo json_encode(array('error' => 'No room found with the provided ID.'));
                }
            } else {
                echo json_encode(array('error' => 'Error executing the fetch statement.'));
            }
            $stmt->close();
        } else {
            echo json_encode(array('error' => 'Error preparing the fetch statement.'));
        }
    }
} else {
    echo json_encode(array('error' => 'Invalid or missing room_id parameter.'));
}

// Close the database connection
$conn->close();
?>