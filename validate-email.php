<?php
$mysqli = require "db.php";

$email = $_GET["email"];

$stmt = $mysqli->prepare("SELECT * FROM users WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$is_available = ($result->num_rows === 0);

header("Content-Type: application/json");
echo json_encode(["available" => $is_available]);

$stmt->close();
$mysqli->close();
?>
