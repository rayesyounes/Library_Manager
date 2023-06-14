<?php

require "db.php";

if (isset($_GET['isbn'])) {
    $isbn = $_GET['isbn'];

    // Perform a database query to check if the ISBN exists
    $query = "SELECT * FROM books WHERE ISBN = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $isbn);
    $stmt->execute();
    $result = $stmt->get_result();

    $response = ['available' => ($result->num_rows === 0)];

    // Return the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);

    // Close the statement and the database connection
    $stmt->close();
    $mysqli->close();

    exit(); // Terminate the script after sending the JSON response
}

?>