<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="./styles/bootstrap.min.css" rel="stylesheet" />
    <link href="./styles/dashboard.css" rel="stylesheet" />
    <link href="./styles/scrollbar.css" rel="stylesheet" />
</head>


<div> <?php include ("componentshome/navbar.php"); ?>
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

    <div class="bg-white">
        <br /><br />
        <div class="container">
            <h1 class="display-2 fw-bold text-uppercase">Enchanted Escapes Hotel</h1>
            <p class="text-primary text-uppercase fw-bold">Rooms // Suites // Presidential Suites</p>
            <br />

            <div class="w-100 d-block">
                <a href="book-now.php"><button class="btn btn-primary position-absolute text-uppercase py-4"
                        style="right: 304px; padding-left: 64px; padding-right: 64px">Book Now</button></a>
                <img src="assets/home-bg.jpg" width="100%" />
            </div>
            <br /><br /><br />

            <h1 class="display-3 text-primary text-uppercase" style="font-family: 'Gideon Roman'; font-weight: 600">
                Rooms <span class="display-6" style="font-family: 'Dancing Script'; font-weight: 600">et</span> Suites
            </h1>
            <br />

            <ul class="list-group list-group-horizontal position-relative overflow-auto w-100">
                <li class="list-group-item border-0 rooms">
                    <img src="assets/standard-room.jpg" width="200%" class="p-4 rounded" />
                    <div align="center">
                        <h4 class="fw-bold">Standard</h4>
                        <p style="font-family: 'Arial'">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </li>

                <li class="list-group-item border-0 rooms">
                    <img src="assets/deluxe.jpg" width="100%" class="p-4 rounded" />
                    <div align="center">
                        <h4 class="fw-bold">Deluxe</h4>
                        <p style="font-family: 'Arial'">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </li>

                <li class="list-group-item border-0 rooms">
                    <img src="assets/suite.jpg" width="100%" class="p-4 rounded" />
                    <div align="center">
                        <h4 class="fw-bold">Suite</h4>
                        <p style="font-family: 'Arial'">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </li>
            </ul>
            <br /><br />

            <h1 class="display-3 text-primary text-uppercase" style="font-family: 'Gideon Roman'; font-weight: 600">
                Testimonies</h1>
            <ul class="list-group list-group-horizontal position-relative overflow-auto w-100">
                <li class="list-group-item border-0">
                    <img src="assets/profile-picture.webp" class="p-4 testimony" />

                    <div align="center">
                        <h4 class="fw-bold">Paul</h4>
                        <p style="font-family: 'Arial'">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </li>

                <li class="list-group-item border-0">
                    <img src="assets/profile-picture.webp" class="p-4 testimony" />

                    <div align="center">
                        <h4 class="fw-bold">Sarah</h4>
                        <p style="font-family: 'Arial'">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </li>

                <li class="list-group-item border-0">
                    <img src="assets/profile-picture.webp" class="p-4 testimony" />

                    <div align="center">
                        <h4 class="fw-bold">Miguel</h4>
                        <p style="font-family: 'Arial'">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </li>

                <li class="list-group-item border-0">
                    <img src="assets/profile-picture.webp" class="p-4 testimony" />

                    <div align="center">
                        <h4 class="fw-bold">Mark</h4>
                        <p style="font-family: 'Arial'">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </li>

                <li class="list-group-item border-0">
                    <img src="assets/profile-picture.webp" class="p-4 testimony" />

                    <div align="center">
                        <h4 class="fw-bold">Seb</h4>
                        <p style="font-family: 'Arial'">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </li>
            </ul>
        </div>
        <br /><br />
    </div>

    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.bundle.min.js"></script>

    <?php include ("components/footer.php"); ?>
    </body>

    </html>