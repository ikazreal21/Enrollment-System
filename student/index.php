<?php
session_start();

require_once '../database.php';

$is_fillup = false;

$statement = $pdo->prepare('SELECT * FROM tbl_applicationform where user_id = :user_id');
$statement->bindValue(':user_id', $_SESSION["user_id"]);
$statement->execute();
$row = $statement->rowCount();

if ($row > 0) {
    $is_fillup = true;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AEMPS - Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet"> -->

    <!-- Icon Font Stylesheet -->
    <link href="../assets/css/icons/css/all.min.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">AEMPS</h3>
                </a>
                <div class="ms-4 mb-4" style="text-align:center">
                    <div class="position-relative" style="text-align:center">
                        <img class="rounded-circle" src="../assets/img/logo.jpg" alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <?php if ($_SESSION["status"] == "pending"): ?>
                        <a href="index.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Application</a>
                    <?php endif;?>

                    <?php if ($_SESSION["status"] == "active"): ?>
                        <a href="remarks.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Remarks</a>
                    <?php endif;?>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <!-- <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;"> -->
                            <span class="d-none d-lg-inline-flex"><?php echo ucfirst($_SESSION["username"]) ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <?php if ($_SESSION["status"] == "active"): ?>
                                <a href="profile.php" class="dropdown-item" >My Profile</a>
                            <?php endif;?>
                            <a href="../logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <?php if ($_SESSION["status"] == "pending"): ?>
                <?php if (!$is_fillup): ?>
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Application Form</h6>
                                <form method="POST" action="checking.php" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">FullName:</span>
                                        <input type="text" name="fullname" class="form-control" required>

                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Age:</span>
                                        <input type="number" min="1" name="age" class="form-control" required>
                                        <span class="input-group-text">Birth Date:</span>
                                        <input type="date" name="birthdate" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Occupation:</span>
                                        <input type="text" name="occupation" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Email:</span>
                                        <input type="email" name="email" class="form-control" required>
                                        <span class="input-group-text">Contact Number:</span>
                                        <input type="number" name="contactnum" min="0" class="form-control" required>
                                    </div>
                                    <h6 class="mb-4">Family Background</h6>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Father's Name:</span>
                                        <input type="text" name="faname" class="form-control">
                                        <span class="input-group-text">Occupation:</span>
                                        <input type="text" name="faoccu" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Mother's Name:</span>
                                        <input type="text" name="maname" class="form-control">
                                        <span class="input-group-text">Occupation:</span>
                                        <input type="text" name="maoccu" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Spouse's Name:</span>
                                        <input type="text" name="spaname" class="form-control">
                                        <span class="input-group-text">Occupation:</span>
                                        <input type="text" name="spaoccu" class="form-control">
                                    </div>
                                    <h6 class="mb-4">Educational Background:</h6>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Tertiary:</span>
                                        <input type="text" name="tertiary" class="form-control" required>
                                        <span class="input-group-text">Year Graduated:</span>
                                        <input type="number" name="tergraduate" min="0" class="form-control"  required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Secondary:</span>
                                        <input type="text" name="secondary" class="form-control" required>
                                        <span class="input-group-text">Year Graduated:</span>
                                        <input type="number" name="secgraduate" min="0" class="form-control"  required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Elemetary:</span>
                                        <input type="text" name="elementary" class="form-control" required>
                                        <span class="input-group-text">Year Graduated:</span>
                                        <input type="number" name="elemgraduate" min="0" class="form-control"  required>
                                    </div>
                                    <script>
                                        function myFunction() {
                                        // Get the checkbox
                                        var checkBox1 = document.getElementById("inlineRadio1");
                                        var checkBox2 = document.getElementById("inlineRadio2");
                                        // Get the output text
                                        var file = document.getElementById("file");

                                        // If the checkbox is checked, display the output text
                                        if (checkBox2.checked == true){
                                            file.style.display = "block";
                                        } else {
                                            file.style.display = "none";
                                        }

                                        if (checkBox1.checked == true){
                                            file.style.display = "none";
                                        }
                                    }
                                    </script>
                                    <label for="">Level:</label>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="inlineRadio1"
                                        value="N5" onclick="myFunction()">
                                    <label class="form-check-label" for="inlineRadio1">N5</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="inlineRadio2"
                                            value="N4" onclick="myFunction()">
                                        <label class="form-check-label" for="inlineRadio2">N4</label>
                                    </div>
                                    <h6 class="mb-4">Requirements</h6>
                                    <div class="mb-3" style="display:none" id="file">
                                        <label for="formFile" class="form-label">Proof of Certificate</label>
                                        <input class="form-control" name="certificate" accept="image/*" type="file" id="formFile">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Valid ID</label>
                                        <input class="form-control" name="valid_id" accept="image/*" type="file" id="formFile">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Birth Certificate</label>
                                        <input class="form-control" name="birthcert" accept="image/*" type="file" id="formFile">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">1 X 1 Formal Picture</label>
                                        <input class="form-control" name="picture" type="file" accept="image/*" id="formFile">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="container-fluid pt-4 px-4">
                    <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                        <div class="col-md-6 text-center">
                            <h3>Your Application is Pending</h3>
                        </div>
                    </div>
                </div>
                <?php endif;?>
            <?php endif;?>
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">AEMPS</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="../assets/js/main3.js"></script>
    <script src="../assets/js/main2.js"></script>
    <script src="../assets/lib/chart/chart.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
</body>

</html>