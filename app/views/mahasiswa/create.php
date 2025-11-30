<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
        }
        .subtitle {
            color: #666;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 600;
        }
        input, select {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #007bff;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        button {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }
        .btn-primary {
            background: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background: #545b62;
        }
        .error {
            padding: 15px;
            background: #f8d7da;
            color: #721c24;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>➕ Tambah Mahasiswa</h1>
        <p class="subtitle">Sistem Informasi Universitas</p>
        
        <?php if(isset($_GET['error'])): ?>
            <div class="error">
                ✗ Gagal menambahkan data. Pastikan NIM belum terdaftar.
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=store">
            <div class="form-group">
                <label for="nim">NIM *</label>
                <input type="text" id="nim" name="nim" required placeholder="Contoh: 2024001">
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap *</label>
                <input type="text" id="nama" name="nama" required placeholder="Contoh: Ahmad Fauzi">
            </div>

            <div class="form-group">
                <label for="prodi">Jurusan *</label>
                <select id="prodi" name="prodi" required>
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="TI">Teknik Informatika (TI)</option>
                    <option value="SI">Sistem Informasi (SI)</option>
                    <option value="MI">Manajemen Informatika (MI)</option>
                    <option value="MI">Bisnis Digital (BD)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="semester">Semester *</label>
                <input type="number" id="semester" name="semester" required placeholder="Contoh: 1" min="1" max="8">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir *</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="text" id="email" name="email" placeholder="Contoh: nuis2321@gmail.com" min="2000" max="2100">
            </div>

            <div class="form-group">
                <label for="foto_profile">Foto Profile *</label>
                <input type="text" id="foto_profile" name="foto_profile">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-primary">💾 Simpan</button>
                <button type="button" class="btn-secondary" onclick="window.location.href='index.php'">↩ Batal</button>
            </div>
        </form>
    </div>
</body>
</html>