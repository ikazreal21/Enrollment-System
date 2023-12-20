<?php
session_start();

require_once '../database.php';
// require_once 'validation.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$comments = '';

$statement = $pdo->prepare('SELECT * FROM tbl_applicationform where application_id = :application_id ');
$statement->bindValue(':application_id', $id);
$statement->execute();
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comments = $_POST["comments"];

    $statement = $pdo->prepare("UPDATE tbl_applicationform set comments = :comments, status = 'decline' WHERE application_id = :id");
    $statement->bindValue(':id', $id);
    $statement->bindValue(':comments', $comments);
    $statement->execute();
}

header("Location:index.php")

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AEMPS - Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" value="viewport">
    <meta content="" value="keywords">
    <meta content="" value="description">

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
    <link href="../assets/css/style2.css" rel="stylesheet">

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
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">AEMPS</h3>
                </a>
                <div class="ms-4 mb-4 text-center">
                    <div class="position-relative" >
                        <img class="rounded-circle rounded-circle mx-auto mb-4" src="../assets/img/logo.png" alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Enrolee</a>
                    <a href="records.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Records</a>
                    <a href="remarks.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Remarks</a>
                    <a href="users.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Students</a>
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
                            <a href="../logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <div class="container-fluid pt-4 px-4">
                     <a class="btn btn-primary m-2" href="index.php" >Back</a>
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Application Form</h6>
                                <form method="POST"  enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">FullName:</span>
                                        <input type="text" value="<?php echo $row[0]["fullname"] ?>" class="form-control" disabled>

                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Age:</span>
                                        <input type="number" min="1" value="<?php echo $row[0]["age"] ?>" class="form-control" disabled>
                                        <span class="input-group-text">Birth Date:</span>
                                        <input type="date" value="<?php echo date($row[0]["birthdate"]) ?>" class="form-control" disabled>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Occupation:</span>
                                        <input type="text" value="<?php echo $row[0]["occupation"] ?>" class="form-control" disabled>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Email:</span>
                                        <input type="email" value="<?php echo $row[0]["email"] ?>" class="form-control" disabled>
                                        <span class="input-group-text">Contact Number:</span>
                                        <input type="number" value="<?php echo $row[0]["contactnum"] ?>" min="0" class="form-control" disabled>
                                    </div>
                                    <h6 class="mb-4">Family Background</h6>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Father's value:</span>
                                        <input type="text" value="<?php echo $row[0]["faname"] ?>" class="form-control" disabled>
                                        <span class="input-group-text">Occupation:</span>
                                        <input type="text" value="<?php echo $row[0]["faoccu"] ?>" class="form-control" disabled>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Mother's value:</span>
                                        <input type="text" value="<?php echo $row[0]["maname"] ?>" class="form-control" disabled>
                                        <span class="input-group-text">Occupation:</span>
                                        <input type="text" value="<?php echo $row[0]["maoccu"] ?>" class="form-control" disabled>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Spouse's value:</span>
                                        <input type="text" value="<?php echo $row[0]["spaname"] ?>" class="form-control" disabled>
                                        <span class="input-group-text">Occupation:</span>
                                        <input type="text" value="<?php echo $row[0]["spaoccu"] ?>" class="form-control" disabled>
                                    </div>
                                    <h6 class="mb-4">Educational Background:</h6>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Tertiary:</span>
                                        <input type="text" value="<?php echo $row[0]["tertiary"] ?>" class="form-control" disabled>
                                        <span class="input-group-text">Year Graduated:</span>
                                        <input type="number" value="<?php echo $row[0]["tergraduate"] ?>" min="0" class="form-control"  disabled>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Secondary:</span>
                                        <input type="text" value="<?php echo $row[0]["secondary"] ?>" class="form-control" disabled>
                                        <span class="input-group-text">Year Graduated:</span>
                                        <input type="number" value="<?php echo $row[0]["secgraduate"] ?>" min="0" class="form-control"  disabled>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Elemetary:</span>
                                        <input type="text" value="<?php echo $row[0]["elementary"] ?>" class="form-control" disabled>
                                        <span class="input-group-text">Year Graduated:</span>
                                        <input type="number" value="<?php echo $row[0]["elemgraduate"] ?>" min="0" class="form-control"  disabled>
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
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Level:</span>
                                        <input type="text" value="<?php echo $row[0]["level"] ?>" class="form-control" disabled>
                                    </div>

                                    <h6 class="mb-4">Requirements</h6>
                                    <?php if ($row[0]["level"] == "N4"): ?>
                                        <div class="testimonial-item text-center">
                                            <h5 class="mb-1"></h5>
                                            <a class="btn btn-primary m-2" href="imageview.php?image=<?php echo $row[0]["certification"] ?>&id=<?php echo $row[0]["application_id"] ?>" >View Cetificate</a>
                                        </div>
                                    <?php endif;?>
                                    <div class="testimonial-item text-center">
                                        <h5 class="mb-1"></h5>
                                        <a class="btn btn-primary m-2" href="imageview.php?image=<?php echo $row[0]["valid_id"] ?>&id=<?php echo $row[0]["application_id"] ?>" >View ID</a>
                                    </div>
                                    <div class="testimonial-item text-center">
                                        <h5 class="mb-1"></h5>
                                        <a class="btn btn-primary m-2" href="imageview.php?image=<?php echo $row[0]["picture"] ?>&id=<?php echo $row[0]["application_id"] ?>" >View Picture</a>
                                    </div>
                                    <div class="testimonial-item text-center">
                                        <h5 class="mb-1"></h5>
                                        <a class="btn btn-primary m-2" href="imageview.php?image=<?php echo $row[0]["birthcert"] ?>&id=<?php echo $row[0]["application_id"] ?>" >View Birth Certificate</a>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here"
                                            id="floatingTextarea" name="comments" style="height: 150px;" required></textarea>
                                        <label for="floatingTextarea">Comments</label>
                                    </div>
                                    <div class="testimonial-item text-center">
                                        <a class="btn btn-primary m-2" href="approve.php?id=<?php echo $row[0]["application_id"] ?>&user_id=<?php echo $row[0]["user_id"] ?>" >Approve</a>
                                        <button type="sumbit" class="btn btn-secondary m-2" href="reject.php?id=<?php echo $row[0]["application_id"] ?>" >Reject</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


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