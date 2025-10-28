<?php
include 'class_mhs.php';
$mhs = new Mahasiswa();

// Ambil data berdasarkan ID
$id = $_GET['id'];
$data = $mhs->getById($id);

if (!$data) {
    die("Data tidak ditemukan!");
}

// Proses update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $foto_baru = $data['foto'];

    if (!empty($_FILES['foto']['name'])) {
        // Hapus foto lama
        if (file_exists("uploads/" . $data['foto'])) {
            unlink("uploads/" . $data['foto']);
        }
        // Upload foto baru
        $foto_baru = time() . "_" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $foto_baru);
    }

    if ($mhs->update($id, $nama, $nim, $prodi, $foto_baru)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='list_mhs.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Update Mahasiswa - Basketball Badboy</title>
<style>
body {
    background: linear-gradient(135deg, #00264d, #ff8c00);
    font-family: 'Poppins', sans-serif;
    color: #fff;
    text-align: center;
}
.container {
    width: 400px;
    margin: 60px auto;
    background: rgba(255,255,255,0.1);
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}
h2 {
    margin-bottom: 20px;
    text-shadow: 1px 1px 3px #000;
}
input, select {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 10px;
    border: none;
}
button {
    background: #ff8c00;
    color: #fff;
    padding: 10px 20px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}
button:hover {
    background: #ffd700;
    color: #00264d;
}
a {
    color: #fff;
    text-decoration: none;
}
img {
    width: 80px;
    border-radius: 10px;
    margin-top: 10px;
}
</style>
</head>
<body>
    <div class="container">
        <h2>✏️ Edit Data Mahasiswa</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br>
            <input type="text" name="nim" value="<?= $data['nim']; ?>" required><br>
            <input type="text" name="prodi" value="<?= $data['prodi']; ?>" required><br>

            <p>Foto Sekarang:</p>
            <img src="uploads/<?= $data['foto']; ?>" alt="Foto Mahasiswa"><br>

            <label>Ganti Foto (opsional):</label><br>
            <input type="file" name="foto" accept="image/*"><br>

            <button type="submit">💾 Simpan Perubahan</button>
        </form>
        <br>
        <a href="list_mhs.php">⬅️ Kembali ke Daftar</a>
    </div>
</body>
</html>
