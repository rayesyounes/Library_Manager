<?php
// fetch-book-title.php
require "db.php";

if (isset($_GET['isbn'])) {
    $isbn = $_GET['isbn'];

    $query = "SELECT ID_Book FROM books WHERE ISBN = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $isbn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $bookData = $result->fetch_assoc();
        echo $bookData['ID_Book'];
    } else {
        echo "Book not found";
    }

    $stmt->close();
    $mysqli->close();
    exit();
}
?>