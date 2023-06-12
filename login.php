<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require "db.php";
    $sql = sprintf("SELECT * FROM users WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    if ($user) {

        if (password_verify($_POST["password"], $user["Pass_key"])) {

            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["ID_User"];

            if ($user["Is_Admin"] == 1) {
                header("Location: index.php");
            } else {
                header("Location: users.php");
            }
        }
    }

    $is_invalid = true;
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - RayesReads</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-gradient-primary d-flex align-items-center">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image"
                                    style="background-image: url(&quot;assets/img/avatars/pexels-olena-bohovyk-3646172.jpg&quot;);">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" id="login_form" method="POST" novalidate>

                                        <?php if ($is_invalid): ?>

                                            <div class="alert alert-danger alert-dismissible custom-alert top-0 fade show position-fixed mt-3 start-50 translate-middle-x"
                                                role="alert"><em><strong>Invalid login, please verify your
                                                        credentials</strong></em><button type="button" class="btn-close"
                                                    data-bs-dismiss="alert" aria-label="Close"></button></div>
                                        <?php endif; ?>

                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="email" id="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                                name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                                        </div>

                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="password" id="Password"
                                                placeholder="Password" name="password">
                                        </div>


                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input
                                                        class="form-check-input custom-control-input" type="checkbox"
                                                        id="formCheck-1"><label
                                                        class="form-check-label custom-control-label"
                                                        for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit"
                                            name="login">Login</button>
                                        <hr><a class="btn btn-primary d-block btn-google btn-user w-100 mb-2"
                                            role="button"><i class="fab fa-google"></i>&nbsp; Login with Google</a><a
                                            class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i
                                                class="fab fa-facebook-f"></i>&nbsp; Login with Facebook</a>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.php">Forgot
                                            Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" defer></script>
    <script src="assets/js/validation-login.js" defer></script>
    <script src="assets/js/script.js" defer></script>
</body>