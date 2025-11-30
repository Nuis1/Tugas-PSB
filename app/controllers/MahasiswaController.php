<?php
require_once 'config/koneksi.php';
require_once 'app/models/Mahasiswa.php';

class MahasiswaController
{
    private $db;
    private $mahasiswa;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->mahasiswa = new Mahasiswa($this->db);
    }

    // Tampilkan semua mahasiswa
    public function index()
    {
        $keyword = isset($_GET['search']) ? $_GET['search'] : '';

        if (!empty($keyword)) {
            $stmt = $this->mahasiswa->search($keyword);
        } else {
            $stmt = $this->mahasiswa->getAll();
        }

        $data_mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Load view
        require_once 'app/views/mahasiswa/index.php';
    }

    // Tampilkan detail mahasiswa
    public function detail($id)
    {
        $mahasiswa = $this->mahasiswa->getById($id);
        require_once 'app/views/mahasiswa/detail.php';
    }

    //Tampilkan form update mahasiswa
    public function update($id) {
        $mahasiswa = $this->mahasiswa->getById($id);
        require_once 'app/views/mahasiswa/update.php';
    }

    // Tampilkan form tambah mahasiswa
    public function create()
    {
        require_once 'app/views/mahasiswa/create.php';
    }

    // Proses simpan data mahasiswa
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->mahasiswa->nim = $_POST['nim'];
            $this->mahasiswa->nama = $_POST['nama'];
            $this->mahasiswa->prodi = $_POST['prodi'];
            $this->mahasiswa->semester = $_POST['semester'];
            $this->mahasiswa->tanggal_lahir = $_POST['tanggal_lahir'];
            $this->mahasiswa->email = $_POST['email'];
            $this->mahasiswa->foto_profile = $_POST['foto_profile'];

            if ($this->mahasiswa->create()) {
                header("Location: index.php?success=1");
                exit();
            } else {
                header("Location: index.php?action=create&error=1");
                exit();
            }
        }
    }
}
