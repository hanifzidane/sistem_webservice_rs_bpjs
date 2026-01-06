<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Cek BPJS</title>
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
            max-width: 400px;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #0d47a1;
        }

        label {
            font-size: 14px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #1e88e5;
            box-shadow: 0 0 0 2px rgba(30, 136, 229, 0.2);
        }

        button {
            width: 100%;
            padding: 10px;
            background: #1e88e5;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #1565c0;
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }

        .link a {
            text-decoration: none;
            color: #1e88e5;
            font-size: 14px;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="card">
        <h3>Cek Status Peserta BPJS</h3>

        <form action="cek_data_rs.php" method="POST">
            <label>Masukkan NIK</label>
            <input type="text" name="nik" placeholder="Contoh: 123xxxxx" required>
            <button type="submit">Cek Data</button>
        </form>

        <div class="link">
            <a href="regis_rs.php">Registrasi Pasien RS</a>
        </div>
    </div>

</body>

</html>