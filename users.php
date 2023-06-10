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
    <title>Users - RAYESTECH</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="page-top">
    <div id="wrapper">

        <?php include("sidebar.php"); ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <?php include("navbar.php"); ?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Users</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Users Info</p>
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
                                            <th>Name</th>
                                            <th>Cin</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img title="" class="rounded-circle me-2" width="30" height="30"
                                                    src="assets/img/avatars/stockholm.jpg">Rayes
                                                Younes</td>
                                            <td>L649596</td>
                                            <td>0642599866</td>
                                            <td>Younes@email.com</td>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Cin</strong></td>
                                            <td><strong>Phone</strong></td>
                                            <td><strong>Email</strong></td>
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
                                <div class="col-md-6">
                                    <nav
                                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" aria-label="Previous"
                                                    href="#"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span
                                                        aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include("footer.php"); ?>

        </div><a title="#" class="border rounded d-inline scroll-to-top" href="#page-top"><i
                class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>