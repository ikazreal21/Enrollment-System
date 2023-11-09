<?php
session_start();

require_once '../database.php';
require_once '../randomstring.php';

$statement = $pdo->prepare('SELECT * FROM tbl_applicationform where user_id = :user_id');
$statement->bindValue(':user_id', $_SESSION["user_id"]);
$statement->execute();
$items = $statement->fetchAll(PDO::FETCH_ASSOC);
$row = $statement->rowCount();


$fullname = '';
$age = 0;
$birthdate = '';
$occupation = '';
$email = '';
$contactnum = '';
$picture = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname = ucwords($_POST['fullname']);
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $occupation = $_POST['occupation'];
    $email = $_POST['email'];
    $contactnum = $_POST['contactnum'];


    if (!is_dir('../upload/img')) {
        mkdir('../inventory/img');
    }

    if (empty($errors)) {
        $picture = $_FILES['picture'];
        $imagePath3 = '';

        if ($picture) {
            $imagePath3 = '../upload/picture/'.randomString(8, 1).'/'.$picture['name'];
            mkdir(dirname($imagePath3));
            move_uploaded_file($picture['tmp_name'], $imagePath3);
        }

        $statement = $pdo->prepare("UPDATE tbl_applicationform set fullname = :fullname, age = :age, birthdate = :birthdate, occupation = :occupation, email = :email, contactnum = :contactnum, picture = :picture WHERE user_id = :user_id");

        $statement->bindValue(':fullname', $fullname);
        $statement->bindValue(':age', $age);
        $statement->bindValue(':birthdate', $birthdate);
        $statement->bindValue(':occupation', $occupation);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':contactnum', $contactnum);
        $statement->bindValue(':picture', $imagePath3);
        $statement->bindValue(':user_id', $_SESSION["user_id"]);
        $statement->execute();
        header('Location: profile.php');
    }
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
                        <a href="index.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Application</a>
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
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Profile</h6>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">FullName:</span>
                                        <input type="text" name="fullname" value="<?php echo $items[0]["fullname"] ?>" class="form-control" required>

                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Age:</span>
                                        <input type="number" min="1" name="age" value="<?php echo $items[0]["age"] ?>" class="form-control" required>
                                        <span class="input-group-text">Birth Date:</span>
                                        <input type="date" name="birthdate" value="<?php echo date($items[0]["birthdate"]) ?>" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Occupation:</span>
                                        <input type="text" name="occupation" value="<?php echo $items[0]["occupation"] ?>" class="form-control" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Email:</span>
                                        <input type="email" name="email" value="<?php echo $items[0]["email"] ?>" class="form-control" required>
                                        <span class="input-group-text">Contact Number:</span>
                                        <input type="number" name="contactnum" value="<?php echo $items[0]["contactnum"] ?>" min="0" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">1 X 1 Formal Picture</label>
                                        <input class="form-control" name="picture" type="file" accept="image/*" id="formFile">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
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