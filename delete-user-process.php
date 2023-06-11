<?php
include("db.php");
if (empty($_GET['id'])) {
    echo 'Not Found';
} else {
    $sql = "DELETE FROM users WHERE ID_User={$_GET['id']}";
    $result = mysqli_query($mysqli, $sql);
    header("location:users.php");
    exit;
}
