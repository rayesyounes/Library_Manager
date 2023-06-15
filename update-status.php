<?php
if (isset($_GET['id']) && isset($_GET['Status'])) {
    $borrowerId = $_GET['id'];
    $status = $_GET['Status'];

    $mysqli = require("db.php");

    if ($status === 'Not Returned') {
        $currentDate = date('Y-m-d');
        $sql = "UPDATE borrowers SET Status = CASE WHEN Return_Date <= ? THEN 'Not Returned' ELSE 'Issued' END WHERE ID_Borrower = ?";
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("SQL error: " . $mysqli->error);
        }

        $stmt->bind_param("si", $currentDate, $borrowerId);
    } else {
        $sql = "UPDATE borrowers SET Status = ? WHERE ID_Borrower = ?";
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("SQL error: " . $mysqli->error);
        }

        $stmt->bind_param("si", $status, $borrowerId);
    }

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