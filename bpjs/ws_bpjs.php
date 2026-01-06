<?php
header("Content-Type: application/json");
include "db_bpjs.php";

$input = json_decode(file_get_contents("php://input"), true);
$nik = $input['nik'];

$query = $mysqli->query("SELECT * FROM peserta_bpjs WHERE nik='$nik'");
$data = $query->fetch_assoc();

if (!$data) {
    echo json_encode([
        "status" => "404",
        "message" => "Peserta tidak terdaftar",
        "data" => null
    ]);
    exit();
}

echo json_encode([
    "status" => "200",
    "message" => "Peserta terdaftar",
    "data" => $data
]);