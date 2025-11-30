<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - Universitas</title>
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

        a {
            text-decoration: none;
        }

        .container {
            max-width: 1200px;
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

        .search-box {
            margin-bottom: 20px;
        }

        .search-box input {
            padding: 10px 15px;
            width: 300px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .search-box button {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .search-box button:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #007bff;
            color: white;
            font-weight: 600;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-ti {
            background: #e3f2fd;
            color: #1976d2;
        }

        .badge-si {
            background: #f3e5f5;
            color: #7b1fa2;
        }

        .badge-mi {
            background: #e8f5e9;
            color: #388e3c;
        }

        .badge-bd {
            background: #e8f5e9;
            color: #ceba0bff;
        }

        .detail-btn {
            padding: 5px 15px;
            background: #388fedff;
            color: white;
            border-radius: 5px;
        }

        .update-btn {
            padding: 5px 15px;
            background: #13c200ff;
            color: white;
            margin: 0 2px;
            border-radius: 5px;
        }

        .delete-btn {
            padding: 5px 15px;
            background: #bd1616ff;
            color: white;
            margin: 0 2px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>📚 Data Mahasiswa</h1>
        <p class="subtitle">Sistem Informasi Universitas</p>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div class="search-box" style="margin: 0;">
                <form method="GET" action="" style="display: flex; gap: 10px; align-items: center;">
                    <input type="text" name="search" placeholder="Cari nama atau NIM..."
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit">🔍 Cari</button>
                    <?php if (isset($_GET['search'])): ?>
                        <a href="index.php" style="text-decoration: none; color: #666;">Reset</a>
                    <?php endif; ?>
                </form>
            </div>
            <a href="index.php?action=create" style="padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 5px; font-weight: 600; white-space: nowrap;">+ Tambah Mahasiswa</a>
        </div>

        <?php if (count($data_mahasiswa) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Semester</th>
                        <th>Detail</th>
                        <th>Button</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data_mahasiswa as $row): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($row['nim']); ?></td>
                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td>
                                <span class="badge badge-<?php echo strtolower($row['prodi']); ?>">
                                    <?php echo htmlspecialchars($row['prodi']); ?>
                                </span>
                            </td>
                            <td><?php echo htmlspecialchars($row['semester']); ?></td>
                            <td>
                                <a class="detail-btn" href="index.php?action=detail&id=<?php echo $row['id_mahasiswa']; ?>">
                                    Detail
                                </a>
                            </td>
                            <td>
                                <a href="index.php?action=update&id=<?php echo $row['id_mahasiswa'] ?>"><span class="update-btn">Update</span></a>
                                <span class="delete-btn">Delete</span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p style="margin-top: 15px; color: #666; font-size: 14px;">
                Total: <strong><?php echo count($data_mahasiswa); ?></strong> mahasiswa
            </p>
        <?php else: ?>
            <div class="no-data">
                <p>Tidak ada data mahasiswa ditemukan.</p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>