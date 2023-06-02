<?php

session_start();

// Menghapus semua data sesi
session_unset();

// Menghapus sesi yang aktif
session_destroy();

// Mengarahkan pengguna ke halaman login atau halaman utama
header('Location: http://localhost/bookingHotel/user/login.php');
