<?php
include('dbcon.php');


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
  <link href="../build/css/custom.min.css" rel="stylesheet">

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
              <h2>Admin</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i> Dashboard </a>
                </li>
                <li><a href="index2.php"><i class="fa fa-users"></i> User Management </a>
                </li>
                <li><a href="index3.php"><i class="fa fa-tasks"></i> Room Management </a>
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
          <div class="col-md-12 col-sm-12 ">
            <h4>List of Transaction - Complete</h4>
            <hr>
            <table class="table">
              <thead>
                <tr>
                  <th>Id Transaksi</th>
                  <th>Nama</th>
                  <th>Nomor Kamar</th>
                  <th>Jenis Kamar</th>
                  <th>Jumlah Penginap</th>
                  <th>Tgl Checkin</th>
                  <th>Tgl Checkout</th>
                  <th>Tgl Transaksi</th>
                  <th>Harga</th>
                  <th>Status Pembayaran</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include('dbcon.php');

                // Read rows with status pembayaran complete
                $sql = "SELECT * FROM transaksi WHERE statusPembayaran = 'complete'";
                $result = $dbh->query($sql);

                if (!$result) {
                  die("Invalid query: " . $dbh->errorCode());
                }

                // Read data of each row
                while ($row = $result->fetch()) {
                  echo "
            <tr>
              <td>$row[idTransaksi]</td>
              <td>$row[nama]</td>
              <td>$row[noKamar]</td>
              <td>$row[typeKamar]</td>
              <td>$row[jmlPenginap]</td>
              <td>$row[tglCheckin]</td>
              <td>$row[tglCheckout]</td>
              <td>$row[tglTransaksi]</td>
              <td>$row[totalHarga]</td>
              <td>$row[statusPembayaran]</td>
            </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <h4>List of Transaction - Incomplete</h4>
            <hr>
            <table class="table">
              <thead>
                <tr>
                  <th>Id Transaksi</th>
                  <th>Nama</th>
                  <th>Nomor Kamar</th>
                  <th>Jenis Kamar</th>
                  <th>Jumlah Penginap</th>
                  <th>Tgl Checkin</th>
                  <th>Tgl Checkout</th>
                  <th>Tgl Transaksi</th>
                  <th>Harga</th>
                  <th>Status Pembayaran</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Read rows with status pembayaran incomplete
                $sql = "SELECT * FROM transaksi WHERE statusPembayaran = 'incomplete'";
                $result = $dbh->query($sql);

                if (!$result) {
                  die("Invalid query: " . $dbh->errorCode());
                }

                // Read data of each row
                while ($row = $result->fetch()) {
                  echo "
            <tr>
              <td>$row[idTransaksi]</td>
              <td>$row[nama]</td>
              <td>$row[noKamar]</td>
              <td>$row[typeKamar]</td>
              <td>$row[jmlPenginap]</td>
              <td>$row[tglCheckin]</td>
              <td>$row[tglCheckout]</td>
              <td>$row[tglTransaksi]</td>
              <td>$row[totalHarga]</td>
              <td>$row[statusPembayaran]</td>
            </tr>";
                }
                ?>
              </tbody>
            </table>
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

</body>

</html>