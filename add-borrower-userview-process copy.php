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

// Check if the quantity of the selected book is not 0
$bookId = $_POST["book_id"];
$checkQuantityQuery = "SELECT Quantity FROM books WHERE ID_Book = ?";
$stmt = $mysqli->prepare($checkQuantityQuery);

if (!$stmt) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("i", $bookId);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    die("Invalid book ID");
}

$stmt->bind_result($quantity);
$stmt->fetch();

if ($quantity === 0) {
    die("Book quantity is currently 0. Cannot add borrower.");
}

// Proceed with inserting the borrower into the database
$sql = "INSERT INTO borrowers (ID_User, ID_Book, Issue_Date, Return_Date, Status) VALUES (?, ?, CURDATE(), ?, ?)";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("SQL error: " . $mysqli->error);
}

$status = $_POST["status"];

$stmt->bind_param("iiss", $_POST["user_id"], $_POST["book_id"], $_POST["return_date"], $status);

if ($stmt->execute()) {
    // Update book quantity based on the selected option
    if ($status === 'Issued' || $status === 'Not Returned') {
        $updateQuantity = "UPDATE books SET Quantity = Quantity - 1 WHERE ID_Book = $bookId";
    } elseif ($status === 'Returned') {
        $updateQuantity = "UPDATE books SET Quantity = Quantity + 1 WHERE ID_Book = $bookId";
    }

    if (isset($updateQuantity)) {
        $mysqli->query($updateQuantity);
    }

    echo "SUCCESS";
    header("Location: shelf.php");
    exit;
} else {
    die($stmt->error . " " . $stmt->errno);
}

?>