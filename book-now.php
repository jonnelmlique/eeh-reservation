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

                    <div class="border border-primary w-100 p-2" style="border-radius: 12px">
                        <div class="row">
                            <div class="col-5">
                                <img src="assets/standard-room.jpg" class="w-100" style="border-radius: 8px" />
                            </div>

                            <div class="col-4">
                                <h4 class="fw-bold mt-2">Standard</h4>
                                <p>
                                    <i class="lni lni-home"></i> Sleeps 3 | 1 King<br />
                                    <i class="lni lni-juice"></i> Breakfast Included<br />
                                    <i class="lni lni-coin"></i> Deposit Required
                                </p>
                            </div>

                            <div class="col-3">
                                <h4 class="fw-bold mt-2">P10,000</h4>
                                <small>Per Night</small>
                                <br /><br /><br />

                                <button class="btn btn-primary w-100" style="border-radius: 8px">Book Now</button>
                            </div>
                        </div>
                    </div>
                    <br />

                    <div class="border border-primary w-100 p-2" style="border-radius: 12px">
                        <div class="row">
                            <div class="col-5">
                                <img src="assets/standard-room.jpg" class="w-100" style="border-radius: 8px" />
                            </div>

                            <div class="col-4">
                                <h4 class="fw-bold mt-2">Deluxe</h4>
                                <p>
                                    <i class="lni lni-home"></i> Sleeps 3 | 1 King<br />
                                    <i class="lni lni-juice"></i> Breakfast Included<br />
                                    <i class="lni lni-coin"></i> Deposit Required
                                </p>
                            </div>

                            <div class="col-3">
                                <h4 class="fw-bold mt-2">P10,000</h4>
                                <small>Per Night</small>
                                <br /><br /><br />

                                <button class="btn btn-primary w-100" style="border-radius: 8px">Book Now</button>
                            </div>
                        </div>
                    </div>
                    <br />

                    <div class="border border-primary w-100 p-2" style="border-radius: 12px">
                        <div class="row">
                            <div class="col-5">
                                <img src="assets/standard-room.jpg" class="w-100" style="border-radius: 8px" />
                            </div>

                            <div class="col-4">
                                <h4 class="fw-bold mt-2">Suite</h4>
                                <p>
                                    <i class="lni lni-home"></i> Sleeps 3 | 1 King<br />
                                    <i class="lni lni-juice"></i> Breakfast Included<br />
                                    <i class="lni lni-coin"></i> Deposit Required
                                </p>
                            </div>

                            <div class="col-3">
                                <h4 class="fw-bold mt-2">P10,000</h4>
                                <small>Per Night</small>
                                <br /><br /><br />

                                <button class="btn btn-primary w-100" style="border-radius: 8px">Book Now</button>
                            </div>
                        </div>
                    </div>
                    <br />

                    <div class="border border-primary w-100 p-2" style="border-radius: 12px">
                        <div class="row">
                            <div class="col-5">
                                <img src="assets/standard-room.jpg" class="w-100" style="border-radius: 8px" />
                            </div>

                            <div class="col-4">
                                <h4 class="fw-bold mt-2">Executive</h4>
                                <p>
                                    <i class="lni lni-home"></i> Sleeps 3 | 1 King<br />
                                    <i class="lni lni-juice"></i> Breakfast Included<br />
                                    <i class="lni lni-coin"></i> Deposit Required
                                </p>
                            </div>

                            <div class="col-3">
                                <h4 class="fw-bold mt-2">P10,000</h4>
                                <small>Per Night</small>
                                <br /><br /><br />

                                <button class="btn btn-primary w-100" style="border-radius: 8px">Book Now</button>
                            </div>
                        </div>
                    </div>
                    <br />

                    <div class="border border-primary w-100 p-2" style="border-radius: 12px">
                        <div class="row">
                            <div class="col-5">
                                <img src="assets/standard-room.jpg" class="w-100" style="border-radius: 8px" />
                            </div>

                            <div class="col-4">
                                <h4 class="fw-bold mt-2">Family</h4>
                                <p>
                                    <i class="lni lni-home"></i> Sleeps 3 | 1 King<br />
                                    <i class="lni lni-juice"></i> Breakfast Included<br />
                                    <i class="lni lni-coin"></i> Deposit Required
                                </p>
                            </div>

                            <div class="col-3">
                                <h4 class="fw-bold mt-2">P10,000</h4>
                                <small>Per Night</small>
                                <br /><br /><br />

                                <button class="btn btn-primary w-100" style="border-radius: 8px">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="p-2 w-100 border border-primary border-2" style="border-radius: 8px">
                        <h4 class="fw-bold text-uppercase mt-2" align="center">Your Booking Summary</h4>

                        <div class="row mx-2 pt-2">
                            <div class="col-6" align="center">
                                <b class="text-uppercase">Check-in</b><br />
                                <small>After 3:00PM</small>
                            </div>

                            <div class="col-6" align="center">
                                <b class="text-uppercase">Check-out</b><br />
                                <small>Before 12:00PM</small>
                            </div>
                        </div>

                        <div align="center" class="pt-2">
                            <small class="mx-2 pt-2">Tuesday, April 2, 2024 - Thursday, April 4, 2024</small>
                        </div>

                        <div class="row pt-4" align="center">
                            <div class="col-6">
                                <small class="text-primary">Grand Deluxe</small>
                            </div>

                            <div class="col-6">
                                <small>P10,000</small>
                            </div>
                        </div>

                        <div align="center">
                            <div class="row w-75 pt-4">
                                <div class="col-6">
                                    <small><i class="lni lni-pencil-alt"></i> Edit</small>
                                </div>

                                <div class="col-6">
                                    <small><i class="lni lni-trash-can"></i> Remove</small>
                                </div>

                            </div>
                        </div>

                        <div align="center">
                            <hr class="mt-2 mx-3" />
                        </div>

                        <div class="row mx-2 pb-2">
                            <div class="col-6">
                                <b class="text-uppercase">Total</b>
                            </div>

                            <div class="col-6" align="right">
                                <b>P10,000</b>
                            </div>
                        </div>
                    </div>
                    <br />

                    <a href="guest-details.php" class="btn continue-btn w-100 text-uppercase"
                        style="border-radius: 8px">Continue to Book</a>
                </div>
            </div>
        </div>
        <br /><br />
    </div>

    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.bundle.min.js"></script>

    <?php include("components/footer.php"); ?>
</body>

</html>