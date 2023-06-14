<?php
// fetch-user-email.php
require "db.php";

if (isset($_GET['cin'])) {
    $cin = $_GET['cin'];

    // Perform a database query to fetch the user email based on the CIN
    // Adjust this query according to your database structure
    $query = "SELECT email FROM users WHERE cin = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $cin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        echo $userData['email'];
    } else {
        echo "User not found";
    }

    $stmt->close();
    $mysqli->close();
    exit();
}
?>