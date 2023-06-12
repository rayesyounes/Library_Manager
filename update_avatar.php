<?php
$mysqli = require "db.php";

if (isset($_FILES['photoInput']) && $_FILES['photoInput']['error'] === UPLOAD_ERR_OK) {
    $userID = $_POST['id']; 
    $avatarPath = 'assets/img/avatars/';

    // Generate a unique filename for the uploaded avatar
    $avatarName = uniqid('avatar_') . '_' . basename($_FILES['photoInput']['name']);
    $avatarPath = $avatarPath . $avatarName; // Append the filename to the directory path

    if (move_uploaded_file($_FILES['photoInput']['tmp_name'], $avatarPath)) {
 
        $query = "UPDATE users SET Avatar = ? WHERE ID_User = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("si", $avatarPath, $userID);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location: " . $_SERVER['REQUEST_URI']);
            // echo "Avatar updated successfully.";
        } else {
            echo "Failed to update the avatar.";
        }
    } else {
        echo "Error moving the uploaded file.";
    }
}
?>