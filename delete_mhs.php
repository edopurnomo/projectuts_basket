<?php
include 'class_mhs.php';
$mhs = new Mahasiswa();

// Pastikan ada parameter ID di URL
if (!isset($_GET['id'])) {
    die("<h2 style='color:red;text-align:center;'>ID tidak ditemukan!</h2>");
}

$id = $_GET['id'];
$data = $mhs->getById($id);

if (!$data) {
    die("<h2 style='color:red;text-align:center;'>Data tidak ditemukan!</h2>");
}

// Hapus data (termasuk foto di dalam class delete)
if ($mhs->delete($id)) {
    $message = "Data berhasil dihapus!";
    $status = "success";
} else {
    $message = "Gagal menghapus data!";
    $status = "error";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Hapus Data Mahasiswa - Basketball Badboy</title>
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #ff8c00, #00264d);
    color: #fff;
    text-align: center;
    margin-top: 100px;
}
.box {
    width: 400px;
    margin: auto;
    background: rgba(255,255,255,0.1);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    animation: fadeIn 0.6s ease-in-out;
}
h2 {
    margin-bottom: 10px;
}
p {
    font-size: 18px;
}
a {
    display: inline-block;
    background: #ff8c00;
    color: #fff;
    text-decoration: none;
    padding: 10px 25px;
    border-radius: 25px;
    margin-top: 20px;
    transition: 0.3s;
}
a:hover {
    background: #ffd700;
    color: #00264d;
}
.success {
    color: #00ff7f;
}
.error {
    color: #ff4444;
}
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(-20px);}
    to {opacity: 1; transform: translateY(0);}
}
</style>
</head>
<body>
    <div class="box">
        <h2 class="<?= $status; ?>">
            <?= ($status == "success") ? "✅ Sukses" : "❌ Gagal"; ?>
        </h2>
        <p><?= $message; ?></p>
        <a href="list_mhs.php">⬅️ Kembali ke Daftar</a>
    </div>

    <script>
        // Redirect otomatis ke list setelah 2 detik
        setTimeout(() => {
            window.location.href = 'list_mhs.php';
        }, 2000);
    </script>
</body>
</html>
