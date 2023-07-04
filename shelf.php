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
    <link rel="stylesheet" href="assets/css/shelf.css">
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
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-plus-circle"></i> Order Book</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Book Shelf</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <label class="form-label">Show&nbsp;
                                            <select id="showEntriesSelect" class="d-inline-block form-select form-select-sm">
                                                <option value="all" selected>All</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
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
                            <section id="bookSection">
                                <div class="container-fluid p-0">
                                    <div class="row justify-content-evenly">
                                        <?php
                                        $mysqli = require("db.php");
                                        $sql = "SELECT * FROM books WHERE Quantity != 0";
                                        $result = $mysqli->query($sql);
                                        ?>
                                        <?php while ($book = $result->fetch_assoc()) {
                                            ; ?>
                                            <div class="book col-md-5 col-lg-2 text-center p-3">
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

                            <div id="BookModal" class="modal">
                                <div class="modal-content">
                                    <div class="p-3">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">Book Info</h4>
                                        </div>
                                        <hr>
                                        <br>
                                        <form class="book row" id="book" novalidate>
                                            <input type="hidden" name="id" id="id_hidden" value="<?php echo $id; ?>">
                                            <div class="col-4" style="width: 250px; height: 310px;">
                                                <img title="" id="levery" style="width: 100%; height: 100%;"
                                                    class="book-image rounded" src="">
                                            </div>
                                            <div class="col-8">
                                                <div class="row mb-3">
                                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                                        <input class="form-control form-control-user" type="text"
                                                            id="title" placeholder="Title" name="title" disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-user" type="text"
                                                            id="author" placeholder="Author" name="author" disabled>
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input class="form-control form-control-user" type="text"
                                                            id="isbn" placeholder="ISBN" name="isbn" disabled>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <hr>
                                                <br>
                                                <div class="d-sm-flex justify-content-between align-items-center my-2">
                                                    <a class="btn btn-primary btn-user w-50" name="order_book">Order</a>
                                                    <a id="hide_Modal_Button"
                                                        class="btn btn-secondary btn-user w-40">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div id="addBorrowerModal" class="modal">
                                <div class="modal-content">
                                    <div class="p-3">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">Order Book</h4>
                                        </div>
                                        <hr>
                                        <br>
                                        <form class="borrower" id="add_borrower" method="post"
                                            action="add-borrower-userview-process.php" novalidate>
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <input class="form-control form-control-user" type="text"
                                                        id="user_cin" placeholder="User Cin" name="cin" hidden value="<?php echo $user['Cin']; ?>">
                                                </div>
                                                <input type="hidden" name="user_id" value="<?php echo $user['ID_User']; ?>" id="user_id">
                                                <div class="col-sm-12">
                                                    <input class="form-control form-control-user" type="email"
                                                        id="user_email" aria-describedby="emailHelp"
                                                        placeholder="User Email" name="email" value="<?php echo $user['Email']; ?>" disabled>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <input class="form-control form-control-user" type="text"
                                                        id="book_isbn" placeholder="Book ISBN" name="isbn" hidden>
                                                </div>
                                                <input type="hidden" name="book_id" id="book_id">
                                                <div class="col-sm-12">
                                                    <input class="form-control form-control-user" type="email"
                                                        id="book_title" aria-describedby="emailHelp"
                                                        placeholder="Book Title" name="title" disabled>
                                                </div>
                                            </div>

                                            <div class=" mb-3">
                                                <input class="form-control form-control-user" type="date"
                                                    id="return_date" name="return_date">
                                            </div>

                                            <div class=" mb-3" hidden>
                                                <select class="form-control form-control-user" type="date" id="status"
                                                    name="status">
                                                    <option value="Ordered">Ordered</option>
                                                </select>
                                            </div>
                                            <hr>
                                            <br>
                                            <div class="d-sm-flex justify-content-between align-items-center my-2">
                                                <button class="btn btn-primary btn-user w-50" type="submit"
                                                    name="add">Order</button>
                                                <a id="hide_addModal_Button"
                                                    class="btn btn-secondary btn-user w-40">Cancel</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        <?php
                                        $mysqli = require("db.php");
                                        $sql = "SELECT COUNT(*) AS total FROM books";
                                        $result = $mysqli->query($sql);
                                        $row = $result->fetch_assoc();
                                        $totalBooks = $row['total'];
                                        echo "Showing 1 to " . "<span id='msg'>$totalBooks</span>" . " of " . $totalBooks;
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
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" defer></script>
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/shelf.js" defer></script>

</body>
