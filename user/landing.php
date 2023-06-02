<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hotel Kencana</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo">
  <link rel="icon" href="../logo K.png" type="image/ico" />
  <script src="https://kit.fontawesome.com/042c63840c.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div class="logo">
      <p>Kencana</p>
    </div>
    <nav>
      <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="#room">Ruangan</a></li>
        <li><a href="#content3">Galeri</a></li>
        <li><a href="#content4">Kontak</a></li>
        <li><a href="../dashboard-user/production/index.php">Dashboard</a></li>
      </ul>
    </nav>
    <?php
    session_start();
    if (isset($_SESSION['userRole']) > 0) {

      echo '<button><a href="?logout=true">LOGOUT</a></button>';
    } else {
      echo '<button><a href="login.php">LOGIN / DAFTAR</a></button>';
    }

    if (isset($_GET['logout'])) {
      // Menghapus semua data session
      session_destroy();
      // Redirect ke halaman login
      header("Location: landing.php");
      exit;
    }
    ?>

  </header>
  <?php

  // Cek status login pengguna
  if (isset($_SESSION['userRole']) > 0) {

    // Jika sudah login, tampilkan tombol "Choose Room"
    echo '<div class="content1">
                <div class="center-text">
                  <h1>Nikmati Liburan <br>Impian Anda</h1><br>
                  <p>Kencana Hotel Adalah Pilihan Yang Tepat Bagi Pengunjung Yang Mencari Perpaduan Antara Pesona, Kedamaian dan Kenyamanan.</p><br>
                  <a class="btn-main" href="formulir.php"><span>PILIH RUANG ANDA</span></a>
                </div>
              </div>';
  } else {
    echo '<div class="content1">
                <div class="center-text">
                  <h1>Nikmati Liburan <br>Impian Anda</h1><br>
                  <p>Kencana Hotel adalah pilihan yang tepat bagi pengunjung yang mencari perpaduan antara pesona, kedamaian dan kenyamanan.</p><br>
                  <a class="btn-main" href="login.php"><span>LOGIN SEBELUM MEMESAN</span></a>
                </div>
              </div>';
  }
  ?>


  <div class="content2">
    <div class="info">
      <div class="info1">
        <div class="logoinfo1">
          <i class="fa-regular fa-clock" style="color: #ffffff;"></i>
        </div>
        <div class="boxtext1">
          <p class="box1">WAKTU PELAYANAN</p>
          <p class="box2">Senin - Jumat: 09:00 - 18:00</p>
        </div>
      </div>
      <div class="info2">
        <div class="logoinfo2">
          <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i>
        </div>
        <div class="boxtext2">
          <p class="box3">LOKASI</p>
          <p class="box4">Jl. Ir. Soekarno No. 100 Surabaya</p>
        </div>
      </div>
      <div class="info3">
        <div class="logoinfo3">
          <i class="fa-solid fa-headphones" style="color: #ffffff;"></i>
        </div>
        <div class="boxtext3">
          <p class="box5">LAYANAN PELANGGAN</p>
          <p class="box6">0355-703684</p>
        </div>
      </div>
    </div>
    <div class="room" id="room">
      <h2 class="title2">
        Daftar Ruangan
      </h2>
      <div class="rooms">
        <div class="roomsone">
          <div class="rooms1">
            <div class="picrooms1">
              <img src="1.jpg" alt="">
            </div>
            <div class="detailrooms1">
              <div class="titlerooms1">
                <h3>STANDART ROOM</h3>
              </div>
              <div class="inforooms1">
                <p>Kamar nyaman dengan fasilitas dasar, cocok untuk penginapan harian dengan tempat tidur yang nyaman dan fasilitas mandi pribadi.<br><br><br><br></p>
              </div>
              <?php
              if (isset($_SESSION['userRole']) > 0) {
                // Jika sudah login, tampilkan logout
                echo '<div class="bookrooms1">
                              <a href="formulir.php">BOOKING SEHARGA $50</a>
                          </div>';
              } else {
                echo '<div class="bookrooms1">
                            <a href="login.php">Login terlebih dahulu</a>
                          </div>';
              }
              ?>
            </div>
          </div>
          <div class="rooms2">
            <div class="picrooms2">
              <img src="2.jpg" alt="">
            </div>
            <div class="detailrooms2">
              <div class="titlerooms2">
                <h3>DELUXE ROOM</h3>
              </div>
              <div class="inforooms2">
                <p>Kamar yang lebih luas dan dilengkapi dengan fasilitas tambahan seperti area duduk, TV layar datar, dan mungkin juga pemandangan yang menakjubkan.<br><br><br><br></p>
              </div>
              <?php
              if (isset($_SESSION['userRole']) > 0) {
                // Jika sudah login, tampilkan logout
                echo  '<div class="bookrooms2">
                            <a href="formulir.php">BOOKING SEHARGA $100</a>
                          </div>';
              } else {
                echo '<div class="bookrooms1">
                            <a href="login.php">Login terlebih dahulu</a>
                          </div>';
              }
              ?>
            </div>
          </div>
          <div class="rooms3">
            <div class="picrooms3">
              <img src="3.jpg" alt="">
            </div>
            <div class="detailrooms3">
              <div class="titlerooms3">
                <h3>PREMIER ROOM</h3>
              </div>
              <div class="inforooms3">
                <p>Kamar mewah dengan interior yang elegan, dilengkapi dengan fasilitas modern, seperti bathtub mandi, ruang tamu terpisah, dan akses ke fasilitas tambahan di hotel.<br><br><br></p>
              </div>
              <?php
              if (isset($_SESSION['userRole']) > 0) {
                // Jika sudah login, tampilkan logout
                echo  '<div class="bookrooms3">
                              <a href="formulir.php">BOOKING SEHARGA $150</a>
                          </div>';
              } else {
                echo '<div class="bookrooms3">
                              <a href="login.php">Login terlebih dahulu</a>
                          </div>';
              }
              ?>

            </div>
          </div>
        </div>
        <div class="roomstwo">
          <div class="rooms4">
            <div class="picrooms4">
              <img src="family.jpg" alt="">
            </div>
            <div class="detailrooms4">
              <div class="titlerooms4">
                <h3>FAMILY ROOM</h3>
              </div>
              <div class="inforooms4">
                <p>Kamar yang dirancang khusus untuk keluarga dengan area tidur terpisah dan fasilitas lengkap untuk kenyamanan bersama.<br><br><br><br></p>
              </div>
              <?php
              if (isset($_SESSION['userRole']) > 0) {
                // Jika sudah login, tampilkan logout
                echo  ' <div class="bookrooms4">
                              <a href="formulir.php">BOOKING SEHARGA $200</a>
                            </div>';
              } else {
                echo ' <div class="bookrooms4">
                                <a href="login.php">Login terlebih dahulu</a>
                            </div>';
              }
              ?>

            </div>
          </div>
          <div class="rooms5">
            <div class="picrooms5">
              <img src="luxury.jpg" alt="">
            </div>
            <div class="detailrooms5">
              <div class="titlerooms5">
                <h3>LUXURY ROOM</h3>
              </div>
              <div class="inforooms5">
                <p>Kamar mewah dengan dekorasi yang indah, ruang yang luas, fasilitas premium, dan pemandangan menakjubkan yang menciptakan pengalaman menginap yang tak terlupakan.<br><br><br></p>
              </div>
              <?php
              if (isset($_SESSION['userRole']) > 0) {
                // Jika sudah login, tampilkan logout
                echo  ' <div class="bookrooms5">
                              <a href="formulir.php">BOOKING SEHARGA $300</a>
                            </div>';
              } else {
                echo ' <div class="bookrooms5">
                              <a href="login.php">Login terlebih dahulu</a>
                          </div>';
              }
              ?>

            </div>
          </div>
          <div class="rooms6">
            <div class="picrooms6">
              <img src="president.jpg" alt="">
            </div>
            <div class="detailrooms6">
              <div class="titlerooms6">
                <h3>PRESIDENT ROOM</h3>
              </div>
              <div class="inforooms6">
                <p>Kamar eksklusif dengan ruang yang sangat luas, fasilitas mewah seperti ruang makan pribadi, lounge pribadi, dan layanan concierge yang disempurnakan untuk tamu yang menginginkan pengalaman menginap yang tak tertandingi.</p>
              </div>
              <?php
              if (isset($_SESSION['userRole']) > 0) {
                // Jika sudah login, tampilkan logout
                echo  ' <div class="bookrooms6">
                                <a href="formulir.php">BOOKING SEHARGA $500</a>
                            </div>';
              } else {
                echo ' <div class="bookrooms5">
                              <a href="login.php">Login terlebih dahulu</a>
                          </div>';
              }
              ?>

            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="content3" id="content3">
      <div class="experience">
        <div class="picexp">
          <div class="pic1exp">
            <img src="exp1.jpg" alt="">
          </div>
          <div class="pic2exp">
            <img src="exp2.jpg" alt="">
          </div>
        </div>
        <div class="exp">
          <div class="titleexp">
            <h2>Pengalaman Kemewahan<br>Yang Tidak Terlupakan</h2>
          </div>
          <div class="detailexp">
            <p>Nikmati kemewahan tak terlupakan yang akan membekas dalam ingatan Anda. Kami memberikan pengalaman tak tertandingi yang memanjakan Anda. Rasakan kepuasan yang luar biasa dengan layanan dan fasilitas premium yang kami sediakan. Kami percaya bahwa Anda pantas mendapatkan pengalaman menginap yang istimewa dan kami berkomitmen untuk menjadikan setiap momen Anda di hotel kami tak terlupakan</p>
          </div>
          <div class="bookexp">
            <a href="#">BOOKING SEKARANG</a>
          </div>
        </div>
      </div>
    </div>

    <div class="content4" id="content4">
      <div class="contact">
        <h2 class="title4">Hubungi Kami</h2>
        <div class="contact-form">
          <form>
            <div class="form-group">
              <input type="text" placeholder="Nama Anda" required>
            </div>
            <div class="form-group">
              <input type="email" placeholder="Email Anda" required>
            </div>
            <div class="form-group">
              <textarea placeholder="Masukkan Pesan" required></textarea>
            </div>
            <div class="form-group">
              <button type="submit">Kirim Pesan</button>
            </div>
          </form>
        </div>
        <div class="contact-info">
          <div class="info-item">
            <i class="fas fa-map-marker-alt"></i>
            <p>Jl. Ir. Soekarno No. 100 Surabaya</p>
          </div>
          <div class="info-item">
            <i class="fas fa-phone-alt"></i>
            <p>0355-703684</p>
          </div>
          <div class="info-item">
            <i class="fas fa-envelope"></i>
            <p>kencanahotel@gmail.com</p>
          </div>
        </div>
      </div>
    </div>

</body>

</html>