<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Rooms</title>

    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <link href="../styles/booking.css" rel="stylesheet" />
    <link href="../styles/scrollbar.css" rel="stylesheet" />
    <link href="../styles/admin/rooms.css" rel="stylesheet" />
</head>

<body>
    <?php include ("components/header.php"); ?>

    <div class="row w-100">
        <div class="col-lg-1">
            <?php include ("components/sidebar.php"); ?>
        </div>

        <div class="col-lg-8 bg-white shadow-lg">
            <div class="px-4">
                <h4 class="fw-bold text-uppercase">&gt; Rooms</h4>
                <hr>
                <br />

                <div align="right">
                    <input type="search" class="form-control w-auto d-inline mx-2" name="search" placeholder="Search"
                        style="border-radius: 8px" />
                    <button class="btn btn-primary text-uppercase px-4" data-bs-toggle="modal"
                        data-bs-target="#addModal">Add</button>
                </div>
                <br />
                <table class="table table-hover table-stripped border border-dark"
                    style="border-radius: 8px; table-layout: fixed">
                    <thead>
                        <tr>
                            <td class="bg-dark text-white">Room Number</td>
                            <td class="bg-dark text-white"></td>
                            <td class="bg-dark text-white">Room Name</td>
                            <td class="bg-dark text-white">Room Inclusion</td>
                            <td class="bg-dark text-white">Room Type</td>
                            <td class="bg-dark text-white">Price</td>
                            <td class="bg-dark text-white">Status</td>
                            <td class="bg-dark text-white">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../src/config/config.php';
                        $query = "SELECT * FROM room";
                        $result = $conn->query($query);

                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['roomnumber'] . "</td>";
                                echo "<td><img src='../rooms/" . $row['image'] . "' class='w-100' /></td>";

                                echo "<td><b>" . $row['roomname'] . "</b></td>";

                                $room_inclusions = explode(',', $row['roominclusion']);
                                echo "<td>";
                                foreach ($room_inclusions as $inclusion) {
                                    $inclusion = trim($inclusion);
                                    echo "<div class='cloud'>" . $inclusion . "</div>";
                                }
                                echo "</td>";

                                echo "<td>" . $row['roomtype'] . "</td>";
                                echo "<td>₱" . number_format($row['price'], 2, '.', ',') . "</td>";
                                echo "<td><p class='text-" . ($row['status'] == 'Booked' ? 'danger' : 'success') . " '>" . $row['status'] . "</p></td>";
                                echo "<td><button class='btn btn-success w-100 px-2' data-bs-toggle='modal' data-bs-target='#editModal'>Edit</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No rooms found</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>

                <!-- <table class="table table-hover table-stripped border border-dark"
                    style="border-radius: 8px; table-layout: fixed">
                    <thead>
                        <tr>
                            <td class="bg-dark text-white">Room Number</td>
                            <td class="bg-dark text-white">Room Name</td>
                            <td class="bg-dark text-white">Room Inclusion</td>
                            <td class="bg-dark text-white">Room Type</td>
                            <td class="bg-dark text-white">Price</td>
                            <td class="bg-dark text-white">Status</td>
                            <td class="bg-dark text-white">Action</td>
                            <td class="bg-dark text-white"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td><b>Grand Deluxe</b></td>
                            <td>
                                <p>Breakfast<br />King-sized Bed<br />Free WiFi</p>
                            </td>
                            <td>Grand Deluxe</td>
                            <td>P10,000</td>
                            <td>
                                <p class="text-danger text-uppercase">Booked</p>
                            </td>
                            <td><button class="btn btn-success w-100 px-2" data-bs-toggle="modal"
                                    data-bs-target="#editModal">Edit</button></td>
                            <td><img src="../assets/deluxe.jpg" class="w-100" /></td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td><b>Grand Deluxe</b></td>
                            <td>
                                <p>Breakfast<br />King-sized Bed<br />Free WiFi</p>
                            </td>
                            <td>Grand Deluxe</td>
                            <td>P10,000</td>
                            <td>
                                <p class="text-success text-uppercase">Available</p>
                            </td>
                            <td><button class="btn btn-success w-100 px-2" data-bs-toggle="modal"
                                    data-bs-target="#editModal">Edit</button></td>
                            <td><img src="../assets/deluxe.jpg" class="w-100" /></td>
                        </tr>
                    </tbody>
                </table> -->
            </div>

            <br /><br />
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #FAEBD7">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Room</h5>
                </div>
                <div class="modal-body" align="center">
                    <div class="row">
                        <div class="col-4" align="right">
                            <p class="mt-2">Room Number</p>
                        </div>
                        <div class="col-8"><input type="number" class="form-control" name="edit-room-number"
                                style="border-radius: 8px" placeholder="Room Number" /></div>
                    </div>

                    <div class="row">
                        <div class="col-4" align="right">
                            <p class="mt-2">Room Name</p>
                        </div>
                        <div class="col-8"><input type="text" class="form-control" name="edit-room-name"
                                style="border-radius: 8px" placeholder="Room Name" /></div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-4" align="right">
                            <p class="mt-2">Room Inclusion</p>
                        </div>
                        <div class="col-8"><input type="text" class="form-control" name="edit-room-inc"
                                style="border-radius: 8px" placeholder="Room Inclusion" /></div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-4" align="right">
                            <p class="mt-2">Room Type</p>
                        </div>
                        <div class="col-8">
                            <select class="form-control" name="edit-room-type" style="border-radius: 8px">
                                <option value="Standard">Standard</option>
                                <option value="Deluxe">Deluxe</option>
                                <option value="Suite">Suite</option>
                                <option value="Executive">Executive</option>
                                <option value="Family">Family</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-4" align="right">
                            <p class="mt-2">Price</p>
                        </div>
                        <div class="col-8"><input type="number" class="form-control" name="edit-price"
                                style="border-radius: 8px" placeholder="Price" /></div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-4" align="right">
                            <p class="mt-2">Status</p>
                        </div>
                        <div class="col-8">
                            <select class="form-control" name="edit-status" style="border-radius: 8px">
                                <option value="Available">Available</option>
                                <option value="Booked">Booked</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-4" align="right">
                            <p class="mt-2">Image</p>
                        </div>
                        <div class="col-8"><input type="file" class="form-control" name="edit-image"
                                style="border-radius: 8px" /></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn continue-btn">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #FAEBD7">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Room</h5>
                </div>
                <div class="modal-body" align="center">
                    <form method="post" action="addroom.php" enctype="multipart/form-data" class="needs-validation">
                        <div class="row">

                            <div class="col-4" align="right">
                                <p class="mt-2">Room Number</p>
                            </div>
                            <div class="col-8"><input type="number" class="form-control" name="add-room-number"
                                    style="border-radius: 8px" placeholder="Room Number" required /></div>
                        </div>

                        <div class="row">

                            <div class="col-4" align="right">
                                <p class="mt-2">Room Name</p>
                            </div>
                            <div class="col-8"><input type="text" class="form-control" name="add-room-name"
                                    style="border-radius: 8px" placeholder="Room Name" required /></div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <p class="mt-2">Room Inclusion</p>
                            </div>
                            <div class="col-8"><input type="text" class="form-control" name="add-room-inc"
                                    style="border-radius: 8px" placeholder="Room Inclusion" required /></div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <p class="mt-2">Beds Available</p>
                            </div>
                            <div class="col-8"><input type="number" class="form-control" name="add-room-beds"
                                    style="border-radius: 8px" placeholder="Beds Available" required /></div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <p class="mt-2">Deposit</p>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="add-room-deposit" style="border-radius: 8px"
                                    required>
                                    <option value="Required">Required</option>
                                    <option value="Not required">Not Required</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <p class="mt-2">Room Type</p>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="add-room-type" style="border-radius: 8px" required>
                                    <option value="Standard">Standard</option>
                                    <option value="Deluxe">Deluxe</option>
                                    <option value="Suite">Suite</option>
                                    <option value="Executive">Executive</option>
                                    <option value="Family">Family</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <p class="mt-2">Price</p>
                            </div>
                            <div class="col-8"><input type="number" class="form-control" name="add-price"
                                    style="border-radius: 8px" placeholder="Price" required /></div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <p class="mt-2">Reservation Price</p>
                            </div>
                            <div class="col-8"><input type="number" class="form-control" name="add-rprice"
                                    style="border-radius: 8px" placeholder="Price" required /></div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <p class="mt-2">Status</p>
                            </div>
                            <div class="col-8">
                                <select class="form-control" name="add-status" style="border-radius: 8px" required>
                                    <option value="Available">Available</option>
                                    <option value="Booked">Booked</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <p class="mt-2">Image</p>
                            </div>
                            <div class="col-8"><input type="file" class="form-control" name="add-image"
                                    style="border-radius: 8px" required /></div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn continue-btn">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#addModal form").submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: "addroom.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log("Response:", response);

                    try {
                        var jsonData = JSON.parse(response);
                        console.log("Parsed JSON:", jsonData);

                        if (jsonData.message === "success") {
                            Swal.fire({
                                title: 'Rooms Added Successfully!',
                                text: 'You have successfully added the Room.',
                                icon: 'success',
                                showCancelButton: true,
                                confirmButtonText: 'OK',
                                cancelButtonText: 'View Rooms'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();

                                } else if (result.dismiss === Swal.DismissReason
                                    .cancel) {
                                    window.location.href =
                                        '../admin/rooms.php';
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: jsonData.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    } catch (error) {
                        console.error("Error parsing JSON:", error);
                        Swal.fire({
                            title: 'Error',
                            text: 'An unexpected error occurred.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', xhr.responseText);
                    Swal.fire({
                        title: 'Error',
                        text: 'An unexpected error occurred.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
    </script>



</body>

</html>