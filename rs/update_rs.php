<?php
require "db_rs.php";

$nik  = trim($_POST['nik'] ?? '');
$nama = trim($_POST['nama'] ?? '');

// if (!ctype_digit($nik) || strlen($nik) !== 16) {
//     die("NIK tidak valid");
// }

if ($nama === '') {
    die("Nama tidak boleh kosong");
}

$stmt = $mysqli->prepare("UPDATE pasien_rs SET nama = ? WHERE nik = ?");
$stmt->bind_param("ss", $nama, $nik);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
}

die("Gagal update data");