<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Layanan | STAYLOVERSS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  </head>
<body class="bg-white text-gray-900 font-sans">

  <!-- Navbar -->
  <nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-600">STAYLOVERSS</h1>

      <!-- Menu Desktop -->
      <ul class="hidden md:flex space-x-8">
        <li><a href="index.html" class="hover:text-blue-600 font-semibold">Home</a></li>
        <li><a href="layanan.html" class="text-blue-600 font-semibold">Layanan</a></li>
        <li><a href="tentang.html" class="hover:text-blue-600 font-semibold">Tentang Kami</a></li>
      </ul>

      <!-- Tombol Pesan -->
      <a href="pesan.html" class="hidden md:block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
        Pesan Sekarang
      </a>

      <!-- Tombol Hamburger -->
      <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none text-2xl">�~�</button>
    </div>

    <!-- Menu Mobile -->
    <div id="mobile-menu" class="hidden flex-col space-y-4 px-6 pb-4 pt-4 text-gray-700 font-medium md:hidden bg-white border-t">
      <a href="index.html" class="hover:text-blue-600 transition">Home</a>
      <a href="layanan.html" class="hover:text-blue-600 transition">Layanan</a>
      <a href="tentang.html" class="hover:text-blue-600 transition">Tentang Kami</a>
      <a href="pesan.html" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-center hover:bg-blue-700 transition">
        Pesan Sekarang
      </a>
    </div>
  </nav>

  <!-- Header -->
  <header class="text-center py-16 bg-gradient-to-b from-blue-50 to-white">
    <h2 class="text-4xl font-extrabold text-gray-900">LAYANAN KAMI</h2>
    <p class="text-gray-600 mt-3 max-w-2xl mx-auto">Kami menyediakan layanan profesional untuk membantu bisnismu berkembang secara digital.</p>
  </header>

  <!-- Cards Section -->
  <section class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-8 justify-items-center">
    
    <!-- Card 1 -->
    <div class="bg-white shadow-lg rounded-2xl p-6 text-center hover:shadow-xl transition max-w-sm w-full mx-auto md:col-start-2">
      <img src="https://cdn-icons-png.flaticon.com/512/1829/1829586.png" alt="Desain Grafis" class="w-24 h-24 mx-auto mb-4">
      <h3 class="text-2xl font-bold mb-2 text-gray-900">Desain Grafis</h3>
      <p class="text-gray-600 mb-4">Ciptakan desain visual profesional seperti logo, poster, dan branding lengkap untuk bisnismu.</p>
      <a href="pesan.html#paket-hemat" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Pelajari Lebih Lanjut</a>
    </div>

    

  </section>

  <!-- Penjelasan Section -->
  <section class="max-w-3xl mx-auto px-6 pb-12">
    <div class="bg-white rounded-2xl shadow p-6">
      <h3 class="text-2xl font-bold text-gray-900 mb-3">Pengertian Layanan</h3>
      <p class="text-gray-700 leading-relaxed">
        Layanan <span class="font-semibold">Desain Grafis</span> membantu kamu membangun identitas visual yang konsisten
        dan profesional. Mulai dari pembuatan logo, poster, konten media sosial, hingga kit branding,
        semuanya disesuaikan dengan karakter dan kebutuhan bisnismu agar tampil lebih meyakinkan.
      </p>
      <p class="text-gray-700 leading-relaxed mt-3">
        Dengan visual yang tepat, pesan brand lebih mudah dipahami audiens dan bisa meningkatkan kepercayaan pelanggan.
        Jika kamu butuh paket yang lebih lengkap (misalnya termasuk website atau konten lebih banyak),
        silakan cek juga pilihan paket di halaman Pesan.
      </p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-100 text-center py-6 mt-12">
    <p class="text-gray-600">&copy; 2025 <span class="text-blue-600 font-bold">STAYLOVERSS</span>. Semua Hak Dilindungi.</p>
  </footer>

  <!-- Script Menu -->
  <script>
    const btn = document.getElementById('menu-btn');
    if (btn) {
      btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>';
    }
    const menu = document.getElementById('mobile-menu');
    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
      menu.classList.toggle('flex');
    });
  </script>

</body>
</html>
