<?php
$destinasi = [
    [
        'nama' => 'Hutan Pinus Mangunan',
        'lokasi' => 'Dlingo',
        'harga' => 'Rp25.000',
        'tag' => 'Ruang hijau',
        'gambar' => 'https://images.unsplash.com/photo-1509027572585-81688b84ccea?auto=format&fit=crop&w=1200&q=60'
    ],
    [
        'nama' => 'Taman Sari',
        'lokasi' => 'Kota Gede',
        'harga' => 'Rp30.000',
        'tag' => 'Sejarah',
        'gambar' => 'https://images.unsplash.com/photo-1548580620-68dfc54d1415?auto=format&fit=crop&w=1200&q=60'
    ],
    [
        'nama' => 'Kebun Teh Nglinggo',
        'lokasi' => 'Kulon Progo',
        'harga' => 'Rp20.000',
        'tag' => 'Panorama',
        'gambar' => 'https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=1200&q=60'
    ],
    [
        'nama' => 'Bukit Pengilon',
        'lokasi' => 'Gunungkidul',
        'harga' => 'Rp15.000',
        'tag' => 'Sunrise',
        'gambar' => 'https://images.unsplash.com/photo-1489515217757-5fd1be406fef?auto=format&fit=crop&w=1200&q=60'
    ],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Hijau Jogja</title>
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
                <a href="#destinasi">Destinasi</a>
                <a href="#pengalaman">Pengalaman</a>
                <a href="pemesanan.php">Pesan Tur</a>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="hero">
            <div>
                <div class="pill">Jogja tropis, nuansa hijau</div>
                <h1>Rasakan udara segar Jogja dengan wisata bertema alam.</h1>
                <p>Kami menyiapkan kurasi destinasi hijau, pemandu lokal, dan pengalaman sustainable untuk trip yang tenang sekaligus berkesan.</p>
                <div class="cta-group">
                    <a class="btn btn-primary" href="pemesanan.php">Pesan Paket Hijau</a>
                    <a class="btn btn-secondary" href="#destinasi">Lihat Destinasi</a>
                </div>
            </div>
            <div class="surface">
                <h3>Kenapa paket kami?</h3>
                <div class="stats">
                    <div class="badge">Guide lokal</div>
                    <div class="badge">Ramah lingkungan</div>
                    <div class="badge">Transport aman</div>
                </div>
                <p style="margin-top: 12px;">Kami bekerja sama dengan komunitas setempat untuk menjaga kawasan hijau tetap lestari sekaligus membuka peluang ekonomi bagi UMKM.</p>
            </div>
        </section>

        <section id="destinasi" class="section">
            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;">
                <div>
                    <h2>Destinasi unggulan</h2>
                    <p>Spot terbaik untuk piknik, sunrise, sampai telusur heritage.</p>
                </div>
                <a class="pill" href="pemesanan.php">Pesan rute custom</a>
            </div>

            <div class="card-grid">
                <?php foreach ($destinasi as $item): ?>
                    <article class="card">
                        <img src="<?php echo htmlspecialchars($item['gambar'], ENT_QUOTES); ?>" alt="<?php echo htmlspecialchars($item['nama'], ENT_QUOTES); ?>">
                        <div class="card-body">
                            <span class="tag"><?php echo htmlspecialchars($item['tag'], ENT_QUOTES); ?></span>
                            <h3 style="margin:0;"><?php echo htmlspecialchars($item['nama'], ENT_QUOTES); ?></h3>
                            <p style="margin:0;color:var(--muted);"><?php echo htmlspecialchars($item['lokasi'], ENT_QUOTES); ?></p>
                            <div class="stats">
                                <span>Mulai <?php echo htmlspecialchars($item['harga'], ENT_QUOTES); ?></span>
                                <span>•</span>
                                <span>Durasi fleksibel</span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="pengalaman" class="section">
            <div class="surface">
                <h2>Paket pengalaman</h2>
                <p>Pilih tema perjalanan yang paling pas untuk rombonganmu.</p>
                <div class="card-grid">
                    <div class="surface" style="box-shadow:none;">
                        <h3>Retreat Hutan</h3>
                        <p>Camping ringan, api unggun, dan workshop kopi di tengah hutan pinus.</p>
                        <div class="stats">
                            <span class="badge">Private</span>
                            <span>2D1N</span>
                        </div>
                    </div>
                    <div class="surface" style="box-shadow:none;">
                        <h3>Heritage Ride</h3>
                        <p>Tur sepeda santai melewati Taman Sari, Kotagede, hingga kuliner malam.</p>
                        <div class="stats">
                            <span class="badge">Ramah keluarga</span>
                            <span>Half-day</span>
                        </div>
                    </div>
                    <div class="surface" style="box-shadow:none;">
                        <h3>Sunrise Laut Selatan</h3>
                        <p>Berburu matahari terbit di Bukit Pengilon dan sarapan ala nelayan.</p>
                        <div class="stats">
                            <span class="badge">Grup kecil</span>
                            <span>Full-day</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="surface">
                <div class="grid-2">
                    <div>
                        <h2>Siap berangkat?</h2>
                        <p>Tinggal isi form singkat dan tim kami akan menghubungi lewat WhatsApp atau email.</p>
                        <a class="btn btn-primary" href="pemesanan.php">Buat Pesanan</a>
                    </div>
                    <div>
                        <h3>Kontak cepat</h3>
                        <p>+62 811-2233-4455</p>
                        <p>jalan.hijau@jogja.id</p>
                        <p>Jl. Imogiri Timur No. 25, Bantul, DI Yogyakarta</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">© <?php echo date('Y'); ?> Wisata Hijau Jogja. Dirancang dengan nuansa hijau.</div>
    </footer>
</body>
</html>
