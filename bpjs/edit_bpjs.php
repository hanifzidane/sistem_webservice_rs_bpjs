<?php
require "db_bpjs.php";

$nik = $_GET['nik'] ?? '';

// if (!ctype_digit($nik) || strlen($nik) !== 16) {
//     die("NIK tidak valid");
// }

$stmt = $mysqli->prepare("SELECT * FROM peserta_bpjs WHERE nik = ?");
$stmt->bind_param("s", $nik);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data peserta tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Peserta BPJS</title>

    <style>
    * {
        box-sizing: border-box;
        font-family: "Segoe UI", Tahoma, sans-serif;
    }

    body {
        margin: 0;
        min-height: 100vh;
        background: linear-gradient(135deg, #e3f2fd, #f5f7fa);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        background: #fff;
        width: 100%;
        max-width: 450px;
        padding: 30px;
        border-radius: 14px;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .card h3 {
        text-align: center;
        margin-bottom: 25px;
        color: #0d47a1;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        color: #333;
    }

    input,
    select {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
        transition: border 0.3s, box-shadow 0.3s;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: #1e88e5;
        box-shadow: 0 0 0 3px rgba(30, 136, 229, 0.15);
    }

    .btn {
        width: 100%;
        padding: 12px;
        background: #1e88e5;
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 15px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
    }

    .btn:hover {
        background: #1565c0;
        transform: translateY(-1px);
    }

    .footer-text {
        text-align: center;
        font-size: 12px;
        color: #777;
        margin-top: 15px;
    }
    </style>
</head>

<body>

    <div class="card">
        <h3>Edit Data Peserta BPJS</h3>

        <form method="POST" action="update_bpjs.php">
            <input type="hidden" name="nik" value="<?= htmlspecialchars($data['nik']) ?>">

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
            </div>

            <div class="form-group">
                <label>Status BPJS</label>
                <select name="status_bpjs" required>
                    <option value="AKTIF" <?= $data['status_bpjs'] === 'AKTIF' ? 'selected' : '' ?>>AKTIF</option>
                    <option value="NON-AKTIF" <?= $data['status_bpjs'] === 'NON-AKTIF' ? 'selected' : '' ?>>NON-AKTIF
                    </option>
                </select>
            </div>

            <button type="submit" class="btn">Update Data</button>
        </form>

        <div class="footer-text">
            Sistem Informasi BPJS • Edit Data Peserta
        </div>
    </div>

</body>

</html>