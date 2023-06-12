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
    <title>Users - RayesReads</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/users.css">
</head>

<body id="page-top">
    <div id="wrapper">

        <?php include("sidebar.php"); ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <?php include("navbar.php"); ?>

                <div class="container-fluid">

                    <div class="d-sm-flex justify-content-between align-items-center mb-2">
                        <h3 class="text-dark mb-4">Users</h3>
                        <a id="addUserButton" class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button"
                            href="#">&nbsp;Add User</a>
                    </div>

                    <div id="addUserModal" class="modal">
                        <div class="modal-content">
                            <div class="p-3">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Add User</h4>
                                </div>
                                <hr>
                                <br>
                                <form class="user" id="add_user" method="post" action="add-user-process.php" novalidate>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input class="form-control form-control-user" type="text"
                                                id="add_first_name" placeholder="First Name" name="first_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-user" type="text" id="add_last_name"
                                                placeholder="Last Name" name="last_name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input class="form-control form-control-user" type="text" id="add_cin"
                                                placeholder="Cin" name="cin">
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-user" type="text" id="add_phone"
                                                placeholder="Phone number" name="phone">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control form-control-user" type="email" id="add_email"
                                            aria-describedby="emailHelp" placeholder="Email" name="email">
                                    </div>
                                    <div class=" mb-3">
                                        <input class="form-control form-control-user" type="password" id="add_password"
                                            placeholder="Password" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="add_formCheck"
                                                name="formCheck">
                                            <label class="form-check-label" for="formCheck">
                                                <strong>Admin Access</strong>
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="d-sm-flex justify-content-between align-items-center my-2">
                                        <button class="btn btn-primary btn-user w-50" type="submit" name="add">add
                                            user</button>
                                        <a id="hide_addModal_Button" class="btn btn-secondary btn-user w-40">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


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
                                <table class="table table-hover my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Cin</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $mysqli = require("db.php");
                                        $sql = "SELECT * FROM users WHERE Is_Admin = 0";
                                        $result = $mysqli->query($sql);
                                        ?>
                                        <?php while ($user = $result->fetch_assoc()) {
                                            ; ?>
                                            <tr>
                                                <td>
                                                    <img title="" class="rounded-circle me-2" width="30" height="30"
                                                        src="assets/img/avatars/stockholm.jpg">
                                                    <?php echo $user['First_Name'] . ' ' . $user['Last_Name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $user['Cin']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $user['Phone_Number']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $user['Email']; ?>
                                                </td>
                                                <td>
                                                    <button id="<?php echo $user['ID_User']; ?>"
                                                        class="btn btn-warning btn-sm d-none d-sm-inline-block w-100 updateUserButton"
                                                        type="button">Edit</button>
                                                </td>
                                                <td>
                                                    <a id="" class="btn btn-danger btn-sm d-none d-sm-inline-block w-100"
                                                        href="delete-user-process.php?id=<?php echo $user['ID_User']; ?>">Delete</a>
                                                </td>
                                            </tr>

                                        <?php }
                                        mysqli_close($mysqli);
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Cin</strong></td>
                                            <td><strong>Phone</strong></td>
                                            <td><strong>Email</strong></td>
                                            <td colspan="2"><strong>Actions</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>



                            <div id="updateUserModal" class="modal">
                                <div class="modal-content">
                                    <div class="p-3">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">Update User Info</h4>
                                        </div>
                                        <hr>
                                        <br>
                                        <form class="user" id="update_user" method="post"
                                            action="update-user-process.php" novalidate>
                                            <input type="hidden" name="id" id="id_hidden" value="<?php echo $id; ?>">
                                            <div class="row mb-3">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input class="form-control form-control-user" type="text"
                                                        id="update_first_name" placeholder="First Name"
                                                        name="first_name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input class="form-control form-control-user" type="text"
                                                        id="update_last_name" placeholder="Last Name" name="last_name">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input class="form-control form-control-user" type="text"
                                                        id="update_cin" placeholder="Cin" name="cin">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input class="form-control form-control-user" type="text"
                                                        id="update_phone" placeholder="Phone number" name="phone">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control form-control-user" type="email"
                                                    id="update_email" aria-describedby="emailHelp" placeholder="Email"
                                                    name="email">
                                            </div>
                                            <br>
                                            <div class="mb-3">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="update_formCheck" name="formCheck">
                                                    <label class="form-check-label" for="formCheck">
                                                        <strong>Admin Access</strong>
                                                    </label>
                                                </div>
                                            </div>
                                            <hr>
                                            <br>
                                            <div class="d-sm-flex justify-content-between align-items-center my-2">
                                                <button class="btn btn-primary btn-user w-50" type="submit"
                                                    name="update">Update</button>
                                                <a id="hide_updateModal_Button"
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
                                        $sql = "SELECT COUNT(*) AS total FROM users WHERE is_admin = 0";
                                        $result = $mysqli->query($sql);
                                        $row = $result->fetch_assoc();
                                        $totalUsers = $row['total'];

                                        echo "Showing 1 to " . $totalUsers . " of " . $totalUsers;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include("footer.php"); ?>

        </div>
        <a class="text-center border rounded scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" defer></script>
    <script src="assets/js/validation-update-user.js" defer></script>
    <script src="assets/js/validation-add-user.js" defer></script>
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/users.js" defer></script>
</body>