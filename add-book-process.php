<?php
if (empty($_POST["title"])) {
    die("Title is required");
}

if (empty($_POST["author"])) {
    die("author is required");
}

if (empty($_POST["isbn"])) {
    die("ISBN is required");
}

if (empty($_POST["quantity"])) {
    die("Quantity is required");
}

if (empty($_POST["picture"])) {
    die("Picture is required");
}

$mysqli = require("db.php");

$sql = "INSERT INTO books (Title, Author, ISBN, Quantity, Picture) VALUES (?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "sssss",
    $_POST["title"],
    $_POST["author"],
    $_POST["isbn"],
    $_POST["quantity"],
    $_POST["picture"]
);

if ($stmt->execute()) {
    echo "SUCCESS";
    header("Location: books.php");
    exit;
} else {
    die($mysqli->error . " " . $mysqli->errno);
}
?>