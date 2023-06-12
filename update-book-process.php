<?php
if (empty($_POST["title"])) {
    die("Title is required");
}

if (empty($_POST["author"])) {
    die("Author is required");
}

if (empty($_POST["isbn"])) {
    die("ISBN is required");
}

if (empty($_POST["quantity"])) {
    die("Quantity is required");
}

if (!isset($_FILES["picture"]) || $_FILES["picture"]["error"] !== UPLOAD_ERR_OK) {
    die("Picture is required");
}










$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$cin = $_POST['cin'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$is_admin = isset($_POST['formCheck']) ? 1 : 0;

$mysqli = require("db.php");

$sql = "UPDATE users SET Cin = ?, First_name = ?, Last_name = ?, Email = ?, Phone_Number = ?, Pass_key = ?, Is_Admin = ? WHERE ID_User = ?";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssssssii",
    $cin,
    $first_name,
    $last_name,
    $email,
    $phone,
    $password_hash,
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