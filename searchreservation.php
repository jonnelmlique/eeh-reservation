<?php
// Include your database connection file here
include './src/config/config.php';

// Check if query parameter is set
if (isset($_POST['query'])) {
    // Get the search term
    $searchText = $_POST['query'];

    // Run your SQL query to search for reservation with given transaction ID
    // Assuming $conn is your database connection
    $query = "SELECT * FROM reservationprocess WHERE transactionid LIKE '%$searchText%'";
    $result = mysqli_query($conn, $query);

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch and display the results
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="reservationstatusdetails.php?transactionid=' . $row['transactionid'] . '">' . $row['transactionid'] . '</a><br>';
        }
    } else {
        echo 'No results found.';
    }
}
?>