<?php
require_once 'koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : (int) ($_POST['id'] ?? 0);
if (!$id) {
    header('Location: modifikasi_pesanan.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $telepon = $_POST['telepon'] ?? '';
    $destinasi = $_POST['destinasi'] ?? '';
    $tanggal = $_POST['tanggal'] ?? '';
    $jumlah = (int) ($_POST['jumlah_orang'] ?? 0);
    $catatan = $_POST['catatan'] ?? '';

    if ($nama && $telepon && $destinasi && $tanggal && $jumlah > 0) {
        $stmt = $conn->prepare('UPDATE pesanan SET nama=?, email=?, telepon=?, destinasi=?, tanggal=?, jumlah_orang=?, catatan=? WHERE id=?');
        if ($stmt) {
            $stmt->bind_param('sssssisi', $nama, $email, $telepon, $destinasi, $tanggal, $jumlah, $catatan, $id);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            header('Location: modifikasi_pesanan.php?status=diubah');
            exit;
        }
    }
}

$stmt = $conn->prepare('SELECT * FROM pesanan WHERE id=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

if (!$data) {
    $conn->close();
    header('Location: modifikasi_pesanan.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan - Wisata Hijau Jogja</title>
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
                <a href="modifikasi_pesanan.php">Kembali</a>
                <a href="pemesanan.php">Tambah Pesanan</a>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="section">
            <div class="surface">
                <div class="pill">Edit pesanan</div>
                <h2>Perbarui detail perjalanan</h2>
                <form action="edit_pesanan.php?id=<?php echo $id; ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="grid-2">
                        <div>
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama'], ENT_QUOTES); ?>" required>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email'], ENT_QUOTES); ?>">
                        </div>
                        <div>
                            <label for="telepon">No. Telepon / WA</label>
                            <input type="text" id="telepon" name="telepon" value="<?php echo htmlspecialchars($data['telepon'], ENT_QUOTES); ?>" required>
                        </div>
                        <div>
                            <label for="destinasi">Destinasi utama</label>
                            <select id="destinasi" name="destinasi" required>
                                <?php
                                $opsi = ['Hutan Pinus Mangunan', 'Taman Sari', 'Kebun Teh Nglinggo', 'Bukit Pengilon', 'Lainnya (custom)'];
                                foreach ($opsi as $opsiDest) {
                                    $selected = $opsiDest === $data['destinasi'] ? 'selected' : '';
                                    echo "<option $selected>" . htmlspecialchars($opsiDest, ENT_QUOTES) . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="tanggal">Tanggal Kunjungan</label>
                            <input type="date" id="tanggal" name="tanggal" value="<?php echo htmlspecialchars($data['tanggal'], ENT_QUOTES); ?>" required>
                        </div>
                        <div>
                            <label for="jumlah_orang">Jumlah Orang</label>
                            <input type="number" id="jumlah_orang" name="jumlah_orang" min="1" value="<?php echo (int) $data['jumlah_orang']; ?>" required>
                        </div>
                    </div>
                    <div>
                        <label for="catatan">Catatan tambahan</label>
                        <textarea id="catatan" name="catatan" rows="4"><?php echo htmlspecialchars($data['catatan'], ENT_QUOTES); ?></textarea>
                    </div>
                    <div class="cta-group">
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                        <a class="btn btn-secondary" href="modifikasi_pesanan.php">Batal</a>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">© <?php echo date('Y'); ?> Wisata Hijau Jogja.</div>
    </footer>
</body>
</html>
<?php
$conn->close();
