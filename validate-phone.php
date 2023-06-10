<?php
$mysqli = require "db.php";

$phone = $_GET["phone"];

$stmt = $mysqli->prepare("SELECT * FROM users WHERE Phone_Number = ?");
$stmt->bind_param("s", $phone);
$stmt->execute();

$result = $stmt->get_result();
$is_available = ($result->num_rows === 0);

header("Content-Type: application/json");
echo json_encode(["available" => $is_available]);

$stmt->close();
$mysqli->close();
?>