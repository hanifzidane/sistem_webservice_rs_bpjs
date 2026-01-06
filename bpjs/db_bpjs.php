<?php
$mysqli = new mysqli("localhost", "root", "", "db_bpjs");

if ($mysqli->connect_errno) {
    echo "Failed to connect BPJS Database: " . $mysqli->connect_error;
    exit();
}