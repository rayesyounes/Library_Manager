<?php

require "db.php";

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Perform a database query to fetch user data based on the ID
    // Adjust this query according to your database structure
    $query = "SELECT * FROM users WHERE ID_User = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();

        // Return the user data as a JSON response
        header('Content-Type: application/json');
        echo json_encode($userData);
    } else {
        echo "User not found.";
    }

    // Close the statement and the database connection
    $stmt->close();
    $mysqli->close();

    exit(); // Terminate the script after sending the JSON response
}
?>