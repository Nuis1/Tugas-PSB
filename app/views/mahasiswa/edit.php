<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

        input,
        select {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus,
        select:focus {
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
        <h1>📝 Update Mahasiswa</h1>
        <p class="subtitle">Sistem Informasi Universitas</p>

        <?php if (isset($_GET['error'])): ?>
            <div style="color: red; font-weight: bold;">
                <?php
                if ($_GET['error'] == 'size') echo "Ukuran file terlalu besar! Maksimal 2MB.";
                elseif ($_GET['error'] == 'format') echo "Format file harus JPG/PNG!";
                elseif ($_GET['error'] == 'upload') echo "Upload foto gagal, coba lagi.";
                else echo "Terjadi kesalahan!";
                ?>
            </div>
        <?php endif; ?>

        <form action="index.php?action=update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $mahasiswa['id_mahasiswa']; ?>">
            <input type="hidden" name="foto_lama" value="<?php echo $mahasiswa['foto_profile']; ?>">
            <div class="form-group">
                <label for="nim">NIM *</label>
                <input type="text" id="nim" name="nim" value="<?php echo $mahasiswa['nim']; ?>" required placeholder="Contoh: 2024001">
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap *</label>
                <input type="text" id="nama" name="nama" value="<?php echo $mahasiswa['nama']; ?>" required placeholder="Contoh: Ahmad Fauzi">
            </div>

            <div class="form-group">
                <label for="prodi">Jurusan *</label>
                <select id="prodi" name="prodi" required>
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="TI" <?= ($mahasiswa['prodi'] == 'TI') ? 'selected' : '' ?>>Teknik Informatika (TI)</option>
                    <option value="SI" <?= ($mahasiswa['prodi'] == 'SI') ? 'selected' : '' ?>>Sistem Informasi (SI)</option>
                    <option value="MI" <?= ($mahasiswa['prodi'] == 'MI') ? 'selected' : '' ?>>Manajemen Informatika (MI)</option>
                    <option value="BD" <?= ($mahasiswa['prodi'] == 'BD') ? 'selected' : '' ?>>Bisnis Digital (BD)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="semester">Semester *</label>
                <input type="number" id="semester" name="semester" value="<?php echo $mahasiswa['semester']; ?>" required placeholder="Contoh: 1" min="1" max="8">
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir *</label>
                <input type="date" id="tanggal_lahir" value="<?php echo $mahasiswa['tanggal_lahir']; ?>" name="tanggal_lahir" required>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" value="<?php echo $mahasiswa['email']; ?>" required placeholder="Contoh: nuis2321@gmail.com">
            </div>

            <div class="form-group">
                <label for="foto_profile">Foto Profile *</label>
                <input type="file" id="foto_profile" name="foto_profile" accept="image/*">
            </div>

            <div class="form-group">
                <label for="status">Status *</label>
                <select id="status" name="status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="aktif" <?= ($mahasiswa['status'] == 'aktif') ? 'selected' : '' ?>>Aktif</option>
                    <option value="tidak aktif" <?= ($mahasiswa['status'] == 'tidak aktif') ? 'selected' : '' ?>>Tidak Aktif</option>
                </select>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-primary">💾 Simpan</button>
                <button type="button" class="btn-secondary" onclick="window.location.href='index.php'">↩ Batal</button>
            </div>
        </form>
    </div>
</body>

</html>