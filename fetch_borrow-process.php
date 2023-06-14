<?php
// fetch-book-title.php
require "db.php";

if (isset($_GET['isbn'])) {
    $isbn = $_GET['isbn'];

    // Perform a database query to fetch the book title based on the ISBN
    // Adjust this query according to your database structure
    $query = "SELECT Title FROM books WHERE ISBN = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $isbn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $bookData = $result->fetch_assoc();
        echo $bookData['Title'];
    } else {
        echo "Book not found.";
    }

    $stmt->close();
    $mysqli->close();
    exit();
}

// fetch-user-email.php
require "db.php";

if (isset($_GET['cin'])) {
    $cin = $_GET['cin'];

    // Perform a database query to fetch the user email based on the CIN
    // Adjust this query according to your database structure
    $query = "SELECT Email FROM users WHERE Cin = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $cin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        echo $userData['Email'];
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $mysqli->close();
    exit();
}

?>