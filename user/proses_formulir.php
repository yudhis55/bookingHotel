<?php
// Memulai sesi
session_start();
date_default_timezone_set('Asia/Jakarta');

// Mendapatkan data ID dari sesi yang login saat ini
$userRole = $_SESSION['userRole'];

try {
  // Membuat koneksi ke database
  $dbh = new PDO("mysql:host=localhost;dbname=dbhotel", "root", "");

  // Mendapatkan ID dari hasil query
  $id = $_SESSION['id'];

  // Menyiapkan query SELECT untuk mendapatkan nama dari tabel user berdasarkan id pengguna
  $stmt = $dbh->prepare("SELECT nama FROM user WHERE id = ?");
  $stmt->bindParam(1, $id);

  // Menjalankan query SELECT
  $stmt->execute();

  // Mengambil hasil query
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // Mendapatkan nama dari hasil query
  $nama = $result['nama'];

  // Mendapatkan data dari form
  $typeKamar = $_POST['roomtype'];
  $jmlPenginap = $_POST['kapasitasA'];
  $tglCheckin = $_POST['tglCheckin'];
  $tglCheckout = $_POST['tglCheckout'];
  $tglTransaksi = $_POST['tglTransaksi'];

  // Menyiapkan query SELECT untuk mendapatkan noKamar dari tabel kamar berdasarkan typeKamar
  $stmt = $dbh->prepare("SELECT noKamar FROM kamar WHERE jenisKamar = ?");
  $stmt->bindParam(1, $typeKamar);

  // Menjalankan query SELECT
  $stmt->execute();

  // Mengambil hasil query
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // Mendapatkan noKamar dari hasil query
  $noKamar = $result['noKamar'];

  // Menyiapkan query SELECT untuk mendapatkan harga dari tabel kamar berdasarkan noKamar
  $stmt = $dbh->prepare("SELECT harga FROM kamar WHERE noKamar = ?");
  $stmt->bindParam(1, $noKamar);

  // Menjalankan query SELECT
  $stmt->execute();

  // Mengambil hasil query
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // Mendapatkan harga dari hasil query
  $harga = $result['harga'];

  // Menyiapkan query INSERT untuk menyimpan data ke tabel
  $stmt = $dbh->prepare("INSERT INTO transaksi (id, nama, noKamar, typeKamar, jmlPenginap, tglCheckin, tglCheckout, tglTransaksi, totalHarga, statusPembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'incomplete')");

  // Mengikat nilai parameter ke placeholder dalam query
  $stmt->bindParam(1, $id);
  $stmt->bindParam(2, $nama);
  $stmt->bindParam(3, $noKamar);
  $stmt->bindParam(4, $typeKamar);
  $stmt->bindParam(5, $jmlPenginap);
  $stmt->bindParam(6, $tglCheckin);
  $stmt->bindParam(7, $tglCheckout);
  $stmt->bindParam(8, $tglTransaksi);
  $stmt->bindParam(9, $harga);

  // Menjalankan query INSERT
  $stmt->execute();

  // Menampilkan pesan berhasil
  header('location: /bookingHotel/dashboard-user/production/index.php');
} catch (PDOException $e) {
  // Menampilkan pesan jika terjadi kesalahan
  echo "Error: " . $e->getMessage();
}
