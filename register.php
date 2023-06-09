<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - RAYESTECH</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary d-flex align-items-center">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image"
                            style="background-image: url(&quot;assets/img/avatars/pexels-mark-cruzat-3494806.jpg&quot;);">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" method="post" action="register-process.php" novalidate>

                                <div class="row mb-3">                                
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="first_name"></label>
                                        <input class="form-control form-control-user" type="text" id="exampleFirstName"
                                            placeholder="First Name" name="first_name">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="last_name"></label>
                                        <input class="form-control form-control-user" type="text" id="exampleLastName"
                                            placeholder="Last Name" name="last_name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="cin"></label>
                                        <input class="form-control form-control-user" type="text" id="exampleFirstName"
                                            placeholder="Cin" name="cin">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="phone"></label>
                                        <input class="form-control form-control-user" type="text" id="exampleLastName"
                                            placeholder="Phone number" name="phone">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email"></label>
                                    <input class="form-control form-control-user" type="email" id="exampleInputEmail"
                                        aria-describedby="emailHelp" placeholder="Email" name="email">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password"></label>
                                        <input class="form-control form-control-user" type="password"
                                            id="examplePasswordInput" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="password_confirm"></label>
                                        <input class="form-control form-control-user" type="password"
                                            id="exampleRepeatPasswordInput" placeholder="Confirm Password"
                                            name="password_confirm">
                                    </div>

                                </div><button class="btn btn-primary d-block btn-user w-100" type="submit"
                                    name="submit">Register Account</button>

                                <hr>
                                <a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i
                                        class="fab fa-google"></i>&nbsp; Register with Google</a><a
                                    class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i
                                        class="fab fa-facebook-f"></i>&nbsp; Register with Facebook
                                </a>
                                <hr>
                            </form>
                            <div class="text-center"><a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center"><a class="small" href="login.php">Already have an account?
                                    Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>