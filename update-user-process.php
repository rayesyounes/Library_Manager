<?php
if (empty($_POST["first_name"])) {
    die("First Name is required");
}

if (empty($_POST["last_name"])) {
    die("Last Name is required");
}

if (empty($_POST["cin"])) {
    die("Cin is required");
}

if (empty($_POST["phone"])) {
    die("Phone is required");
}

if (empty($_POST["email"])) {
    die("Email is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid Email is required");
}

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$cin = $_POST['cin'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$is_admin = isset($_POST['formCheck']) ? 1 : 0;

$mysqli = require("db.php");

$sql = "UPDATE users SET Cin = ?, First_name = ?, Last_name = ?, Email = ?, Phone_Number = ?, Is_Admin = ? WHERE ID_User = ?";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "sssssii",
    $cin,
    $first_name,
    $last_name,
    $email,
    $phone,
    $is_admin,
    $id
);

if ($stmt->execute()) {
    echo "SUCCESS";
    header("Location: users.php");
    exit;
} else {
    die($mysqli->error . " " . $mysqli->errno);
}
?>