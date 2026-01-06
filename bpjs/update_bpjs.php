<?php
require "db_bpjs.php";

$nik    = trim($_POST['nik'] ?? '');
$nama   = trim($_POST['nama'] ?? '');
$status = trim($_POST['status_bpjs'] ?? '');

// VALIDASI NIK 
// if (!ctype_digit($nik) || strlen($nik) !== 16) {
//     die("NIK tidak valid");
// }

if ($nama === '') {
    die("Nama tidak boleh kosong");
}

if (!in_array($status, ['AKTIF', 'NON-AKTIF'], true)) {
    die("Status tidak valid");
}

$stmt = $mysqli->prepare(
    "UPDATE peserta_bpjs 
     SET nama = ?, status_bpjs = ? 
     WHERE nik = ?"
);

if (!$stmt) {
    die("Prepare statement gagal");
}

$stmt->bind_param("sss", $nama, $status, $nik);

// EKSEKUSI
if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    $error = "Gagal memperbarui data peserta BPJS";
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Update Peserta BPJS</title>
    <style>
    body {
        font-family: "Segoe UI", Tahoma, sans-serif;
        background: linear-gradient(135deg, #e3f2fd, #f5f7fa);
        min-height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        background: #ffffff;
        width: 420px;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #0d47a1;
    }

    .form-group {
        margin-bottom: 15px;
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
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: #1e88e5;
        box-shadow: 0 0 0 2px rgba(30, 136, 229, 0.2);
    }

    .btn {
        width: 100%;
        padding: 12px;
        background: #1e88e5;
        border: none;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn:hover {
        background: #1565c0;
    }

    .error {
        background: #ffebee;
        color: #c62828;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 15px;
        text-align: center;
    }

    .footer {
        text-align: center;
        margin-top: 15px;
    }

    .footer a {
        text-decoration: none;
        color: #1e88e5;
        font-size: 14px;
    }
    </style>
</head>

<body>

    <div class="card">
        <h2>Update Data BPJS</h2>

        <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="nik" value="<?= htmlspecialchars($nik) ?>">

            <div class="form-group">
                <label>NIK</label>
                <input type="text" value="<?= htmlspecialchars($nik) ?>" disabled>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>" required>
            </div>

            <div class="form-group">
                <label>Status BPJS</label>
                <select name="status_bpjs" required>
                    <option value="AKTIF" <?= $status === 'AKTIF' ? 'selected' : '' ?>>AKTIF</option>
                    <option value="NON-AKTIF" <?= $status === 'NON-AKTIF' ? 'selected' : '' ?>>NON-AKTIF</option>
                </select>
            </div>

            <button type="submit" class="btn">Simpan Perubahan</button>
        </form>

        <div class="footer">
            <a href="index.php">← Kembali ke Data Peserta</a>
        </div>
    </div>

</body>

</html>