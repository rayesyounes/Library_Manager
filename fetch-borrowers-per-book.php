<?php
require("db.php");

// Get the selected year from the request, default to the current year
$selectedYear = isset($_GET['year']) ? intval($_GET['year']) : date('Y');

// Fetch borrowers per book per month for the selected year
$query = "SELECT b.ID_Book, b.Title, YEAR(br.Issue_Date) AS Year, MONTH(br.Issue_Date) AS Month, COUNT(*) AS Count
          FROM books AS b
          INNER JOIN borrowers AS br ON b.ID_Book = br.ID_Book
          WHERE YEAR(br.Issue_Date) = $selectedYear
          GROUP BY b.ID_Book, Year, Month";
$result = mysqli_query($mysqli, $query);

// Prepare data for the chart
$chartData = [];
while ($row = mysqli_fetch_assoc($result)) {
    $bookID = $row['ID_Book'];
    $bookTitle = $row['Title'];
    $year = $row['Year'];
    $month = $row['Month'];
    $count = $row['Count'];
    $chartData[] = ['bookID' => $bookID, 'bookTitle' => $bookTitle, 'year' => $year, 'month' => $month, 'count' => $count];
}

// Close the database connection
mysqli_close($mysqli);

// Return the chart data as JSON
header('Content-Type: application/json');
echo json_encode($chartData);
?>