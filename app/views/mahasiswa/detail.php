<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background: rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
            transition: all 0.3s;
        }
        .back-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px;
            text-align: center;
            position: relative;
        }
        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            object-fit: cover;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            margin-bottom: 20px;
        }
        .profile-name {
            color: white;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        .profile-nim {
            color: rgba(255,255,255,0.9);
            font-size: 16px;
        }
        .card-body {
            padding: 40px;
        }
        .info-row {
            display: flex;
            padding: 20px 0;
            border-bottom: 1px solid #f0f0f0;
            align-items: center;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            flex: 0 0 180px;
            color: #666;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-value {
            flex: 1;
            color: #333;
            font-size: 16px;
            font-weight: 500;
        }
        .status-badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        .status-aktif {
            background: #d4edda;
            color: #155724;
        }
        .status-tidak-aktif {
            background: #f8d7da;
            color: #721c24;
        }
        .icon {
            font-size: 18px;
        }
        .not-found {
            text-align: center;
            padding: 60px 40px;
            color: white;
        }
        .not-found h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
if(!isset($mahasiswa)) {
    die("Variable mahasiswa tidak ada!");
}
?>
    <div class="container">
        <a href="index.php" class="back-btn">← Kembali ke Daftar</a>
        
        <?php if($mahasiswa): ?>
            <div class="card">
                <div class="card-header">
                    <img src="<?php echo !empty($mahasiswa['foto_profile']) ? $mahasiswa['foto_profile'] : 'https://ui-avatars.com/api/?name=' . urlencode($mahasiswa['nama']) . '&size=150&background=random'; ?>" 
                         alt="Profile Photo" 
                         class="profile-photo">
                    <h1 class="profile-name"><?php echo htmlspecialchars($mahasiswa['nama']); ?></h1>
                    <p class="profile-nim"><?php echo htmlspecialchars($mahasiswa['nim']); ?></p>
                </div>
                
                <div class="card-body">
                    <div class="info-row">
                        <div class="info-label">
                            <span class="icon">📧</span> Email
                        </div>
                        <div class="info-value">
                            <?php echo htmlspecialchars($mahasiswa['email'] ?? '-'); ?>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">
                            <span class="icon">🎓</span> Program Studi
                        </div>
                        <div class="info-value">
                            <?php echo htmlspecialchars($mahasiswa['prodi']); ?>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">
                            <span class="icon">📚</span> Semester
                        </div>
                        <div class="info-value">
                            Semester <?php echo htmlspecialchars($mahasiswa['semester'] ?? '-'); ?>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">
                            <span class="icon">📅</span> Tanggal Lahir
                        </div>
                        <div class="info-value">
                            <?php 
                            if(!empty($mahasiswa['tanggal_lahir'])) {
                                echo date('d F Y', strtotime($mahasiswa['tanggal_lahir']));
                            } else {
                                echo '-';
                            }
                            ?>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-label">
                            <span class="icon">✓</span> Status
                        </div>
                        <div class="info-value">
                            <span class="status-badge <?php echo ($mahasiswa['status'] ?? 'aktif') == 'aktif' ? 'status-aktif' : 'status-tidak-aktif'; ?>">
                                <?php echo strtoupper($mahasiswa['status'] ?? 'Aktif'); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="not-found">
                <h2>⚠️ Data Tidak Ditemukan</h2>
                <p>Mahasiswa yang Anda cari tidak ada dalam database.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>