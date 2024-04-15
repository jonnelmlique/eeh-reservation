<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Guest Details</title>

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="styles/booking.css" rel="stylesheet" />
    <link href="styles/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/dashboard.css" rel="stylesheet" />
    <link href="styles/guest-details.css" rel="stylesheet" />
    <link href="styles/scrollbar.css" rel="stylesheet" />
</head>

<div> <?php include ("componentshome/navbar.php"); ?>

    <div class="bg-white">
        <br /><br />
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h3 class="fw-bold">Guest Details</h3>
                    <img src="assets/step-2.png" width="100%" />
                    <br /><br />

                    <div class="border border-primary w-100 p-2 px-3" style="border-radius: 12px">
                        <br />
                        <h4 class="fw-bold">Contact Info</h4>

                        <div class="row">
                            <div class="col-3">
                                <input type="text" class="form-control" name="prefix" placeholder="Prefix" />
                            </div>

                            <div class="col-3">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" />
                            </div>

                            <div class="col-3">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" />
                            </div>

                            <div class="col-3">
                                <input type="text" class="form-control" name="suffix" placeholder="Suffix" />
                            </div>
                        </div>
                        <br />

                        <div class="row">
                            <div class="col-6">
                                <input type="number" class="form-control" name="mobile_number"
                                    placeholder="Mobile Number" />
                            </div>

                            <div class="col-6">
                                <input type="email" class="form-control" name="email_address"
                                    placeholder="Email Address" />
                            </div>
                        </div>
                        <br /><br />

                        <h4 class="fw-bold">Address</h4>
                        <div class="row">
                            <div class="col-4">
                                <input type="text" class="form-control" name="country" placeholder="Country" />
                            </div>

                            <div class="col-8">
                                <input type="text" class="form-control" name="address" placeholder="Address" />
                            </div>
                        </div>
                        <br />

                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" name="city" placeholder="City" />
                            </div>

                            <div class="col-4">
                                <input type="number" class="form-control" name="zip" placeholder="Zip Postal Code" />
                            </div>
                        </div>

                        <br /><br />
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

                    <a href="book-review.php" class="btn continue-btn w-100 text-uppercase"
                        style="border-radius: 8px">Continue</a>
                </div>
            </div>
        </div>
        <br /><br />
    </div>

    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.bundle.min.js"></script>

    <?php include ("components/footer.php"); ?>
    </body>

    </html>