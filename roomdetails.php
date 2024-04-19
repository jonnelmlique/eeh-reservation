<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Book Now</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="styles/roomdetails.css" rel="stylesheet" />

    <link href="styles/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/scrollbar.css" rel="stylesheet" />
</head>

<body>
    <?php include ("componentshome/navbar.php"); ?>

    <div class="container product-details">
        <div class="row">
            <div class="col-md-6 product-details-img">
                <?php
                include './src/config/config.php';

                if (isset($_GET['roomid'])) {
                    $roomid = $_GET['roomid'];

                    $sql = "SELECT * FROM room WHERE roomid = $roomid";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        ?>
                <img src="./rooms/<?php echo $row['image']; ?>" alt="Room Image">
                <?php
                    } else {
                        echo "Room not found.";
                    }
                } else {
                    echo "Room ID not provided.";
                }
                ?>
            </div>
            <div class="col-md-6">
                <?php if (isset($row)) { ?>
                <h2 class="product-details-title"><?php echo $row['roomname']; ?></h2>
                <p class="product-details-price">Price: ₱<?php echo number_format($row['price'], 2); ?></p>
                <p class="product-details-reservationprice">Reservation:
                    ₱<?php echo number_format($row['reservationprice'], 2); ?></p>

                <p class="product-details-description">Room Type: <?php echo $row['roomtype']; ?></p>
                <p class="product-details-description">Included: <?php echo $row['roominclusion']; ?></p>
                <p class="product-details-description">Beds Available: <?php echo $row['bedsavailable']; ?></p>
                <p class="product-details-description">Deposit: <?php echo $row['deposit']; ?></p>

                <label class="checkin" for="checkInDate">Check-in Date & Time:</label>
                <input type="date" id="checkInDate" name="checkInDate">
                <input type="time" id="checkInTime" name="checkInTime">

                <label class="checkout" for="checkOutDate">Check-out Date & Time:</label>
                <input type="date" id="checkOutDate" name="checkOutDate"> <input type="time" id="checkOutTime"
                    name="checkOutTime">



                <!-- <div class="form-group">
                    <label for="checkOutTime">Check-out Time:</label>
                    <input type="time" id="checkOutTime" name="checkOutTime">
                </div> -->

                <div class="form-group">
                    <button class="btn btn-primary" id="reserveNowBtn">Reserve Now</button>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>


    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('checkInDate').addEventListener('change', function() {
        var checkInDate = new Date(this.value);
        var checkOutDateInput = document.getElementById('checkOutDate');
        var checkOutDate = new Date(checkOutDateInput.value);

        if (checkInDate > checkOutDate) {
            checkOutDateInput.value = this.value;
        }
        checkOutDateInput.min = this.value;
    });
    </script>
    <script>
    var currentDate = new Date().toISOString().split('T')[0];
    document.getElementById('checkInDate').setAttribute('min', currentDate);
    document.getElementById('checkOutDate').setAttribute('min', currentDate);
    </script>

    <?php include ("components/footer.php"); ?>
</body>

</html>