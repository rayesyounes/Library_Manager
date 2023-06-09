<?php

require("db.php");

if (empty($_POST["first_name"])) {
    die("First Name is required");
}

if (empty($_POST["last_name"])) {
    die("Last Name is required");
}

if (empty($_POST["cin"])) {
    die("Cin is required");
}

if (empty($_POST["phone"])) {
    die("Phone is required");
}

if (empty($_POST["email"])) {
    die("Email is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid Email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirm"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);



print_r($_REQUEST);
var_dump($password_hash);