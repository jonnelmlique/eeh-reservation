<?php
include '../src/config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomnumber = $_POST["add-room-number"];
    $roomname = $_POST["add-room-name"];
    $roominclusion = $_POST["add-room-inc"];
    $bedsavailable = $_POST["add-room-beds"];
    $deposit = $_POST["add-room-deposit"];

    $roomtype = $_POST["add-room-type"];
    $price = $_POST["add-price"];
    $reservationprice = $_POST["add-rprice"];

    $status = $_POST["add-status"];

    if (!empty($_FILES["add-image"]["name"])) {
        $targetDir = "../rooms/";
        $targetFilePath = $targetDir . basename($_FILES["add-image"]["name"]);
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $check = getimagesize($_FILES["add-image"]["tmp_name"]);
        if ($check !== false) {

            $allowedTypes = array("jpg", "jpeg", "png", "gif");
            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES["add-image"]["tmp_name"], $targetFilePath)) {
                    $image = basename($_FILES["add-image"]["name"]);
                } else {
                    $message = "Error uploading file.";
                    exit();
                }
            } else {
                $message = "Only JPG, JPEG, PNG, GIF files are allowed.";
                exit(); 
            }
        } else {
            $message = "File is not an image.";
            exit(); 
        }
    } else {
        $image = "";
    }

    $checkRoomNumberQuery = "SELECT * FROM room WHERE roomnumber = '$roomnumber'";
    $checkRoomNumberResult = $conn->query($checkRoomNumberQuery);
    if ($checkRoomNumberResult->num_rows > 0) {
        $message = "Room number already exists.";
        echo json_encode(array("message" => $message));
        exit();
    }

    $sql = "INSERT INTO room (roomnumber, roomname, roominclusion, bedsavailable, deposit, roomtype, price, reservationprice,  status, image) 
            VALUES ('$roomnumber', '$roomname', '$roominclusion', '$bedsavailable', '$deposit', '$roomtype', '$price',  '$reservationprice', '$status', '$image')";

    if ($conn->query($sql) === TRUE) {
        $message = "success";
    } else {
        $message = "Error: " . $conn->error;
    }

    echo json_encode(array("message" => $message));
    exit();
}
?>