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

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$isAdmin = isset($_POST["formCheck"]) ? 1 : 0;

$mysqli = require("db.php");

$sql = "INSERT INTO users (Cin, First_name, Last_name, Email, Phone_Number, Pass_key, Is_Admin, Avatar) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssssssis",
    $_POST["cin"],
    $_POST["first_name"],
    $_POST["last_name"],
    $_POST["email"],
    $_POST["phone"],
    $password_hash,
    $isAdmin,
    $_POST["avatar"]
);

if ($stmt->execute()) {
    echo "SUCCESS";
    header("Location: users.php");
    exit;
} else {
    die($mysqli->error . " " . $mysqli->errno);
}
?>