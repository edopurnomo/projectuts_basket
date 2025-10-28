<?php
include 'config.php';

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cari Mahasiswa - Basketball Badboy</title>
    <style>
        body {
            background: linear-gradient(120deg, #002b5b, #ff7b00);
            font-family: 'Poppins', sans-serif;
            color: #fff;
            text-align: center;
            padding: 60px 0;
        }

        input[type="text"] {
            padding: 8px;
            border-radius: 8px;
            border: none;
            width: 250px;
        }

        input[type="submit"] {
            background: #ff7b00;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.3);
        }

        img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #ffcc00;
        }

        .back-btn {
            display: inline-block;
            margin-top: 30px;
            background: #003366;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            text-decoration: none;
        }

        .back-btn:hover {
            background: #0055aa;
        }
    </style>
</head>
<body>
    <h2>🔍 Cari Mahasiswa Basket</h2>

    <form method="GET" action="">
        <input type="text" name="keyword" placeholder="Masukkan nama mahasiswa..." value="<?php echo $keyword; ?>">
        <input type="submit" value="Cari">
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
        </tr>

        <?php
        if ($keyword != '') {
            $result = $conn->query("SELECT * FROM tb_mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%'");

            $no = 1;
            if ($result->num_rows > 0) {
                while ($d = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$no++."</td>
                        <td><img src='uploads/".$d['foto']."' alt='foto'></td>
                        <td>".$d['nama']."</td>
                        <td>".$d['nim']."</td>
                        <td>".$d['prodi']."</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Data tidak ditemukan.</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Masukkan kata kunci untuk mencari data.</td></tr>";
        }
        ?>
    </table>

    <a href="list_mhs.php" class="back-btn">⬅️ Kembali ke List</a>
</body>
</html>
