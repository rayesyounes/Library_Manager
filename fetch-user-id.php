<?php
// fetch-user-email.php
require "db.php";

if (isset($_GET['cin'])) {
    $cin = $_GET['cin'];

    $query = "SELECT ID_User FROM users WHERE cin = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $cin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        echo $userData['ID_User'];
    } else {
        echo "User not found";
    }

    $stmt->close();
    $mysqli->close();
    exit();
}
?>