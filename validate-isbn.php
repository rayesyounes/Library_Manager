<?php
$mysqli = require "db.php";

$isbn = $_GET["isbn"];

$stmt = $mysqli->prepare("SELECT * FROM books WHERE ISBN = ?");
$stmt->bind_param("s", $isbn);
$stmt->execute();

$result = $stmt->get_result();
$is_available = ($result->num_rows === 0);

header("Content-Type: application/json");
echo json_encode(["available" => $is_available]);

$stmt->close();
$mysqli->close();
?>