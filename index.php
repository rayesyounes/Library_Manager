<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require "db.php";
    $sql = "SELECT * FROM users WHERE ID_User = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
} else {
    header("location:login.php");
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - RayesReads</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/apexcharts/dist/apexcharts.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php include("scroll-bar.php"); ?>
</head>

<body id="page-top">
    <div id="wrapper">

        <?php include("sidebar.php"); ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <?php include("navbar.php"); ?>

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#">
                            <i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report
                        </a>
                    </div>
                    <?php
                    require("db.php");

                    // Calculate total books
                    $totalBooksQuery = "SELECT SUM(Quantity) AS total FROM books";
                    $totalBooksResult = mysqli_query($mysqli, $totalBooksQuery);
                    $totalBooks = mysqli_fetch_assoc($totalBooksResult)['total'];

                    // Calculate borrowed books
                    $borrowedBooksQuery = "SELECT COUNT(*) AS borrowed FROM borrowers WHERE Status = 'Issued'";
                    $borrowedBooksResult = mysqli_query($mysqli, $borrowedBooksQuery);
                    $borrowedBooks = mysqli_fetch_assoc($borrowedBooksResult)['borrowed'];

                    // Calculate returned books
                    $returnedBooksQuery = "SELECT COUNT(*) AS returned FROM borrowers WHERE Status = 'Returned'";
                    $returnedBooksResult = mysqli_query($mysqli, $returnedBooksQuery);
                    $returnedBooks = mysqli_fetch_assoc($returnedBooksResult)['returned'];

                    // Calculate available books
                    $availableBooks = $totalBooks - $borrowedBooks;
                    ?>

                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"
                                                style="font-size: 16px;">
                                                <span>TOTAL BOOKS</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span style="color: var(--bs-black);font-size: 20px;font-weight: bold;">
                                                    <?php echo $totalBooks; ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"
                                                style="font-size: 16px;">
                                                <span>AVAILABLE BOOKS</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span style="color: var(--bs-black);font-size: 20px;font-weight: bold;">
                                                    <?php echo $availableBooks; ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"
                                                style="font-size: 16px;">
                                                <span>BORROWED BOOKS:</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span style="color: var(--bs-black);font-size: 20px;font-weight: bold;">
                                                    <?php echo $borrowedBooks; ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book-reader fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"
                                                style="font-size: 16px;">
                                                <span>RETURNED BOOKS</span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                                <span style="color: var(--bs-black);font-size: 20px;font-weight: bold;">
                                                    <?php echo $returnedBooks; ?>
                                                </span>
                                            </div>
                                            <div class="text-dark fw-bold h5 mb-0"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-undo fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xl-7">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Borrowing Amount Track</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                            aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                                class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <!-- <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a
                                                class="dropdown-item" href="#"> Action</a><a class="dropdown-item"
                                                href="#"> Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item"
                                                href="#"> Something else here</a>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="chart_2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Books Status</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                            aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                                class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <!-- <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                                    <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#"> Action</a><a class="dropdown-item" href="#"> Another action</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"> Something else here</a>
                                                </div> -->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="chart_4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Borrowing Amount by Month</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                            aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                                class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <!-- <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a
                                                class="dropdown-item" href="#"> Action</a><a class="dropdown-item"
                                                href="#"> Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item"
                                                href="#"> Something else here</a>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="chart_3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Borrowing Amount by users</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                            aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                                class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <!-- <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                                    <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#"> Action</a><a class="dropdown-item" href="#"> Another action</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"> Something else here</a>
                                                </div> -->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="chart_1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
    </div>
    <a class="text-center border rounded scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="assets/bootstrap/js/bootstrap.min.js" defer></script>
    <script src="assets/apexcharts/dist/apexcharts.js" defer></script>
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/charts.js" defer></script>
</body>