<?php
include '../src/config/config.php';
$searchText = $_POST['search'];

$sql = "SELECT rp.*, r.roomtype, rp.roomnumber AS roomno, rp.roomfloor 
                        FROM reservationprocess rp 
                        INNER JOIN room r ON rp.roomid = r.roomid
                        WHERE rp.status = 'Pending'";


if (!empty($searchText)) {
    $searchText = strtolower($searchText); 
    $sql .= " AND (
        LOWER(rp.paymentmethod) LIKE '%$searchText%' OR 
        LOWER(r.roomtype) LIKE '%$searchText%' OR 
        LOWER(rp.roomnumber) LIKE '%$searchText%' OR 
        LOWER(rp.roomfloor) LIKE '%$searchText%' OR 
        LOWER(rp.transactionid) LIKE '%$searchText%' OR
        LOWER(rp.paymentmethod) LIKE '%$searchText%' OR
        LOWER(rp.status) LIKE '%$searchText%' OR  
        LOWER(rp.firstname) LIKE '%$searchText%' OR 
        LOWER(rp.lastname) LIKE '%$searchText%'
    )";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo "<b>Name</b>: " . $row["firstname"] . " " . $row["lastname"] . "<br />";
        echo "<b>Phone No</b>: " . $row["mobilenumber"] . "<br />";


        echo "</td>";
        echo "<td>";
        echo "<b>Room Type</b>: " . $row["roomtype"] . "<br />";
        echo "<b>Room No</b>: " . $row["roomno"] . "<br />";
        echo "<b>Room Floor</b>: " . $row["roomfloor"] . "<br />";
        echo "</td>";
        echo "<td>";
        echo "<b>Check-In</b>: " . $row["checkindate"] . " " . date("h:i A", strtotime($row["checkintime"])) . "<br />";
        echo "<b>Check-Out</b>: " . $row["checkoutdate"] . " " . date("h:i A", strtotime($row["checkouttime"])) . "<br />";
        echo "<b>Adults</b>: " . $row["adults"] . "<br />";
        echo "<b>Children</b>: " . $row["children"] . "<br />";
        echo "</td>";
        echo "<td>";
        echo "<b>Payment</b>: " . $row["paymentmethod"] . "<br />";
        echo "<b>Transaction id</b>: " . $row["transactionid"] . "<br />";
        echo "<b>Paid</b>: ₱" . number_format($row["reservationprice"], 2) . "<br />";

        echo "</td>";
        echo "<td>";
        echo "<button class='btn btn-success w-100 confirmBtn' data-id='" . $row["recervationprocessid"] . "' style='border-radius: 8px'>Confirm</button><br />";
        echo "<button class='btn btn-danger w-100 mt-2 cancelBtn' data-id='" . $row["recervationprocessid"] . "' style='border-radius: 8px'>Cancel</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No reservations found</td></tr>";
}

$conn->close();
?>