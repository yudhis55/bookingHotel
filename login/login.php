<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">

<head>
  <script>
    function showSuccessMessage(message) {
      alert(halo);
    }
  </script>
  <meta charset="UTF-8">
  <title> HOPENS </title>
  <link rel="stylesheet" href="/bookingHotel/login/login.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../logo K.png" type="image/ico" />

</head>

<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="login.png" alt="" style="filter: brightness(50%);">
        <div class="text">
          <span class="text-1">Every New Place is a <br> New Adventure</span>
          <span class="text-2">Let's get going to HOPENS</span><br>
        </div>
      </div>
      <div class="back">
        <div class="backImg">
          <img src="daftar.jpg" alt="" style="filter: brightness(50%);">
        </div>
        <div class="text">
          <span class="text-1">Let's Register Now<br>One More Step</span>
          <span class="text-2">Let's Have an Adventure</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>

          <!--FORM UNTUK KE HOME SAAT CLICK LOGIN-->

          <form action="proses_login.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Email " required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="passwd" placeholder="Password " required>
              </div>
              <div class="button input-box">
                <input type="submit" name="login" value="Login">
              </div>
              <div class="text sign-up-text">don't have account? <label for="flip">Register</label></div>
            </div>
          </form>
        </div>
        <div class="signup-form">
          <div class="title">Register</div>

          <!--FORM UNTUK SETELAH DAFTAR AKAN KEMBALI KE LOGIN-->

          <form action="/bookingHotel/login/proses_login.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="nama" placeholder="Name " required>
              </div>
              <div class="input-box">
                <i class="fas fa-phone"></i>
                <input type="text" name="noHp" placeholder="Phone Number " required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Email " required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="passwd" placeholder="Password " required>
              </div>
              <div class="button input-box">
                <input type="submit" name="daftar" value="Register">
              </div>
              <div class="text sign-up-text"><label for="flip">back to login</label></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>