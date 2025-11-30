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
    public function edit($id)
    {
        $mahasiswa = $this->mahasiswa->getById($id);
        require_once 'app/views/mahasiswa/edit.php';
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

            // Validasi upload file
            if (isset($_FILES['foto_profile']) && $_FILES['foto_profile']['error'] == 0) {

                $file = $_FILES['foto_profile'];
                $maxSize = 2 * 1024 * 1024; // 2MB
                $allowedExtensions = ["jpg", "jpeg", "png"];

                $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                if ($file['size'] > $maxSize) {
                    header("Location: index.php?action=create&error=size");
                    exit;
                }

                if (!in_array($fileExtension, $allowedExtensions)) {
                    header("Location: index.php?action=create&error=format");
                    exit;
                }

                $newFileName = time() . "_" . rand(1000, 9999) . "." . $fileExtension;
                $uploadPath = "assets/images/" . $newFileName;

                move_uploaded_file($file['tmp_name'], $uploadPath);

                $this->mahasiswa->foto_profile = $newFileName;
            } else {
                $this->mahasiswa->foto_profile = null;
            }

            // Ambil data input lain
            $this->mahasiswa->nim = $_POST['nim'];
            $this->mahasiswa->nama = $_POST['nama'];
            $this->mahasiswa->prodi = $_POST['prodi'];
            $this->mahasiswa->semester = $_POST['semester'];
            $this->mahasiswa->tanggal_lahir = $_POST['tanggal_lahir'];
            $this->mahasiswa->email = $_POST['email'];

            // Insert data ke database
            try {
                if ($this->mahasiswa->create()) {
                    header("Location: index.php?success=1");
                    exit;
                }
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    // Error duplicate entry
                    header("Location: index.php?action=create&error=duplicate_nim");
                    exit;
                } else {
                    header("Location: index.php?action=create&error=db");
                    exit;
                }
            }
        }
    }

    //fungsi update data
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->mahasiswa->id = $_POST['id'];

            $this->mahasiswa->nim = $_POST['nim'];
            $this->mahasiswa->nama = $_POST['nama'];
            $this->mahasiswa->prodi = $_POST['prodi'];
            $this->mahasiswa->semester = $_POST['semester'];
            $this->mahasiswa->tanggal_lahir = $_POST['tanggal_lahir'];
            $this->mahasiswa->email = $_POST['email'];
            $this->mahasiswa->status = $_POST['status'];

            // Handle foto
            if (!empty($_FILES['foto_profile']['name'])) {
                $file = $_FILES['foto_profile'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowedExt = ['jpg', 'jpeg', 'png'];

                if (in_array($ext, $allowedExt)) {
                    $newName = time() . "_" . rand(1000, 9999) . "." . $ext;
                    $dest = "assets/images/" . $newName;
                    move_uploaded_file($file['tmp_name'], $dest);
                    $this->mahasiswa->foto_profile = $newName;
                }
            } else {
                $this->mahasiswa->foto_profile = $_POST['foto_lama'];
            }

            if ($this->mahasiswa->update()) {
                header("Location: index.php?success=update");
                exit;
            } else {
                header("Location: index.php?action=edit&id=" . $_POST['id'] . "&error=1");
                exit;
            }
        }
    }

    //fungsi delete data
    public function delete($id)
    {
        // Ambil data mahasiswa berdasarkan ID
        $mahasiswa = $this->mahasiswa->getById($id);

        // Jika ada foto yang tersimpan di folder, hapus juga file-nya
        if (!empty($mahasiswa['foto_profile']) && file_exists($mahasiswa['foto_profile'])) {
            unlink($mahasiswa['foto_profile']);
        }

        // Hapus data dari database
        if ($this->mahasiswa->delete($id)) {
            header("Location: index.php?action=index&msg=delete_success");
            exit;
        } else {
            echo "Gagal menghapus data!";
        }
    }
}
