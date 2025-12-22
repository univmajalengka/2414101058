CREATE DATABASE IF NOT EXISTS wisata_jogja CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE wisata_jogja;

CREATE TABLE IF NOT EXISTS destinasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(120) NOT NULL,
    lokasi VARCHAR(120) NOT NULL,
    harga_mulai INT NOT NULL,
    kategori VARCHAR(60) NOT NULL DEFAULT 'Wisata Alam',
    gambar TEXT
);

CREATE TABLE IF NOT EXISTS pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(120) NOT NULL,
    email VARCHAR(120),
    telepon VARCHAR(40),
    destinasi VARCHAR(120) NOT NULL,
    tanggal DATE NOT NULL,
    jumlah_orang INT NOT NULL DEFAULT 1,
    catatan TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO destinasi (nama, lokasi, harga_mulai, kategori, gambar) VALUES
('Hutan Pinus Mangunan', 'Dlingo', 25000, 'Ruang Hijau', 'https://images.unsplash.com/photo-1509027572585-81688b84ccea?auto=format&fit=crop&w=900&q=60'),
('Taman Sari', 'Kota Gede', 30000, 'Sejarah', 'https://images.unsplash.com/photo-1548580620-68dfc54d1415?auto=format&fit=crop&w=900&q=60'),
('Kebun Teh Nglinggo', 'Kulon Progo', 20000, 'Panorama', 'https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=900&q=60'),
('Bukit Pengilon', 'Gunungkidul', 15000, 'Sunrise Spot', 'https://images.unsplash.com/photo-1489515217757-5fd1be406fef?auto=format&fit=crop&w=900&q=60');
