<?php
require "db_rs.php";

$nik = $_GET['nik'] ?? '';

// if (!ctype_digit($nik) || strlen($nik) !== 16) {
//     die("NIK tidak valid");
// }

$stmt = $mysqli->prepare("SELECT * FROM pasien_rs WHERE nik = ?");
$stmt->bind_param("s", $nik);
$stmt->execute();

$data = $stmt->get_result()->fetch_assoc();
if (!$data) {
    die("Data tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Pasien RS</title>
    <style>
    body {
        font-family: Segoe UI, Tahoma;
        background: #f1f5f9;
        display: flex;
        justify-content: center;
        padding-top: 50px;
    }

    .card {
        background: #fff;
        padding: 25px;
        width: 400px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
    }

    label {
        font-weight: 600;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 8px 0 15px;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #1e88e5;
        border: none;
        color: #fff;
        border-radius: 8px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="card">
        <h3>Edit Data Pasien RS</h3>
        <form method="POST" action="update_rs.php">
            <input type="hidden" name="nik" value="<?= $data['nik'] ?>">
            <label>NIK</label>
            <input type="text" value="<?= $data['nik'] ?>" disabled>

            <label>Nama</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>