<?php
require "db_bpjs.php";

$nik = $_GET['nik'] ?? '';

if (!ctype_digit($nik) || strlen($nik) !== 16) {
    die("NIK tidak valid");
}

$stmt = $conn->prepare("DELETE FROM peserta_bpjs WHERE nik = ?");
$stmt->bind_param("s", $nik);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data";
}