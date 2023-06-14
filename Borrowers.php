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
    <title>Borrowers - RayesReads</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/borrowers.css">
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
                        <h3 class="text-dark mb-4">Borrowers</h3>
                        <a id="addBorrowerButton" class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#">Add Borrower</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Borrowers Info</p>
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
                                                aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Book</th>
                                            <th>Issue Date</th>
                                            <th>Return Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>User</strong></td>
                                            <td><strong>Book</strong></td>
                                            <td><strong>Issue Date</strong></td>
                                            <td><strong>Return Date</strong></td>
                                            <td><strong>Status</strong></td>
                                            <td><strong>Action</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 27</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div id="addBorrowerModal" class="modal">
                <div class="modal-content">
                    <div class="p-3">
                        <div class="text-center">
                            <h4 class="text-dark mb-4">Add Borrower</h4>
                        </div>
                        <hr>
                        <br>
                        <form class="borrower" id="add_borrower" method="post" action="add-borrower-process.php" novalidate>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <input class="form-control form-control-user" type="text" id="user_cin"
                                        placeholder="User Cin" name="cin">
                                </div>
                                <input type="hidden" name="user_id" id="user_id">
                                <div class="col-sm-8">
                                    <input class="form-control form-control-user" type="email" id="user_email"
                                        aria-describedby="emailHelp" placeholder="User Email" name="email" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <input class="form-control form-control-user" type="text" id="book_isbn"
                                    placeholder="Book ISBN" name="isbn">
                                </div>
                                <input type="hidden" name="book_id" id="book_id">
                                <div class="col-sm-8">
                                    <input class="form-control form-control-user" type="email" id="book_title"
                                        aria-describedby="emailHelp" placeholder="Book Title" name="title" disabled>
                                </div>
                            </div>

                            <div class=" mb-3">
                                <input class="form-control form-control-user" type="date" id="return_date" name="return_date">
                            </div>
                            
                            <div class=" mb-3">
                                <select class="form-control form-control-user" type="date" id="status" name="status">
                                    <option value="Issued">Issued</option>
                                    <option value="Returned">Returned</option>
                                    <option value="Not Returned">Not Returned</option>
                                    <option value="Ordered">Ordered</option>
                                </select>
                            </div>
                            <hr>
                            <br>
                            <div class="d-sm-flex justify-content-between align-items-center my-2">
                                <button class="btn btn-primary btn-user w-50" type="submit" name="add">add Borrower</button>
                                <a id="hide_addModal_Button" class="btn btn-secondary btn-user w-40">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <?php include("footer.php"); ?>

        </div><a class="text-center border rounded scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" defer></script>
    <script src="assets/js/validation-borrowers.js" defer></script>
    <script src="assets/js/borrowers.js" defer></script>
    <script src="assets/js/script.js" defer></script>
</body>