<?php
require_once('db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home | Courier Management System</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css">

    <link href="assets/dist/css/landing-page.min.css" rel="stylesheet">

</head>

<body>


    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="#">Welcome</a>
            <a class="btn btn-primary" href="login.php">Sign In</a>
        </div>
    </nav>

    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form action="search-courier.php" method="get">
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0">
                                <input name="tracking_no" type="text" class="form-control form-control-lg"
                                    placeholder="Enter the Tracking No..." required>
                            </div>
                            <div class="col-12 col-md-3">
                                <button type="submit" class="btn btn-block btn-lg btn-primary">Track Now!</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <center>
                        <div class="card mt-5">
                            <div class="card-body" style='color: #888;'>
                                <h5 class="card-title">Tracking Details</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Status</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM parcels JOIN parcel_tracks ON parcels.id = parcel_tracks.parcel_id WHERE reference_number = '$_GET[tracking_no]'";
                                            $result = $conn->query($sql);
                                            while($row = mysqli_fetch_array($result)){
                                                switch ($row['status']) {
                                                    case '1':
                                                        $status = "Collected";
                                                        break;
                                                    case '2':
                                                        $status = "Shipped";
                                                        break;
                                                    case '3':
                                                        $status = "In-Transit";
                                                        break;
                                                    case '4':
                                                        $status = "Arrived At Destination";
                                                        break;
                                                    case '5':
                                                        $status = "Out for Delivery";
                                                        break;
                                                    case '6':
                                                        $status = "Ready to Pickup";
                                                        break;
                                                    case '7':
                                                        $status = "Delivered";
                                                        break;
                                                    case '8':
                                                        $status = "Picked-Up";
                                                        break;
                                                    case '9':
                                                        $status = "Unsuccessful Delivery Attempt";
                                                        break;
                                                    
                                                    default:
                                                        $status = "Item Accepted By Courier";
                                                        break;
                                                }
                                                echo "
                                                    <tr>
                                                        <th scope='row'>$status</th>
                                                        <td>$row[date_created]</td>
                                                    </tr>"; 
                                            }
                                                          
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </header>


    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item">
                            <a href="#">About</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Contact</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Terms of Use</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Courier Management System 2018. All Rights Reserved.
                    </p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fa fa-facebook fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fa fa-twitter fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-instagram fa-2x fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>