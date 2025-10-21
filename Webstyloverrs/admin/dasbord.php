<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin | STAYLOVERSS</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans">

  <!-- Navbar -->
  <nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-600">STAYLOVERSS</h1>

      <!-- Menu Desktop -->
      <ul class="hidden md:flex space-x-8">
        <li><a href="../index.html" class="hover:text-blue-600 font-semibold">Home</a></li>
        <li><a href="../layanan.html" class="hover:text-blue-600 font-semibold">Layanan</a></li>
        <li><a href="../tentang.html" class="hover:text-blue-600 font-semibold">Tentang Kami</a></li>
      </ul>

      <!-- Kosongkan tombol pesan di area admin -->
      <div class="hidden md:block"></div>

      <!-- Tombol Hamburger -->
      <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none" aria-label="Buka menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- Menu Mobile -->
    <div id="mobile-menu" class="hidden flex-col space-y-4 px-6 pb-4 pt-4 text-gray-700 font-medium md:hidden bg-white border-t">
      <a href="../index.html" class="hover:text-blue-600 transition">Home</a>
      <a href="../layanan.html" class="hover:text-blue-600 transition">Layanan</a>
      <a href="../tentang.html" class="hover:text-blue-600 transition">Tentang Kami</a>
    </div>
  </nav>

  <!-- Header -->
  <header class="text-center py-12 bg-gradient-to-b from-blue-50 to-gray-50 px-6">
    <h2 class="text-4xl font-extrabold text-gray-900">Dashboard Admin</h2>
    <p class="text-gray-600 mt-3">Kelola pesanan yang masuk dari halaman checkout.</p>
  </header>

  <!-- Konten -->
  <main class="max-w-7xl mx-auto px-6 pb-16 space-y-6">

    <!-- Toolbar -->
    <section class="bg-white rounded-2xl shadow p-4 md:p-6">
      <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
        <div class="flex-1">
          <label for="q" class="block text-sm font-semibold text-gray-700">Pencarian</label>
          <input id="q" type="text" placeholder="Cari ID / nama usaha / email / telepon" class="mt-2 w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div>
          <label for="statusFilter" class="block text-sm font-semibold text-gray-700">Status</label>
          <select id="statusFilter" class="mt-2 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="all">Semua</option>
            <option value="pending">Pending</option>
            <option value="processed">Processed</option>
          </select>
        </div>
        <div class="flex gap-2">
          <a href="tambahLayanan.php" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">Tambah Layanan</a>
          <button id="exportBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Export JSON</button>
          <label class="px-4 py-2 rounded-lg border cursor-pointer text-gray-700 hover:bg-gray-50">
            Import JSON
            <input id="importInput" type="file" accept="application/json" class="hidden" />
          </label>
        </div>
      </div>
    </section>

    <!-- Tabel Orders -->
    <section class="bg-white rounded-2xl shadow overflow-hidden">
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
          <thead class="bg-gray-50 text-gray-700">
            <tr>
              <th class="text-left font-semibold px-4 py-3">ID</th>
              <th class="text-left font-semibold px-4 py-3">Tanggal</th>
              <th class="text-left font-semibold px-4 py-3">Nama Usaha</th>
              <th class="text-left font-semibold px-4 py-3">Email</th>
              <th class="text-left font-semibold px-4 py-3">Telepon</th>
              <th class="text-left font-semibold px-4 py-3">Paket</th>
              <th class="text-left font-semibold px-4 py-3">Harga</th>
              <th class="text-left font-semibold px-4 py-3">Status</th>
              <th class="text-left font-semibold px-4 py-3">Aksi</th>
            </tr>
          </thead>
          <tbody id="ordersBody" class="divide-y"></tbody>
        </table>
      </div>

      <!-- Empty state -->
      <div id="emptyState" class="hidden text-center py-12 text-gray-600">
        Belum ada data pesanan.
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-100 text-center py-6">
    <p class="text-gray-600">&copy; 2025 <span class="text-blue-600 font-bold">STAYLOVERSS</span>. Semua Hak Dilindungi.</p>
  </footer>

  <script>
    // Menu mobile
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');
    btn?.addEventListener('click', () => {
      menu.classList.toggle('hidden');
      menu.classList.toggle('flex');
    });

    // Helpers orders
    function readOrders() {
      try { return JSON.parse(localStorage.getItem('orders') || '[]'); } catch (_) { return []; }
    }
    function writeOrders(list) {
      localStorage.setItem('orders', JSON.stringify(list));
    }
    const formatRupiah = (n) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(n || 0);
    const fmtDate = (iso) => {
      const d = new Date(iso);
      if (isNaN(d)) return '-';
      return d.toLocaleString('id-ID', { dateStyle: 'medium', timeStyle: 'short' });
    };

    // Rendering
    const tbody = document.getElementById('ordersBody');
    const emptyState = document.getElementById('emptyState');
    const qInput = document.getElementById('q');
    const statusFilter = document.getElementById('statusFilter');

    function render() {
      const q = (qInput.value || '').toLowerCase();
      const status = statusFilter.value;
      const rows = (readOrders() || [])
        .sort((a,b) => new Date(b.createdAt) - new Date(a.createdAt))
        .filter(o => {
          const matchesQ = [o.id, o.namaUsaha, o.email, o.telepon]
            .map(v => (v || '').toString().toLowerCase()).some(v => v.includes(q));
          const matchesStatus = status === 'all' ? true : o.status === status;
          return matchesQ && matchesStatus;
        });

      tbody.innerHTML = '';
      if (!rows.length) {
        emptyState.classList.remove('hidden');
        return;
      }
      emptyState.classList.add('hidden');

      rows.forEach(o => {
        const tr = document.createElement('tr');
        tr.className = 'hover:bg-gray-50';

        tr.innerHTML = `
          <td class="px-4 py-3 font-mono text-xs md:text-sm">${o.id}</td>
          <td class="px-4 py-3 text-gray-700">${fmtDate(o.createdAt)}</td>
          <td class="px-4 py-3">${o.namaUsaha || '-'}</td>
          <td class="px-4 py-3">${o.email}</td>
          <td class="px-4 py-3">${o.telepon}</td>
          <td class="px-4 py-3 capitalize">${o.paket}</td>
          <td class="px-4 py-3 font-semibold">${formatRupiah(o.harga)}</td>
          <td class="px-4 py-3">
            <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold ${o.status === 'processed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'}">${o.status}</span>
          </td>
          <td class="px-4 py-3">
            <div class="flex items-center gap-2">
              <button data-action="toggle" data-id="${o.id}" class="px-3 py-1 rounded-lg text-xs md:text-sm ${o.status === 'processed' ? 'bg-gray-200 text-gray-800 hover:bg-gray-300' : 'bg-green-600 text-white hover:bg-green-700'}">
                ${o.status === 'processed' ? 'Tandai Pending' : 'Tandai Processed'}
              </button>
              <button data-action="delete" data-id="${o.id}" class="px-3 py-1 rounded-lg text-xs md:text-sm bg-red-600 text-white hover:bg-red-700">Hapus</button>
            </div>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }

    // Actions
    tbody.addEventListener('click', (e) => {
      const btn = e.target.closest('button');
      if (!btn) return;
      const id = btn.getAttribute('data-id');
      const action = btn.getAttribute('data-action');
      let orders = readOrders();
      const idx = orders.findIndex(o => o.id === id);
      if (idx === -1) return;
      if (action === 'toggle') {
        orders[idx].status = orders[idx].status === 'processed' ? 'pending' : 'processed';
        writeOrders(orders);
        render();
      }
      if (action === 'delete') {
        if (confirm('Hapus pesanan ini?')) {
          orders.splice(idx, 1);
          writeOrders(orders);
          render();
        }
      }
    });

    // Filters
    qInput.addEventListener('input', render);
    statusFilter.addEventListener('change', render);

    // Export / Import
    document.getElementById('exportBtn').addEventListener('click', () => {
      const data = JSON.stringify(readOrders(), null, 2);
      const blob = new Blob([data], { type: 'application/json' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url; a.download = 'orders-export.json'; a.click();
      URL.revokeObjectURL(url);
    });
    document.getElementById('importInput').addEventListener('change', async (e) => {
      const file = e.target.files?.[0];
      if (!file) return;
      try {
        const text = await file.text();
        const parsed = JSON.parse(text);
        if (!Array.isArray(parsed)) throw new Error('Format tidak valid');
        writeOrders(parsed);
        alert('Import berhasil. Data tersimpan.');
        render();
      } catch (err) {
        alert('Gagal import: ' + err.message);
      } finally {
        e.target.value = '';
      }
    });

    // Init
    render();
  </script>

</body>
</html>
