<?php
session_start();

include './src/config/config.php';
if (!isset($_SESSION['data_inserted'])) {
    $sql = "INSERT INTO guestusers () VALUES ()";
    if ($conn->query($sql) === TRUE) {
        $sql_select = "SELECT guestuserid FROM guestusers ORDER BY timestamp_column DESC LIMIT 1";
        $result = $conn->query($sql_select);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $guestuserid = $row['guestuserid'];
            $_SESSION['guestuserid'] = $guestuserid;
            $_SESSION['data_inserted'] = true;
        } else {
        }
    } else {
    }
}
$conn->close();
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="./styles/bootstrap.min.css" rel="stylesheet" />
    <link href="./styles/dashboard.css" rel="stylesheet" />
    <link href="./styles/scrollbar.css" rel="stylesheet" />
    <style>
    .container {
        text-align: center;
    }

    .checkmark {
        animation: checkmarkAnimation 1s ease forwards;
    }

    .message {
        font-size: 24px;
        font-weight: bold;
        margin-top: 20px;
    }

    @keyframes checkmarkAnimation {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        70% {
            transform: scale(1.5);
            opacity: 1;
        }

        100% {
            transform: scale(1);
        }
    }
    </style>
</head>


<div> <?php include ("componentshome/navbar.php"); ?>

    <div class="bg-white">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <div class="checkmark">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="message">
                        Your transaction is complete!
                    </div>
                    <p>Your Reservation has been successfully processed.</p>
                    <a href="./book-now.php" class="btn btn-success">Continue Reservation</a>
                </div>
            </div>
        </div>
    </div>

    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.bundle.min.js"></script>

    <?php include ("components/footer.php"); ?>
    </body>

    </html>