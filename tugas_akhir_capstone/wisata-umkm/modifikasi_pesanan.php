<?php
require_once 'koneksi.php';
$pesanan = $conn->query('SELECT * FROM pesanan ORDER BY created_at DESC');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - Wisata Hijau Jogja</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <div class="container nav">
            <a class="brand" href="index.php">
                <span class="leaf"></span>
                <span>Wisata Hijau Jogja</span>
            </a>
            <div class="nav-links">
                <a href="index.php#destinasi">Destinasi</a>
                <a href="pemesanan.php">Tambah Pesanan</a>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="section">
            <div class="surface">
                <div style="display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;align-items:center;">
                    <div>
                        <div class="pill">Ringkasan pesanan</div>
                        <h2>Modifikasi & pantau pesanan</h2>
                    </div>
                    <a class="btn btn-primary" href="pemesanan.php">Tambah pesanan baru</a>
                </div>
                <?php if (isset($_GET['status']) && $_GET['status'] === 'sukses'): ?>
                    <div class="pill" style="margin:12px 0;">Pesanan berhasil disimpan.</div>
                <?php elseif (isset($_GET['status']) && $_GET['status'] === 'dihapus'): ?>
                    <div class="pill" style="margin:12px 0;">Pesanan dihapus.</div>
                <?php elseif (isset($_GET['status']) && $_GET['status'] === 'diubah'): ?>
                    <div class="pill" style="margin:12px 0;">Pesanan diperbarui.</div>
                <?php endif; ?>

                <?php if ($pesanan && $pesanan->num_rows > 0): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Destinasi</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Kontak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $pesanan->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['nama'], ENT_QUOTES); ?></td>
                                    <td><?php echo htmlspecialchars($row['destinasi'], ENT_QUOTES); ?></td>
                                    <td><?php echo htmlspecialchars($row['tanggal'], ENT_QUOTES); ?></td>
                                    <td><span class="badge"><?php echo (int) $row['jumlah_orang']; ?> org</span></td>
                                    <td>
                                        <div><?php echo htmlspecialchars($row['telepon'], ENT_QUOTES); ?></div>
                                        <div style="color:var(--muted);"><?php echo htmlspecialchars($row['email'], ENT_QUOTES); ?></div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <a class="btn btn-secondary" href="edit_pesanan.php?id=<?php echo $row['id']; ?>">Edit</a>
                                            <a class="btn btn-secondary" href="hapus_pesanan.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Hapus pesanan ini?');">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty">Belum ada pesanan. Yuk mulai dengan membuat pesanan baru.</div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">© <?php echo date('Y'); ?> Wisata Hijau Jogja.</div>
    </footer>
</body>
</html>
<?php
if ($pesanan) {
    $pesanan->free();
}
$conn->close();
