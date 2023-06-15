<?php
if (isset($_GET['id'])) {
    $borrowerId = $_GET['id'];

    $mysqli = require("db.php");
    $sql = "DELETE FROM borrowers WHERE ID_Borrower = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("i", $borrowerId);

    if ($stmt->execute()) {
        header("Location: borrowers.php");
        exit;
    } else {
        die($stmt->error);
    }
} else {
    die("Invalid request");
}
?>