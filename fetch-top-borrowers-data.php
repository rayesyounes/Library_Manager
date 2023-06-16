<?php

require("db.php");

$query = "SELECT u.First_Name, u.Last_Name, COUNT(b.ID_Borrower) AS TotalBorrowed
          FROM borrowers b
          INNER JOIN users u ON b.ID_User = u.ID_User
          WHERE b.Status = 'Returned'
          GROUP BY u.ID_User
          ORDER BY TotalBorrowed DESC
          LIMIT 10";

$result = $mysqli->query($query);

$chartData = array();
while ($row = $result->fetch_assoc()) {
    $fullName = $row['First_Name'] . ' ' . $row['Last_Name'];
    $totalBorrowed = intval($row['TotalBorrowed']);

    $chartData[] = array(
        'name' => $fullName,
        'data' => array($totalBorrowed)
    );
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode($chartData);
?>