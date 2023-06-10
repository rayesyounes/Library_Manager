<?php
$mysqli = require "db.php";

$cin = $_GET["cin"];

$stmt = $mysqli->prepare("SELECT * FROM users WHERE Cin = ?");
$stmt->bind_param("s", $cin);
$stmt->execute();

$result = $stmt->get_result();
$is_available = ($result->num_rows === 0);

header("Content-Type: application/json");
echo json_encode(["available" => $is_available]);

$stmt->close();
$mysqli->close();
?>