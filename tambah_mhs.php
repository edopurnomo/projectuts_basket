<?php
include 'class_mhs.php';
$mhs = new Mahasiswa();

if(isset($_POST['submit'])){
    $fotoName = null;
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
        $fotoName = time().'_'.basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/'.$fotoName);
    }
    $mhs->create($_POST['nama'], $_POST['nim'], $_POST['prodi'], $fotoName);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa Basket</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #f0f4ff, #d9e4ff);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #0a2e85;
            margin-bottom: 20px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        button {
            background-color: #ff7b00;
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: #ff9800;
        }
        a.back {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #0a2e85;
            font-weight: 600;
        }
        a.back:hover {
            color: #ff7b00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Mahasiswa Basket 🏀</h2>
        <form method="post" enctype="multipart/form-data">
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama" required>

            <label>NIM</label>
            <input type="text" name="nim" required>

            <label>Program Studi</label>
            <input type="text" name="prodi" required>

            <label>Upload Foto</label>
            <input type="file" name="foto" accept="image/*">

            <button type="submit" name="submit">Simpan Data</button>
        </form>
        <a href="index.php" class="back">← Kembali ke daftar</a>
    </div>
</body>
</html>
