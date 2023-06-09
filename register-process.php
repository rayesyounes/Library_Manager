<?php

require("db.php");

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
        echo "<h6 class='alert alert-warning my-1'>Your First Name is required</h6>";
        $valid = false;
    }
    if (empty($last_name)) {
        echo "<h6 class='alert alert-warning my-1'>Your Last Name is required</h6>";
        $valid = false;
    }
    if (empty($cin)) {
        echo "<h6 class='alert alert-warning my-1'>The Cin is required</h6>";
        $valid = false;
    }
    if (empty($phone)) {
        echo "<h6 class='alert alert-warning my-1'>the Phone number is required</h6>";
        $valid = false;
    }
    if (empty($email)) {
        echo "<h6 class='alert alert-warning my-1'>The Email is required</h6>";
        $valid = false;
    }
    if (empty($password)) {
        echo "<h6 class='alert alert-warning my-1'>The password is required</h6>";
        $valid = false;
    }
    if (empty($password_confirm)) {
        echo "<h6 class='alert alert-warning my-1'>Please repeat the password</h6>";
        $valid = false;
    }
    echo '</div>';

    if ($valid) {
        try {
            $sql_insert = "INSERT INTO users (Cin, First_name, Last_name, Email, Phone_Number, Pass_key, Is_Admin) VALUES ('{$cin}','{$first_name}', '{$last_name}', '{$email}', '{$phone}', '{$password_confirm}', '0')";
            $conn->query($sql_insert);
            header("location:login.php");
        } catch (PDOException $e) {
            echo $sql_insert . "<br>" . $e->getMessage();
        }
    }
}

$conn = null;
?>