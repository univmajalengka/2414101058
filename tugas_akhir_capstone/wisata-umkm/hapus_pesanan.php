<?php
require_once 'koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id) {
    $stmt = $conn->prepare('DELETE FROM pesanan WHERE id=?');
    if ($stmt) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();
header('Location: modifikasi_pesanan.php?status=dihapus');
exit;
