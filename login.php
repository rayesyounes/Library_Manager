<?php
session_start();
include "db.php";
if (isset($_REQUEST["login"])) {
    if ($_REQUEST["email"] == "" or $_REQUEST["password"] == "") {
        echo '<div class="alert alert-warning alert-dismissible custom-alert top-0 fade show position-fixed mt-3 start-50 translate-middle-x" role="alert">
        <strong>Alert : </strong> Email or Password cannot be empty!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } else {
        $email = strip_tags(trim($_REQUEST["email"]));
        $password = strip_tags(trim($_REQUEST["password"]));

        $query = $conn->prepare("SELECT * FROM users WHERE email=? AND pass_key=?");
        $query->execute(array($email, $password));
        $control = $query->fetch(PDO::FETCH_OBJ);
        if ($control > 0) {
            $_SESSION["email"] = $email;
            header("location:index.php");
        }
        echo '<div class="alert alert-danger alert-dismissible custom-alert top-0 fade show position-fixed mt-3 start-50 translate-middle-x" role="alert">
        <strong>Alert : </strong> Incorrect Email or Password!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - RAYESTECH</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image"
                                    style="background-image: url(&quot;assets/img/avatars/pexels-olena-bohovyk-3646172.jpg?h=bd5ac307f144ab65ca2625554428a65a&quot;);">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user" method="POST" action="" novalidate>
                                        
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password">
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>