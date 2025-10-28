<?php
include 'config.php';

class Mahasiswa {
    private $conn;

    // Konstruktor untuk koneksi database
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    
    // CREATE → Tambah data mahasiswa baru
    
    public function create($nama, $nim, $prodi, $foto) {
        $stmt = $this->conn->prepare("INSERT INTO tb_mahasiswa (nama, nim, prodi, foto) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $nim, $prodi, $foto);
        return $stmt->execute();
    }

   
    // READ → Tampilkan semua data mahasiswa
    
    public function read() {
        return $this->conn->query("SELECT * FROM tb_mahasiswa ORDER BY id DESC");
    }

    
    // GET BY ID → Ambil data berdasarkan
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tb_mahasiswa WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    
    // UPDATE → Perbarui data mahasiswa
    
    public function update($id, $nama, $nim, $prodi, $foto = null) {
        if ($foto) {
            // Jika ada foto baru
            $stmt = $this->conn->prepare("UPDATE tb_mahasiswa SET nama=?, nim=?, prodi=?, foto=? WHERE id=?");
            $stmt->bind_param("ssssi", $nama, $nim, $prodi, $foto, $id);
        } else {
            // Jika tidak ada foto baru
            $stmt = $this->conn->prepare("UPDATE tb_mahasiswa SET nama=?, nim=?, prodi=? WHERE id=?");
            $stmt->bind_param("sssi", $nama, $nim, $prodi, $id);
        }
        return $stmt->execute();
    }

    // DELETE → Hapus data + foto dari folder uploads

    public function delete($id) {
        // Ambil data dulu untuk hapus foto
        $data = $this->getById($id);
        if ($data && !empty($data['foto']) && file_exists("uploads/" . $data['foto'])) {
            unlink("uploads/" . $data['foto']);
        }

        // Hapus data dari database
        $stmt = $this->conn->prepare("DELETE FROM tb_mahasiswa WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
