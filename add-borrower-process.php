<?php
if (empty($_POST["cin"])) {
    die("CIN is required");
}

if (empty($_POST["isbn"])) {
    die("ISBN is required");
}

if (empty($_POST["user_id"])) {
    die("User ID is required");
}

if (empty($_POST["book_id"])) {
    die("Book ID is required");
}

if (empty($_POST["return_date"])) {
    die("Return Date is required");
}

$mysqli = require("db.php");

$sql = "INSERT INTO borrowers (ID_User, ID_Book, Issue_Date, Return_Date, Status) VALUES (?, ?, CURDATE(), ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$status = $_POST["status"];

$stmt->bind_param(
    "iiss",
    $_POST["user_id"],
    $_POST["book_id"],
    $_POST["return_date"],
    $status
);

if ($stmt->execute()) {
    echo "SUCCESS";
    header("Location: borrowers.php");
    exit;
} else {
    die($stmt->error . " " . $stmt->errno);
}
?>