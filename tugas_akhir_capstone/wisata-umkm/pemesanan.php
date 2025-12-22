<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Trip Hijau - Wisata Jogja</title>
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
                <a href="index.php#pengalaman">Pengalaman</a>
                <a href="modifikasi_pesanan.php">Kelola Pesanan</a>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="section">
            <div class="surface">
                <div class="grid-2">
                    <div>
                        <div class="pill">Formulir pemesanan</div>
                        <h2>Buat perjalanan hijau ke Jogja</h2>
                        <p>Isi data di bawah ini dan kami akan menyiapkan itinerary serta pemandu yang sesuai.</p>
                        <p style="color:var(--muted);">Pembayaran dilakukan setelah konfirmasi dari tim kami. Tidak ada biaya tersembunyi.</p>
                    </div>
                    <div>
                        <?php if (isset($_GET['status']) && $_GET['status'] === 'sukses'): ?>
                            <div class="pill" style="margin-bottom:12px;">Pesanan tersimpan. Tim kami akan menghubungi Anda.</div>
                        <?php elseif (isset($_GET['status']) && $_GET['status'] === 'gagal'): ?>
                            <div class="pill" style="background:#ffe8e8;color:#c0392b;margin-bottom:12px;">Maaf, pesanan gagal disimpan. Coba lagi.</div>
                        <?php endif; ?>
                        <form action="simpan_pesanan.php" method="POST">
                            <div class="grid-2">
                                <div>
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" id="nama" name="nama" required>
                                </div>
                                <div>
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" placeholder="opsional">
                                </div>
                                <div>
                                    <label for="telepon">No. Telepon / WA</label>
                                    <input type="text" id="telepon" name="telepon" required>
                                </div>
                                <div>
                                    <label for="destinasi">Destinasi utama</label>
                                    <select id="destinasi" name="destinasi" required>
                                        <option value="">Pilih destinasi</option>
                                        <option>Hutan Pinus Mangunan</option>
                                        <option>Taman Sari</option>
                                        <option>Kebun Teh Nglinggo</option>
                                        <option>Bukit Pengilon</option>
                                        <option>Lainnya (custom)</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="tanggal">Tanggal Kunjungan</label>
                                    <input type="date" id="tanggal" name="tanggal" required>
                                </div>
                                <div>
                                    <label for="jumlah_orang">Jumlah Orang</label>
                                    <input type="number" id="jumlah_orang" name="jumlah_orang" min="1" value="2" required>
                                </div>
                            </div>
                            <div>
                                <label for="catatan">Catatan tambahan</label>
                                <textarea id="catatan" name="catatan" rows="4" placeholder="Contoh: butuh transport, prefer makanan vegetarian"></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan Pesanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">© <?php echo date('Y'); ?> Wisata Hijau Jogja.</div>
    </footer>
</body>
</html>
