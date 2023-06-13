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
    <title>Shelf - RayesReads</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-2">
                        <h3 class="text-dark mb-4">Shelf</h3>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i
                                class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Book Shelf</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <label class="form-label">Show&nbsp;<select
                                                class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label
                                            class="form-label"><input type="search" class="form-control form-control-sm"
                                                aria-controls="dataTable" placeholder="Search"
                                                id="search_bookInput"></label></div>
                                </div>
                            </div>
                            <br>
                            <section class="portfolio-block projects-cards">
                                <div class="container-fluid">
                                    <div class="row justify-content-evenly">
                                        <?php
                                        $mysqli = require("db.php");
                                        $sql = "SELECT * FROM books";
                                        $result = $mysqli->query($sql);
                                        ?>
                                        <?php while ($book = $result->fetch_assoc()) {
                                            ; ?>
                                            <div class="col-md-5 col-lg-2 text-center p-3">
                                                <input type="hidden" value="<?php echo $book['ID_Book']; ?>">
                                                <input type="hidden" value="<?php echo $book['Author']; ?>">
                                                <input type="hidden" value="<?php echo $book['ISBN']; ?>">
                                                <div class="card card-book border-0">
                                                    <a href="#">
                                                        <img class="card-img-top scale-on-hover img-fluid"
                                                            src="<?php echo $book['Picture']; ?>" alt="Card Image" />
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <p>
                                                        <?php echo $book['Title']; ?>
                                                    </p>
                                                    <p hidden>
                                                        <?php echo $book['Author']; ?>
                                                    </p>
                                                    <p hidden>
                                                        <?php echo $book['ISBN']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php }
                                        mysqli_close($mysqli);
                                        ?>
                                    </div>
                                </div>
                            </section>



                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        <?php
                                        $mysqli = require("db.php");
                                        $sql = "SELECT COUNT(*) AS total FROM books";
                                        $result = $mysqli->query($sql);
                                        $row = $result->fetch_assoc();
                                        $totalBooks = $row['total'];

                                        echo "Showing 1 to " . $totalBooks . " of " . $totalBooks;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include("footer.php"); ?>

        </div><a class="text-center border rounded scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js" defer></script>
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/shelf.js" defer></script>


</body>