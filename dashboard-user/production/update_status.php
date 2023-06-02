<?php
// Membuat koneksi ke database
$dbh = new PDO("mysql:host=localhost;dbname=dbhotel", "root", "");

// Mengambil ID transaksi dari permintaan POST
$transaksiId = $_POST['transaksiId'];

try {
    // Menyiapkan query UPDATE untuk mengubah status pembayaran menjadi "complete"
    $stmt = $dbh->prepare("UPDATE transaksi SET statusPembayaran = 'complete' WHERE idTransaksi = ?");
    $stmt->bindParam(1, $transaksiId);

    // Menjalankan query UPDATE
    $stmt->execute();

    // Mengirim respon ke klien
    echo "success";
} catch (PDOException $e) {
    // Menampilkan pesan jika terjadi kesalahan
    echo "error";
}
