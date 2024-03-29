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

<?php if (isset($user)): ?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Profile - RayesReads</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/profile.css">
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
                        <h3 class="text-dark mb-4">Profile</h3>
                        <div class="row mb-3">
                            <div class="col-lg-4 col-xxl-4 offset-xxl-0">
                                <div class="card mb-3">
                                    <div class="card-body text-center shadow">
                                        <form id="UpdateAvatar" action="update_avatar.php" name="update_avatar"
                                            method="post">
                                            <input type="hidden" name="id" id="id_hidden"
                                                value="<?php echo $user["ID_User"]; ?>">
                                            <img id="profileImage"
                                                title="<?php echo htmlspecialchars($user["First_Name"] . " " . $user["Last_Name"]); ?>"
                                                class="rounded-circle mb-3 mt-4"
                                                src="<?php echo htmlspecialchars($user["Avatar"]); ?>" width="160"
                                                height="160">
                                            <div class="mb-3">
                                                <button id="changePhotoBtn" class="btn btn-primary btn-sm"
                                                    type="button">Change Photo</button>
                                                <input id="photoInput" type="file" style="display: none;">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card shadow mb-5">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 fw-bold">Forum Settings</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form>
                                                    <div class="mb-3"><label class="form-label"
                                                            for="signature"><strong>Signature</strong><br></label><textarea
                                                            class="form-control" id="signature" rows="4"
                                                            name="signature"></textarea></div>
                                                    <div class="mb-3">
                                                        <div class="form-check form-switch"><input class="form-check-input"
                                                                type="checkbox" id="formCheck-1"><label
                                                                class="form-check-label" for="formCheck-1"><strong>Notify me
                                                                    about new replies</strong></label></div>
                                                    </div>
                                                    <div class="mb-3"><button class="btn btn-primary btn-sm"
                                                            type="submit">Save Settings</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">User Settings</p>
                                            </div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"
                                                                    for="username"><strong>Username</strong></label><input
                                                                    class="form-control" type="text" id="username"
                                                                    placeholder="<?php echo htmlspecialchars($user["Last_Name"] . " " . $user["First_Name"]); ?>"
                                                                    name="username"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"
                                                                    for="email"><strong>Email Address</strong></label><input
                                                                    class="form-control" type="email" id="email"
                                                                    placeholder="<?php echo htmlspecialchars($user["Email"]); ?>"
                                                                    name="email"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"
                                                                    for="first_name"><strong>First
                                                                        Name</strong></label><input class="form-control"
                                                                    type="text" id="first_name"
                                                                    placeholder="<?php echo htmlspecialchars($user["First_Name"]); ?>"
                                                                    name="first_name"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"
                                                                    for="last_name"><strong>Last Name</strong></label><input
                                                                    class="form-control" type="text" id="last_name"
                                                                    placeholder="<?php echo htmlspecialchars($user["Last_Name"]); ?>"
                                                                    name="last_name"></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3"><button class="btn btn-primary btn-sm"
                                                            type="submit">Save Settings</button></div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card shadow">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">Contact Settings</p>
                                            </div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="mb-3"><label class="form-label"
                                                            for="address"><strong>Address</strong></label><input
                                                            class="form-control" type="text" id="address"
                                                            placeholder="Street address" name="address"></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"
                                                                    for="city"><strong>City</strong></label><input
                                                                    class="form-control" type="text" id="city"
                                                                    placeholder="Tetouan" name="city"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label"
                                                                    for="country"><strong>Country</strong></label><input
                                                                    class="form-control" type="text" id="country"
                                                                    placeholder="MA" name="country"></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3"><button class="btn btn-primary btn-sm"
                                                            type="submit">Save&nbsp;Settings</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include("footer.php"); ?>

                </div>
            </div>
            <a class="btn btn-sm scroll-to-top border-0 align-items-center justify-content-center" href="#page-top">
                <i class="fas fa-lg fa-arrow-circle-up"></i>
            </a>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/profile.js" defer></script>
        <script src="assets/js/script.js" defer></script>
    </body>
<?php endif; ?>