<?php
if (isset($_GET['id']) && isset($_GET['Status'])) {
    $borrowerId = $_GET['id'];
    $status = $_GET['Status'];

    $mysqli = require("db.php");

    // Update borrower's status in the database
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
        // Update book quantity based on borrower's status
        $bookIdQuery = "SELECT ID_Book, Status FROM borrowers WHERE ID_Borrower = $borrowerId";
        $bookIdResult = $mysqli->query($bookIdQuery);

        if ($bookIdResult->num_rows === 1) {
            $bookData = $bookIdResult->fetch_assoc();
            $bookId = $bookData['ID_Book'];
            $bookStatus = $bookData['Status'];

            // Update book quantity based on borrower's status
            if ($bookStatus === 'Issued' || $bookStatus === 'Not Returned') {
                $updateQuantity = "UPDATE books SET Quantity = Quantity - 1 WHERE ID_Book = $bookId";
            } elseif ($bookStatus === 'Returned') {
                $updateQuantity = "UPDATE books SET Quantity = Quantity + 1 WHERE ID_Book = $bookId";
            }

            if (isset($updateQuantity)) {
                $mysqli->query($updateQuantity);
            }
        }

        header("Location: borrowers.php");
        exit;
    } else {
        die($stmt->error);
    }
} else {
    die("Invalid request");
}

?>