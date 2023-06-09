<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location:login.php");
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Not Found - RAYESTECH</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
</head>

<body id="page-top">
    <div id="wrapper">

        <?php include("sidebar.php"); ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <?php include("navbar.php"); ?>

                <div class="container-fluid">
                    <div class="text-center mt-5">
                        <div class="error mx-auto" data-text="404">
                            <p class="m-0">404</p>
                        </div>
                        <p class="text-dark mb-5 lead">Page Not Found</p>
                        <p class="text-black-50 mb-0">It looks like you found a glitch in the matrix...</p><a
                            href="index.php">←
                            Back to Dashboard</a>
                    </div>
                </div>
            </div>

            <?php include("footer.php"); ?>

        </div><a title="#" class="border rounded d-inline scroll-to-top" href="#page-top"><i
                class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js" defer></script>
    <script src="assets/js/script.js" defer></script>
</body>