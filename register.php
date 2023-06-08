<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - RAYESTECH</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image"
                            style="background-image: url(&quot;assets/img/avatars/pexels-mark-cruzat-3494806.jpg?h=ad4f35e8306e04109461c334f7870582&quot;);">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" method="POST">
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" type="text" id="exampleFirstName"
                                            placeholder="First Name" name="first_name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" type="text" id="exampleLastName"
                                            placeholder="Last Name" name="last_name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" type="text" id="exampleFirstName"
                                            placeholder="Cin" name="cin">
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" type="text" id="exampleLastName"
                                            placeholder="Phone number" name="phone">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input class="form-control form-control-user" type="email" id="exampleInputEmail"
                                        aria-describedby="emailHelp" placeholder="Email" name="email">
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" type="password"
                                            id="examplePasswordInput" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
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
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/js/theme.js"></script>
</body>

</html>

<?php require("db.php"); ?>

<?php
$first_name = "";
$last_name = "";
$email = "";
$password = "";
$password_confirm = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $cin = $_REQUEST['cin'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $password_confirm = $_REQUEST['password_confirm'];

    // $duplicate = 
    $valid = true;

    echo '<div class="my-3">';
    if (empty($first_name)) {
        echo "<h6 class='alert alert-danger my-1'>Your First Name is required</h6>";
        $valid = false;
    }
    if (empty($last_name)) {
        echo "<h6 class='alert alert-danger my-1'>Your Last Name is required</h6>";
        $valid = false;
    }
    if (empty($cin)) {
        echo "<h6 class='alert alert-danger my-1'>The Cin is required</h6>";
        $valid = false;
    }
    if (empty($phone)) {
        echo "<h6 class='alert alert-danger my-1'>the Phone number is required</h6>";
        $valid = false;
    }
    if (empty($email)) {
        echo "<h6 class='alert alert-danger my-1'>The Email is required</h6>";
        $valid = false;
    }
    if (empty($password)) {
        echo "<h6 class='alert alert-danger my-1'>The password is required</h6>";
        $valid = false;
    }
    if (empty($password_confirm)) {
        echo "<h6 class='alert alert-danger my-1'>Please repeat the password</h6>";
        $valid = false;
    }
    echo '</div>';

    if ($valid) {
        try {
            $sql_insert = "INSERT INTO users (Cin, First_name, Last_name, Email, Phone_Number, Pass_key, Is_Admin) VALUES ('{$cin}','{$first_name}', '{$last_name}', '{$email}', '{$phone}', '{$password_confirm}', '0')";
            $conn->query($sql_insert);
            // header("location:registre.php");
        } catch (PDOException $e) {
            echo $sql_insert . "<br>" . $e->getMessage();
        }
    }
}

$conn = null;
?>