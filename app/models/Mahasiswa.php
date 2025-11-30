<?php
class Mahasiswa
{
    private $conn;
    private $table_name = "mahasiswa";

    public $id;
    public $nim;
    public $nama;
    public $prodi;
    public $semester;
    public $tanggal_lahir;
    public $email;
    public $foto_profile;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Ambil semua data mahasiswa
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY prodi, nim ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Ambil data mahasiswa berdasarkan ID
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_mahasiswa = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cari mahasiswa berdasarkan nama atau NIM
    public function search($keyword)
    {
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE nama LIKE :keyword OR nim LIKE :keyword 
                  ORDER BY nama ASC";
        $stmt = $this->conn->prepare($query);
        $keyword = "%{$keyword}%";
        $stmt->bindParam(':keyword', $keyword);
        $stmt->execute();
        return $stmt;
    }

    // Tambah data mahasiswa baru
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  (nim, nama, prodi, semester, tanggal_lahir, email, foto_profile ) 
                  VALUES (:nim, :nama, :prodi, :semester, :tanggal_lahir, :email, :foto_profile)";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitasi input
        $this->nim = htmlspecialchars(strip_tags($this->nim));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->prodi = htmlspecialchars(strip_tags($this->prodi));
        $this->semester = htmlspecialchars(strip_tags($this->semester));
        $this->tanggal_lahir = htmlspecialchars(strip_tags($this->tanggal_lahir));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->foto_profile = htmlspecialchars(strip_tags($this->foto_profile));
        
        // Bind parameter
        $stmt->bindParam(':nim', $this->nim);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':prodi', $this->prodi);
        $stmt->bindParam(':semester', $this->semester);
        $stmt->bindParam(':tanggal_lahir', $this->tanggal_lahir);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':foto_profile', $this->foto_profile);
        
        if($stmt->execute()) {
            return true;
        }
        return false;

        // Update data Mahasiswa
    }
}
