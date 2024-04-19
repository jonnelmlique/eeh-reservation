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

<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Book Now</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="styles/booking.css" rel="stylesheet" />
    <link href="styles/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/dashboard.css" rel="stylesheet" />
    <link href="styles/scrollbar.css" rel="stylesheet" />
</head>

<div><?php include ("componentshome/navbar.php"); ?>

    <div class="bg-white">
        <br /><br />
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card card-body bg-primary p-4" style="border-radius: 12px">
                        <div class="row pt-2 px-2">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="lni lni-users display-5"></i>
                                    </div>

                                    <div class="col-9">
                                        <div class="px-2">
                                            <p class="p-0 pt-2 text-white">Guess<br />1 Adult, 0 Children</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="lni lni-calendar display-5"></i>
                                    </div>

                                    <div class="col-9">
                                        <div class="px-2">
                                            <p class="p-0 pt-2 text-white">Check-in<br />Tue April 2, 2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="row">
                                    <div class="col-3">
                                        <i class="lni lni-calendar display-5"></i>
                                    </div>

                                    <div class="col-9">
                                        <div class="px-2">
                                            <p class="p-0 pt-2 text-white">Check-out<br />Thu April 4, 2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />

                    <h3 class="fw-bold">Select a Room</h3>
                    <img src="assets/step-1.png" width="100%" />

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

                                <div class="row">
                                    <div class="col-5">
                                        <img src="./rooms/<?php echo $row["image"]; ?>" alt="Rooms Image" class="w-100"
                                            style="border-radius: 8px" />

                                    </div>

                                    <div class="col-4">
                                        <h4 class="fw-bold mt-2"><?php echo $row['roomtype']; ?></h4>
                                        <p>
                                            <i class="lni lni-home"></i> Beds: <?php echo $row['bedsavailable']; ?><br />
                                            <i class="lni lni-layers"></i> Included:
                                            <?php echo $row['roominclusion']; ?><br />
                                            <i class="lni lni-coin"></i> Deposit: <?php echo $row['deposit']; ?><br />
                                            <i class="lni lni-user"></i> Ocuppancy: <?php echo $row['maxoccupancy']; ?>

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

                                        <button class="btn btn-primary w-100 reserve-btn" style="border-radius: 8px"
                                            data-roomid="<?php echo $row['roomid']; ?>"
                                            data-roomtype="<?php echo $row['roomtype']; ?>"
                                            data-maxoccupancy="<?php echo $row['maxoccupancy']; ?>"
                                            data-price="<?php echo $row['price']; ?>"
                                            data-reservationprice="<?php echo $row['reservationprice']; ?>"
                                            data-bs-toggle="modal" data-bs-target="#reserveModal">
                                            Reserve Now
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <br />
                            <?php
                        }
                    } else {
                        echo "No rooms available.";
                    }
                    ?>

                </div>
                <?php
                if (isset($_SESSION['guestuserid'])) {
                    $guestuserid = $_SESSION['guestuserid'];

                    $sql = "SELECT bc.*, r.roomtype 
            FROM reservationsummary bc 
            INNER JOIN room r ON bc.roomid = r.roomid 
            WHERE bc.guestuserid = '$guestuserid'";
                    $result = $conn->query($sql);
                    $totalReservationPrice = 0;

                    echo "<div class='col-4'>
            <div class='p-2 w-100 border border-primary border-2' style='border-radius: 8px'>
                <h4 class='fw-bold text-uppercase mt-2' align='center'>Your Booking Summary</h4>
                <hr class='mt-2 mx-3' />";

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                            $checkinDate = $row['checkindate'];
                            $checkinTime = date("h:i A", strtotime($row['checkintime']));
                            $checkinDay = date("l", strtotime($checkinDate));
                            $checkoutDate = $row['checkoutdate'];
                            $checkoutTime = date("h:i A", strtotime($row['checkouttime']));
                            $checkoutDay = date("l", strtotime($checkoutDate));
                            $roomtype = $row['roomtype'];
                            $roomfloor = $row['roomfloor'];
                            $roomnumber = $row['roomnumber'];

                            $reservationPrice = $row['reservationprice'];
                            $totalReservationPrice += $reservationPrice;
                            echo "<div class='row mx-2 pt-2'>
                    <div class='col-6' align='center'>
                        <b class='text-uppercase'>Check-in</b><br />
                        <small>$checkinDay, $checkinDate $checkinTime</small>
                    </div>
                    <div class='col-6' align='center'>
                        <b class='text-uppercase'>Check-out</b><br />
                        <small>$checkoutDay, $checkoutDate $checkoutTime</small>
                    </div>
                </div>
                <div class='row pt-4' align='center'>
                <div class='col-6'>
                <label>Room Floor:</label>
                    <small class='text-primary'>$roomfloor</small>
                </div>
                <div class='col-6'>
                <label>Room Number:</label>
                <small class='text-primary'>$roomnumber</small>
                </div>
            </div>
                <div class='row pt-4' align='center'>
                    <div class='col-6'>
                        <small class='text-primary'>$roomtype</small>
                    </div>
                    <div class='col-6'>
                    <small>₱" . number_format($reservationPrice, 2) . "</small>
                    </div>
                </div>
               
                <div align='center'>
                    <div class='row w-75 pt-4'>
                        <div class='col-6'>
                            <small><i class='lni lni-pencil-alt'></i> Edit</small>
                        </div>
                        <div class='col-6'>
                            <small><i class='lni lni-trash-can'></i> Remove</small>
                        </div>
                    </div>
                <hr class='mt-2 mx-3' />";
                        }
                        echo "<div class='row mx-2 pt-2'>
                        <div class='col-6'><b>Total</b></div>
                        <div class='col-6' align='right'>₱" . number_format($totalReservationPrice, 2) . "</div>
                      </div>";

                        echo "</div></div>";

                        echo "<a href='guest-details.php' class='btn continue-btn w-100 text-uppercase' style='border-radius: 8px; margin-top: 15px;'>Continue to Book</a>";

                        echo "</div>";
                    } else {
                        echo "<div align='center'>No bookings found.</div>";
                    }


                } else {
                    echo "Guest user ID not found in session.";
                }
                ?>


            </div>
        </div>
    </div>
    <br /><br />
