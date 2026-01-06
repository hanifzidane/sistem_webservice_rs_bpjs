<?php
require "db_rs.php";

$nik = $_GET['nik'] ?? '';

// if (!ctype_digit($nik) || strlen($nik) !== 16) {
//     die("NIK tidak valid");
// }

$stmt = $mysqli->prepare("DELETE FROM pasien_rs WHERE nik = ?");
$stmt->bind_param("s", $nik);
$stmt->execute();

header("Location: index.php");
exit;