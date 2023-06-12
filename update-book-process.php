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

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$quantity = $_POST['quantity'];

$mysqli = require("db.php");

// Prepare the SQL statement
if (!isset($_FILES["picture"]) || $_FILES["picture"]["error"] === UPLOAD_ERR_NO_FILE) {
    // No new picture provided, update only other inputs
    $sql = "UPDATE books SET Title = ?, Author = ?, ISBN = ?, Quantity = ? WHERE ID_Book = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssii", $title, $author, $isbn, $quantity, $id);
} else {
    // New picture provided, update picture and other inputs
    $picture = $_FILES["picture"]["name"];
    $tmp_name = $_FILES["picture"]["tmp_name"];
    $picture_path = "assets/img/books/" . $picture; // Update this path to the actual path where you want to store the pictures

    // Move the uploaded picture to the desired location
    if (move_uploaded_file($tmp_name, $picture_path)) {
        // Update picture path and other inputs
        $sql = "UPDATE books SET Title = ?, Author = ?, ISBN = ?, Quantity = ?, Picture = ? WHERE ID_Book = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssisi", $title, $author, $isbn, $quantity, $picture_path, $id);
    } else {
        die("Failed to move uploaded picture.");
    }
}

// Execute the statement
if ($stmt->execute()) {
    echo "SUCCESS";
    header("Location: books.php"); // Redirect to a page after successful update
    exit;
} else {
    die($stmt->error);
}
?>