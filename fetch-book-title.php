<?php
// fetch-book-title.php
require "db.php";

if (isset($_GET['isbn'])) {
    $isbn = $_GET['isbn'];

    // Perform a database query to fetch the book title based on the ISBN
    // Adjust this query according to your database structure
    $query = "SELECT title FROM books WHERE ISBN = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $isbn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $bookData = $result->fetch_assoc();
        echo $bookData['title'];
    } else {
        echo "Book not found";
    }

    $stmt->close();
    $mysqli->close();
    exit();
}
?>