</div>
<div class="modal fade" id="reserveModal" tabindex="-1" aria-labelledby="reserveModalLabel" aria-hidden="true">
    <!-- <div class="modal-dialog modal-xl"> -->
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content" style="background-color: #FAEBD7">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Reservation</h5>
            </div>

            <div class="modal-body">
                <div class="roomdetails" id="roomDetails"></div>
                <form id="reservationForm" action="process_reservation.php" method="post">
                    <input type="hidden" name="price" id="price" value="">
                    <input type="hidden" name="reservationprice" id="reservationprice" value="">
                    <div class="input">

                        <div class="row">
                            <div class="col-4" align="right">
                                <p class="mt-2">Adults:</p>
                            </div>
                            <div class="col-8">
                                <input type="number" class="form-control" name="add-adults" style="border-radius: 8px"
                                    placeholder="Adults" required />
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-4" align="right">
                                <p class="mt-2">Children:</p>
                            </div>
                            <div class="col-8"><input type="number" class="form-control" name="add-children"
                                    style="border-radius: 8px" placeholder="Children" required /></div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <label class="mt-2">Check-in Date:</label>
                            </div>
                            <div class="col-8">
                                <input type="date" class="form-control" id="checkInDate" name="checkInDate"
                                    style="border-radius: 8px" required />

                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <label class="mt-2">Check-in Time:</label>
                            </div>
                            <div class="col-8">
                                <input type="time" class="form-control mt-1" id="checkInTime" name="checkInTime"
                                    style="border-radius: 8px" required />
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <label class="mt-2">Check-out Date:</label>
                            </div>
                            <div class="col-8">
                                <input type="date" class="form-control" id="checkOutDate" name="checkOutDate"
                                    style="border-radius: 8px" required />

                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-4" align="right">
                                <label class="mt-2">Check-out Time:</label>
                            </div>
                            <div class="col-8">
                                <input type="time" class="form-control mt-1" id="checkOutTime" name="checkOutTime"
                                    style="border-radius: 8px" required />
                            </div>
                        </div>
                        <div class="row mt-1">
                            <label for="floorSelect" class="col-4 col-form-label text-end">Room Floor:</label>
                            <div class="col-8">
                                <select class="form-select mt-1" id="floorSelect" name="floorSelect"
                                    style="border-radius: 8px">
                                </select>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <label for="roomNumberSelect" class="col-4 col-form-label text-end">Room Number:</label>
                            <div class="col-8">
                                <select class="form-select mt-1" id="roomNumberSelect" name="roomNumberSelect"
                                    style="border-radius: 8px">
                                </select>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn continue-btn">Reserve</button>
            </div>

            </form>
        </div>
    </div>
</div>

<script src="scripts/jquery.min.js"></script>
<script src="scripts/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.reserve-btn').click(function () {
        var roomid = $(this).data('roomid');
        var roomType = $(this).data('roomtype');
        var maxoccupancy = $(this).data('maxoccupancy');

        var price = $(this).data('price');
        var reservationPrice = $(this).data('reservationprice');

        $('#roomDetails').html(`
        <h5 class="detailstitle">Room Details</h5>
        <p>Room Type: ${roomType}</p> 
        <p>Max Occupancy: ${maxoccupancy}</p>

        <p>Reservation Price: ${reservationPrice}</p>
    `);

        $('#reservationForm').append(`<input type="hidden" name="roomid" value="${roomid}" />`);
        $('#reservationForm').append(`<input type="hidden" name="price" value="${price}" />`);
        $('#reservationForm').append(
            `<input type="hidden" name="reservationprice" value="${reservationPrice}" />`);

        $('#reserveModal').modal('show');
    });


    $('#reservationForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    title: 'Reservation Successful!',
                    text: 'Your reservation has been successfully Added.',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    title: 'Error',
                    text: 'An error occurred while processing the reservation. Please try again later.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.reserve-btn').click(function () {
            var roomtype = $(this).data('roomtype');
            $.ajax({
                url: 'get_room_info.php',
                method: 'POST',
                data: {
                    roomtype: roomtype
                },
                dataType: 'json',
                success: function (response) {
                    var floors = response.floors;
                    var roomNumbers = response.roomNumbers;

                    $('#floorSelect').empty();
                    $('#roomNumberSelect').empty();

                    $.each(floors, function (index, floor) {
                        $('#floorSelect').append($('<option>', {
                            value: floor,
                            text: '' + floor
                        }));
                    });

                    $.each(roomNumbers, function (index, room) {
                        var roomNumber = room.roomnumber;
                        var status = room.status;

                        var $option = $('<option>', {
                            value: roomNumber,
                            text: roomNumber
                        });

                        if (status === 'Reserved') {
                            $option.prop('disabled', true);
                        }

                        $('#roomNumberSelect').append($option);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
<script>
    document.getElementById('checkInDate').addEventListener('change', function () {
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