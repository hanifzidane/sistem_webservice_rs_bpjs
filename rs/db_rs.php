<?php
$mysqli = new mysqli("localhost", "root", "", "db_rs");

if ($mysqli->connect_errno) {
    echo "Failed to connect RS Database: " . $mysqli->connect_error;
    exit();
}