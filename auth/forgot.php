<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hotel Reservation System | Forgot Password</title>

    <link href="../styles/bootstrap.min.css" rel="stylesheet" />
    <link href="../styles/entrance.css" rel="stylesheet" />
    <link href="../styles/scrollbar.css" rel="stylesheet" />
</head>

<body>
    <?php include ("../components/navbar.php"); ?>

    <div class="row entrance">
        <div class="col-8">
        </div>

        <div class="col-4 bg-white">
            <div class="d-flex align-items-center px-4 w-100" style="height: 100vh !important" align="center">
                <div class="d-block w-100">
                    <img src="../assets/logo.png" width="50%" />
                    <br /><br />

                    <div class="border border-primary border rounded w-100 pt-4 pb-2 px-4">
                        <h5><label for="username" class="form-label text-uppercase">Email</label></h5>
                        <input type="email" class="form-control rounded bg-secondary mt-2" name="email" />
                        <br />

                        <a href="#" class="btn btn-outline-primary w-100 d-block text-uppercase rounded">Submit</a>
                        <hr />
                        <a href="login.php"
                            class="btn btn-danger w-100 d-block text-uppercase rounded border-danger mt-4 mb-2 border-3">Cancel</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="scripts/jquery.min.js">
    </script>
    <script src="scripts/bootstrap.bundle.min.js"></script>
</body>

</html>