<?php
// Memulai sesi
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../logo K.png" type="image/ico" />

  <title>Hotel Kencana</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.css" rel="stylesheet">

  <style>
    .site_title {
      text-decoration: none;
      color: black;
    }

    .site_title span {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-weight: bold;
      font-size: 30px;
      letter-spacing: 1.5px;
    }
  </style>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col position-fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title" align=center><span>Kencana</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>User</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-money"></i> Pembayaran </a>
                </li>
                <li><a href="index2.php"><i class="fa fa-inbox"></i> Riwayat Pembayaran </a>
                </li>
                <li><a href="index3.php"><i class="fa fa-user"></i> Profil </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <form method="post">
                  <button style="height: 35px;" name="logout" type="submit" class="btn btn-outline-primary" formaction="/bookingHotel/user/landing.php"><i class="fa fa-home">Home</i></button>
                  <?php
                  if ($_SESSION['userRole'] === 'admin') {
                    echo '<button style="height: 35px;" name="logout" type="submit" class="btn btn-outline-primary" formaction="/bookingHotel/admin/production/index.php"><i class="fa fa-tachometer">Dashboard</i></button>';
                  }
                  ?>
                  <button style="height: 35px;" name="logout" type="submit" class="btn btn-outline-danger" formaction="../../logout.php"><i class="fa fa-sign-out pull-right">Logout</i></button>
                </form>

              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <h4>Transaksi belum dibayar</h4>
            <hr>
            <?php
            // Mendapatkan data ID dari sesi yang login saat ini
            $userRole = isset($_SESSION['userRole']) ? $_SESSION['userRole'] : '';

            try {
              // Membuat koneksi ke database
              $dbh = new PDO("mysql:host=localhost;dbname=dbhotel", "root", "");

              // Mendapatkan ID dari hasil query
              $id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

              // Menyiapkan query SELECT untuk mendapatkan data transaksi berdasarkan ID pengguna dan status pembayaran "incomplete"
              $stmt = $dbh->prepare("SELECT * FROM transaksi WHERE id = ? AND statusPembayaran = 'incomplete'");
              $stmt->bindParam(1, $id);

              // Menjalankan query SELECT
              $stmt->execute();

              // Mengambil hasil query
              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

              // Menampilkan data transaksi dalam card
              foreach ($results as $result) {
                echo '<div class="card w-75">';
                echo '<div class="card-body text-dark">';
                echo '<h5 class="card-title">Transaksi pembayaran</h5>';

                echo '<table style="font-size: 15px;">';
                echo '<tbody>';
                echo '  <tr>';
                echo '    <td style="width: 200px;">ID Transaksi</td>';
                echo '    <td>: ' . $result["idTransaksi"] . '</td>';
                echo '  </tr>';
                echo '  <tr>';
                echo '    <td>Nama</td>';
                echo '    <td>: ' . $result["nama"] . '</td>';
                echo '  </tr>';
                echo '  <tr>';
                echo '    <td>Nomor Kamar</td>';
                echo '    <td>: ' . $result["noKamar"] . '</td>';
                echo '  </tr>';
                echo '  <tr>';
                echo '    <td>Jenis Kamar</td>';
                echo '    <td>: ' . $result["typeKamar"] . '</td>';
                echo '  </tr>';
                echo '  <tr>';
                echo '    <td>Jenis Kamar</td>';
                echo '    <td>: ' . $result["jmlPenginap"] . '</td>';
                echo '  </tr>';
                echo '  <tr>';
                echo '    <td>Tanggal checkin</td>';
                echo '    <td>: ' . $result["tglCheckin"] . '</td>';
                echo '  </tr>';
                echo '  <tr>';
                echo '    <td>Tanggal checkout</td>';
                echo '    <td>: ' . $result["tglCheckout"] . '</td>';
                echo '  </tr>';
                echo '  <tr>';
                echo '    <td>Tanggal transaksi</td>';
                echo '    <td>: ' . $result["tglTransaksi"] . '</td>';
                echo '  </tr>';
                echo '  <tr>';
                echo '    <td>Harga</td>';
                echo '    <td>: $' . $result["totalHarga"] . '</td>';
                echo '  </tr>';
                echo '</tbody>';
                echo '</table>';

                // Membuat link Bayar dengan atribut onclick yang akan memanggil fungsi updateStatus() dengan ID transaksi sebagai parameter
                echo '<a href="#" class="btn btn-success" onclick="updateStatus(' . $result["idTransaksi"] . ')">Bayar</a>';

                echo '</div>';
                echo '</div>';
              }
            } catch (PDOException $e) {
              // Menampilkan pesan jika terjadi kesalahan
              echo "Error: " . $e->getMessage();
            }
            ?>

          </div>
        </div>
        <br />
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Admin-1 mengkeren
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="../vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="../vendors/Flot/jquery.flot.js"></script>
  <script src="../vendors/Flot/jquery.flot.pie.js"></script>
  <script src="../vendors/Flot/jquery.flot.time.js"></script>
  <script src="../vendors/Flot/jquery.flot.stack.js"></script>
  <script src="../vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="../vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../vendors/moment/min/moment.min.js"></script>
  <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

  <script>
    function updateStatus(transaksiId) {
      // Mengirim permintaan AJAX ke server
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "update_status.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Menangani respon dari server
          if (xhr.responseText === "success") {
            // Jika permintaan berhasil, reload halaman untuk memperbarui daftar transaksi
            location.reload();
          } else {
            // Jika permintaan gagal, tampilkan pesan error
            alert("Gagal melakukan pembayaran. Silakan coba lagi.");
          }
        }
      };
      // Mengirim data transaksiId ke server
      xhr.send("transaksiId=" + transaksiId);
    }
  </script>

</body>

</html>