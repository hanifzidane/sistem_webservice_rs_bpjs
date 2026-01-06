<?php
require "db_bpjs.php";

$stmt = $mysqli->prepare("SELECT * FROM peserta_bpjs ORDER BY nik ASC");
$stmt->execute();
$data = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Peserta BPJS</title>
    <style>
    body {
        font-family: "Segoe UI", Tahoma, sans-serif;
        background: linear-gradient(135deg, #e3f2fd, #f5f7fa);
        padding: 30px;
    }

    .container {
        max-width: 900px;
        margin: auto;
        background: #ffffff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
    }

    h2 {
        text-align: center;
        color: #0d47a1;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    th,
    td {
        padding: 10px 12px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background: #e3f2fd;
        color: #0d47a1;
    }

    .status-aktif {
        color: #2e7d32;
        font-weight: bold;
    }

    .status-non-aktif {
        color: #c62828;
        font-weight: bold;
    }

    .btn {
        padding: 6px 12px;
        border-radius: 6px;
        color: #fff;
        text-decoration: none;
        font-size: 13px;
        display: inline-block;
    }

    .btn-add {
        background: #1e88e5;
    }

    .btn-add:hover {
        background: #1565c0;
    }

    .btn-edit {
        background: #f9a825;
    }

    .btn-edit:hover {
        background: #f57f17;
    }

    .btn-delete {
        background: #e53935;
    }

    .btn-delete:hover {
        background: #c62828;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Data Peserta BPJS</h2>

        <div class="top-bar">
            <span>Total Peserta: <b><?= $data->num_rows ?></b></span>
            <a href="regis_bpjs.php" class="btn btn-add">+ Registrasi BPJS</a>
        </div>

        <table>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Status BPJS</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            while ($row = $data->fetch_assoc()):
                $statusClass = ($row['status_bpjs'] === 'AKTIF')
                    ? 'status-aktif'
                    : 'status-non-aktif';
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nik']) ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td class="<?= $statusClass ?>">
                    <?= htmlspecialchars($row['status_bpjs']) ?>
                </td>
                <td>
                    <a href="edit_bpjs.php?nik=<?= $row['nik'] ?>" class="btn btn-edit">Edit</a>
                    <a href="hapus_bpjs.php?nik=<?= $row['nik'] ?>" class="btn btn-delete"
                        onclick="return confirm('Yakin hapus data ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>