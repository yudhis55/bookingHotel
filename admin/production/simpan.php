<?php
include('dbcon.php');

//terima data dari form
$noKamar = $_POST['noKamar'];
$jenisKamar = $_POST['jenisKamar'];
$deskripsi = $_POST['deskripsi'];
$fasilitas = $_POST['fasilitas'];
$kapasitas = $_POST['kapasitas'];
$foto = $_POST['foto'];
$harga = $_POST['harga'];

//simpan data ke database
$sql = $dbh->exec("INSERT INTO `kamar` (`noKamar`, `jenisKamar`, `deskripsi`, `fasilitas`, `kapasitas`, `foto`, `harga`)
VALUES ('$noKamar', '$jenisKamar', '$deskripsi', '$fasilitas', '$kapasitas', '$foto', '$harga')");

echo $sql;

if ($sql == true) {
    echo " Data anda sudah tersimpan ke database<br>";
} else {
    echo "Data gagal tersimpan";
}
