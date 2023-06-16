<?php
require("db.php");

// Fetch book status
$query = "SELECT Status, COUNT(*) AS Count
          FROM borrowers
          WHERE Status IN ('Returned', 'Ordered', 'Not Returned', 'Issued')
          GROUP BY Status";
$result = mysqli_query($mysqli, $query);

// Prepare data for the chart
$chartData = [];
while ($row = mysqli_fetch_assoc($result)) {
    $status = $row['Status'];
    $count = $row['Count'];
    $chartData[] = ['status' => $status, 'count' => $count];
}

// Close the database connection
mysqli_close($mysqli);

// Return the chart data as JSON
header('Content-Type: application/json');
echo json_encode($chartData);
?>