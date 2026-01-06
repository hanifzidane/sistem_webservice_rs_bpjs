<?php
$hasil = json_decode(file_get_contents("hasil.json"), true);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Cek BPJS</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #f5f7fa);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            background: #ffffff;
            width: 100%;
            max-width: 450px;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #0d47a1;
        }

        .data {
            background: #f9fbfd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .data p {
            margin: 8px 0;
            color: #333;
        }

        .status-aktif {
            color: #2e7d32;
            font-weight: bold;
        }

        .status-nonaktif {
            color: #c62828;
            font-weight: bold;
        }

        .error {
            background: #ffebee;
            color: #c62828;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
        }

        .btn {
            display: block;
            text-align: center;
            padding: 10px;
            margin-top: 10px;
            background: #1e88e5;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #1565c0;
        }

        .btn-secondary {
            background: #e3f2fd;
            color: #1e88e5;
        }

        .btn-secondary:hover {
            background: #bbdefb;
        }
    </style>
</head>

<body>

    <div class="card">
        <h3>Hasil Cek Peserta BPJS</h3>

        <?php if ($hasil['status'] == "200") { ?>
            <div class="data">
                <p><b>NIK:</b> <?= $hasil['data']['nik']; ?></p>
                <p><b>Nama:</b> <?= $hasil['data']['nama']; ?></p>
                <p>
                    <b>Status BPJS:</b>
                    <span
                        class="<?= strtolower($hasil['data']['status_bpjs']) == 'aktif' ? 'status-aktif' : 'status-nonaktif'; ?>">
                        <?= $hasil['data']['status_bpjs']; ?>
                    </span>
                </p>
            </div>
        <?php } else { ?>
            <div class="error">
                <?= $hasil['message']; ?>
            </div>
        <?php } ?>

        <a href="index.php" class="btn">Cek Lagi</a>
    </div>

</body>

</html>