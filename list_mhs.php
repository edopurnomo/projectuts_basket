<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Mahasiswa Basket - Basketball Badboy</title>
    <style>
        body {
            background: linear-gradient(120deg, #002b5b, #ff7b00);
            font-family: 'Poppins', sans-serif;
            color: #fff;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-top: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        th {
            background: rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tr:hover {
            background: rgba(255,255,255,0.1);
        }

        img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%; /* bikin bulat */
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        img:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        a {
            color: #fff;
            text-decoration: none;
            margin: 0 5px;
            font-weight: bold;
        }

        a:hover {
            color: #ffcc00;
        }

        .btn-container {
            margin-top: 20px;
        }

        .btn-container a {
            background: #ff7b00;
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
            color: white;
            transition: background 0.3s;
        }

        .btn-container a:hover {
            background: #ffa733;
        }
    </style>
</head>
<body>
    <h2>📋 Daftar Mahasiswa Basket</h2>

    <div class="btn-container">
        <a href="input_mhs.php">➕ Tambah Mahasiswa</a>
        <a href="index.php">🏠 Kembali ke Beranda</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $data = $conn->query("SELECT * FROM tb_mahasiswa");

        if ($data->num_rows > 0) {
            while ($d = $data->fetch_assoc()) {
                echo "<tr>
                    <td>".$no++."</td>
                    <td><img src='uploads/".$d['foto']."' alt='Foto'></td>
                    <td>".$d['nama']."</td>
                    <td>".$d['nim']."</td>
                    <td>".$d['prodi']."</td>
                    <td>
                        <a href='update_mhs.php?id=".$d['id']."'>✏️ Edit</a> |
                        <a href='delete_mhs.php?id=".$d['id']."' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>🗑️ Hapus</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Belum ada data mahasiswa.</td></tr>";
        }
        ?>
    </table>
    <a href="index.php" class="back-btn">⬅️ Kembali</a>
    

</body>
</html>
