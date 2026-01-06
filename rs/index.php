<?php
require "db_rs.php";

$stmt = $mysqli->prepare("SELECT * FROM pasien_rs ORDER BY nik ASC");
$stmt->execute();
$data = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Pasien RS</title>
    <style>
    body {
        font-family: "Segoe UI", Tahoma, sans-serif;
        background: linear-gradient(135deg, #e3f2fd, #f5f7fa);
        padding: 30px;
    }

    .container {
        max-width: 900px;
        margin: auto;
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
    }

    h2 {
        text-align: center;
        color: #0d47a1;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    th,
    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background: #e3f2fd;
    }

    .btn {
        padding: 6px 12px;
        border-radius: 6px;
        color: #fff;
        text-decoration: none;
        font-size: 13px;
    }

    .edit {
        background: #f9a825;
    }

    .delete {
        background: #e53935;
    }

    .edit:hover {
        background: #f57f17;
    }

    .delete:hover {
        background: #c62828;
    }

    .cek-bpjs {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px dashed #ccc;
    }

    .cek-bpjs h3 {
        margin-bottom: 15px;
        color: #0d47a1;
    }

    .cek-form {
        display: flex;
        gap: 10px;
        max-width: 450px;
    }

    .cek-form input {
        flex: 1;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
    }

    .cek-form input:focus {
        outline: none;
        border-color: #1e88e5;
        box-shadow: 0 0 0 2px rgba(30, 136, 229, .2);
    }

    .cek-form button {
        padding: 10px 18px;
        background: #1e88e5;
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 14px;
        cursor: pointer;
    }

    .cek-form button:hover {
        background: #1565c0;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Data Pasien Rumah Sakit</h2>

        <table>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>

            <?php $no = 1;
            while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nik']) ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td>
                    <a class="btn edit" href="edit_rs.php?nik=<?= $row['nik'] ?>">Edit</a>
                    <a class="btn delete" href="hapus_rs.php?nik=<?= $row['nik'] ?>"
                        onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <div class="cek-bpjs">
            <h3>Cek Status BPJS</h3>
            <form action="cek_data_rs.php" method="POST" class="cek-form">
                <input type="text" name="nik" maxlength="16" required placeholder="Masukkan NIK">
                <button type="submit">Cek BPJS</button>
            </form>
        </div>

    </div>
</body>

</html>