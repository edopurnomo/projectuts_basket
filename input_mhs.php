<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Mahasiswa - Basketball Badboy</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #ff8c00, #003366);
            color: #fff;
            text-align: center;
        }
        form {
            background: rgba(255,255,255,0.1);
            padding: 30px;
            border-radius: 12px;
            display: inline-block;
            margin-top: 40px;
        }
        input {
            margin: 8px 0;
            padding: 10px;
            width: 250px;
            border-radius: 5px;
            border: none;
        }
        button {
            background: #fff;
            color: #003366;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #ff8c00;
            color: #fff;
        }
    </style>
</head>
<body>
    <h2>➕ Input Data Mahasiswa Basket</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="nama" placeholder="Nama Mahasiswa" required><br>
        <input type="text" name="nim" placeholder="NIM" required><br>
        <input type="text" name="prodi" placeholder="Program Studi" required><br>
        <label>Upload Foto:</label><br>
        <input type="file" name="foto" accept="image/*" required><br><br>
        <button type="submit" name="submit">Simpan</button>
        <br><br>
        <a href="index.php">⬅️ Kembali</a>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $prodi = $_POST['prodi'];

        // Pastikan folder uploads ada
        $folder = "uploads/";
        if(!is_dir($folder)){
            mkdir($folder, 0777, true);
        }

        // Validasi upload
        if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
            $foto_name = basename($_FILES['foto']['name']);
            $foto_tmp  = $_FILES['foto']['tmp_name'];
            $target = $folder . uniqid() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "_", $foto_name);

            if(move_uploaded_file($foto_tmp, $target)){
                $foto_final = basename($target);
$sql = "INSERT INTO tb_mahasiswa (nama, nim, prodi, foto)
        VALUES ('$nama','$nim','$prodi','$foto_name')";

                if($conn->query($sql)){
                    echo "<p>✅ Data berhasil disimpan!</p>";
                } else {
                    echo "<p>❌ Gagal menyimpan ke database: ".$conn->error."</p>";
                }
            } else {
                echo "<p>⚠️ Gagal memindahkan file ke folder uploads!</p>";
            }
        } else {
            echo "<p>⚠️ File foto belum dipilih atau error saat upload!</p>";
        }
    }
    ?>
</body>
</html>
