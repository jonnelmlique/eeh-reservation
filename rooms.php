<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Book Now</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="styles/rooms.css" rel="stylesheet" />

    <link href="styles/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/scrollbar.css" rel="stylesheet" />
</head>

<body>
    <?php include ("componentshome/navbar.php"); ?>

    <div class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-8">
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
                    ?>


                    <div class="row mt-4">
                        <div class="col-3">
                            <div class="border border-2 border-primary p-2" style="border-radius: 8px; width: auto">
                                <b class="px-1">PAX</b><br />
                                <select name="pax" class="border-0 w-100">
                                    <option value="1">1 person</option>
                                    <option value="2">2 people</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="border border-2 border-primary p-2" style="border-radius: 8px; width: auto">
                                <b class="px-1">Floor</b><br />
                                <select name="floor" class="border-0 w-100">
                                    <option value="3">3rd Floor</option>
                                    <option value="4">4th floor</option>
                                    <option value="5">5th floor</option>
                                    <option value="6">6th floor</option>
                                    <option value="7">7th floor</option>
                                    <option value="8">8th floor</option>
                                    <option value="9">9th floor</option>
                                    <option value="10" selected>10th floor</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="border border-2 border-primary p-2" style="border-radius: 8px; width: auto">
                                <b class="px-1">Room Type</b><br />
                                <select name="room" class="border-0 w-100">
                                    <option value="standard">Standard</option>
                                    <option value="deluxe">Deluxe</option>
                                    <option value="suite">Suite</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="border border-2 border-primary p-2" style="border-radius: 8px; width: auto">
                                <b class="px-1">Sort By</b><br />
                                <select name="price" class="border-0 w-100">
                                    <option value="lowest">Lowest Price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br />

                    <?php

                    $sql = "SELECT * FROM room";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                    <div class="border border-primary w-100 p-2" style="border-radius: 12px">
                        <a href="roomdetails.php?roomid=<?php echo $row['roomid']; ?>"
                            style="text-decoration: none; color: inherit;">
                            <div class="row">
                                <div class="col-5">
                                    <img src="./rooms/<?php echo $row["image"]; ?>" alt="Rooms Image" class="w-100"
                                        style="border-radius: 8px" />

                                </div>

                                <div class="col-4">
                                    <h4 class="fw-bold mt-2"><?php echo $row['roomname']; ?></h4>
                                    <h6 class="fw-bold mt-2"><?php echo $row['roomtype']; ?></h6>
                                    <p>
                                        <i class="lni lni-home"></i> Beds: <?php echo $row['bedsavailable']; ?><br />
                                        <i class="lni lni-juice"></i> Included:
                                        <?php echo $row['roominclusion']; ?><br />
                                        <i class="lni lni-coin"></i> Deposit: <?php echo $row['deposit']; ?>
                                    </p>
                                </div>

                                <div class="col-3">
                                    <h4 class="fw-bold mt-2">
                                        ₱<?php echo number_format($row['price'], 2, '.', ','); ?></h4>
                                    <small>Per Night</small> <br><br />
                                    <h8 class="fw-bold mt-2">
                                        ₱<?php echo number_format($row['reservationprice'], 2, '.', ','); ?>
                                    </h8><br />Reservation

                                    <br /><br />

                                    <button class="btn btn-primary w-100" style="border-radius: 8px">Reserve
                                        Now</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <br />
                    <?php
                        }
                    } else {
                        echo "No rooms available.";
                    }
                    $conn->close();
                    ?>

                </div>

            </div>

        </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>

    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.bundle.min.js"></script>

    <?php include ("components/footer.php"); ?>
</body>

</html>