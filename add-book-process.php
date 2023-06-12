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

$mysqli = require("db.php");

$sql = "INSERT INTO books (Title, Author, ISBN, Quantity, Picture) VALUES (?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$pictureName = $_FILES["picture"]["name"];
$pictureTmpPath = $_FILES["picture"]["tmp_name"];
$pictureDestination = "uploads/" . $pictureName;

if (!move_uploaded_file($pictureTmpPath, $pictureDestination)) {
    die("Failed to move uploaded picture");
}

$stmt->bind_param(
    "sssss",
    $_POST["title"],
    $_POST["author"],
    $_POST["isbn"],
    $_POST["quantity"],
    $pictureDestination
);

if ($stmt->execute()) {
    echo "SUCCESS";
    header("Location: books.php");
    exit;
} else {
    die($mysqli->error . " " . $mysqli->errno);
}
?>