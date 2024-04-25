<?php
include './src/config/config.php';
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve testimonies data from the form
    $name = $_POST['nameornickname'];
    $message = $_POST['testimonies'];

    // Check if the transaction was successful
    // For demonstration purposes, assuming the transaction is successful
    $transactionSuccessful = true;

    if ($transactionSuccessful) {
        // Insert testimonies data into the database
        $guestuserid = isset($_SESSION['guestuserid']) ? $_SESSION['guestuserid'] : null;
        if ($guestuserid) {
            $stmt = $conn->prepare("INSERT INTO testimonies (guestuserid, name, message) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $guestuserid, $name, $message);
            $stmt->execute();
            $stmt->close();
            echo "Testimonies inserted successfully.";
        } else {
            echo "Error: Guest user ID not found.";
        }
    } else {
        echo "Error: Transaction not successful.";
    }
}
?>
