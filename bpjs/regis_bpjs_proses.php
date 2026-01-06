<?php
include "db_bpjs.php";

$nik    = $_POST['nik'];
$nama   = $_POST['nama'];
$status = $_POST['status_bpjs'];

$cek = $mysqli->query("SELECT * FROM peserta_bpjs WHERE nik='$nik'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Registrasi BPJS</title>
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
        text-align: center;
    }

    h3 {
        margin-bottom: 15px;
    }

    .success {
        color: #2e7d32;
    }

    .error {
        color: #c62828;
    }

    .btn {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 16px;
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
    </style>
</head>

<body>

    <div class="card">
        <?php
        if ($cek) {
            echo "<h3 class='error'>NIK sudah terdaftar!</h3>";
            echo "<a href='index.php' class='btn'>Kembali</a>";
        } else {
            $query = $mysqli->query("INSERT INTO peserta_bpjs (nik, nama, status_bpjs) VALUES ('$nik', '$nama', '$status')");

            if ($query) {
                echo "<h3 class='success'>Registrasi BPJS berhasil!</h3>";
            } else {
                echo "<h3 class='error'>Gagal menyimpan data!</h3>";
            }

            echo "<br><a href='index.php' class='btn'>Kembali</a>";
        }
        ?>
    </div>

</body>

</html>