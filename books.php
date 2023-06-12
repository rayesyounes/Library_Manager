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
    <title>Books - RAYESTECH</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/books.css">
</head>

<body id="page-top">
    <div id="wrapper">

        <?php include("sidebar.php"); ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <?php include("navbar.php"); ?>

                <div class="container-fluid">

                    <div class="d-sm-flex justify-content-between align-items-center mb-2">
                        <h3 class="text-dark mb-4">Books</h3>
                        <a id="addBookButton" class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button"
                            href="#">&nbsp;Add Book</a>
                    </div>

                    <div id="addBookModal" class="modal">
                        <div class="modal-content">
                            <div class="p-3">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Add Book</h4>
                                </div>
                                <hr>
                                <br>
                                <form class="book" id="add_book" method="post" action="add-book-process.php"
                                    enctype="multipart/form-data" novalidate>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input class="form-control form-control-user" type="text" id="add_title"
                                                placeholder="Title" name="title">
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-user" type="text" id="add_author"
                                                placeholder="Author" name="author">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input class="form-control form-control-user" type="text" id="add_isbn"
                                                placeholder="ISBN" name="isbn">
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-user" type="text" id="add_quantity"
                                                placeholder="Quantity" name="quantity">
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <input class="form-control form-control-user" type="file" id="add_picture"
                                            placeholder="Livery" name="picture">
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="d-sm-flex justify-content-between align-items-center my-2">
                                        <button class="btn btn-primary btn-user w-50" type="submit" name="add_book">Add
                                            Book</button>
                                        <a id="hide_addModal_Button" class="btn btn-secondary btn-user w-40">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Book Info</p>
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
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>ISBN</th>
                                            <th>Quantity</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $mysqli = require("db.php");
                                        $sql = "SELECT * FROM books ";
                                        $result = $mysqli->query($sql);
                                        ?>
                                        <?php while ($book = $result->fetch_assoc()) {
                                            ; ?>
                                            <tr>
                                                <td>
                                                    <img title="" class="rounded-circle me-2" width="30" height="30"
                                                        src="<?php echo $book['Picture']; ?>">
                                                    <?php echo $book['Title']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $book['Author']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $book['ISBN']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $book['Quantity']; ?>
                                                </td>
                                                <td>
                                                    <button id="<?php echo $book['ID_Book']; ?>"
                                                        class="btn btn-warning btn-sm d-none d-sm-inline-block w-100 updateBookButton"
                                                        type="button">Edit</button>
                                                </td>
                                                <td>
                                                    <a id="" class="btn btn-danger btn-sm d-none d-sm-inline-block w-100"
                                                        href="delete-book-process.php?id=<?php echo $book['ID_Book']; ?>">Delete</a>
                                                </td>
                                            </tr>

                                        <?php }
                                        mysqli_close($mysqli);
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Title</strong></td>
                                            <td><strong>Author</strong></td>
                                            <td><strong>ISBN</strong></td>
                                            <td><strong>Quantity</strong></td>
                                            <td colspan="2"><strong>Actions</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>


                            <div id="updateBookModal" class="modal">
                                <div class="modal-content">
                                    <div class="p-3">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">update Book</h4>
                                        </div>
                                        <hr>
                                        <br>
                                        <form class="book row" id="update_book" method="post"
                                            action="update-book-process.php" enctype="multipart/form-data" novalidate>
                                            <input type="hidden" name="id" id="id_hidden" value="<?php echo $id; ?>">
                                            <div class="col-4" style="width: 250px; height: 290px;">
                                                <img title="" id="levery" style="width: 100%; height: 100%;" class="book-image" style="" src="">
                                            </div>
                                            <div class="col-8">
                                                <div class="row mb-3">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input class="form-control form-control-user" type="text"
                                                            id="update_title" placeholder="Title" name="title">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-user" type="text"
                                                            id="update_author" placeholder="Author" name="author">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input class="form-control form-control-user" type="text"
                                                            id="update_isbn" placeholder="ISBN" name="isbn">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-user" type="text"
                                                            id="update_quantity" placeholder="Quantity" name="quantity">
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <input class="form-control form-control-user" type="file"
                                                        id="update_picture" placeholder="Livery" name="picture">
                                                </div>
                                                <br>
                                                <hr>
                                                <br>
                                                <div class="d-sm-flex justify-content-between align-items-center my-2">
                                                    <button class="btn btn-primary btn-user w-50" type="submit"
                                                        name="update_book">Update</button>
                                                    <a id="hide_updateModal_Button"
                                                        class="btn btn-secondary btn-user w-40">Cancel</a>
                                                </div>
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
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" defer></script>
    <script src="assets/js/validation-update-book.js" defer></script>
    <script src="assets/js/validation-add-book.js" defer></script>
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/books.js" defer></script>
</body>