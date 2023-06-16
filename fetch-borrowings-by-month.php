<?php
require("db.php");

$query = "SELECT YEAR(Issue_Date) AS Year, MONTH(Issue_Date) AS Month, COUNT(*) AS Count FROM borrowers GROUP BY Year, Month";
$result = mysqli_query($mysqli, $query);

$chartData = [];
while ($row = mysqli_fetch_assoc($result)) {
    $year = $row['Year'];
    $month = $row['Month'];
    $count = $row['Count'];
    $chartData[] = ['year' => (int) $year, 'month' => (int) $month, 'count' => (int) $count];
}

mysqli_close($mysqli);

header('Content-Type: application/json');
echo json_encode($chartData);
?>