<?php
include "db_rs.php";

$nik = $_POST['nik'];

$query = $mysqli->query("SELECT * FROM pasien_rs WHERE nik='$nik'");
$cek = $query->fetch_assoc();

if (!$cek) {
    echo "<h3>Pasien tidak terdaftar di database RS.</h3>";
    echo "<a href='form.php'>Kembali</a>";
    exit();
}

$url = "http://webservice.test:8081/bpjs/ws_bpjs.php";

$data = ['nik' => $nik];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (!$response) {
    file_put_contents("hasil.json", "CURL ERROR: " . curl_error($ch));
    curl_close($ch);
    header("Location: tampil.php");
    exit();
}

curl_close($ch);

file_put_contents("debug_curl.txt", $response);
file_put_contents("hasil.json", $response);

header("Location: tampil.php");