<?php
include("db.php");
if (empty($_GET['id'])) {
    echo 'Not Found';
} else {
    $sql = "DELETE FROM Books WHERE ID_Book={$_GET['id']}";
    $result = mysqli_query($mysqli, $sql);
    header("location:books.php");
    exit;
}