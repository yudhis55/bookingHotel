<!DOCTYPE html>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo">
  <script src="https://kit.fontawesome.com/042c63840c.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div class="logo">
      <p>Kencana</p>
    </div>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#room">Rooms</a></li>
        <li><a href="#content3">Gallery</a></li>
        <li><a href="#content4">Contacts</a></li>
        <li><a href="/bookingHotel/dashboard-user/production/index.php">Dashboard</a></li>
      </ul>
    </nav>
    <form>
      <button formaction="/bookingHotel/login/login.php">LOGIN</button>
    </form>
  </header>

  <div class="content1">
    <div class="center-text">
      <h1>Enjoy Your<br>Dream Vacation</h1>
      <p>The Kencana Hotel is the right choice for visitors who are searching for a combination of charm, peace and,
        comfort.</p>
      <a class="btn-main" href="#room"><span>CHOOSE ROOM</span></a>
    </div>
  </div>

  <div class="content2">
    <div class="info">
      <div class="info1">
        <div class="logoinfo1">
          <i class="fa-regular fa-clock" style="color: #ffffff;"></i>
        </div>
        <div class="boxtext1">
          <p class="box1">OPENING TIMES</p>
          <p class="box2">Monday - Friday: 09:00 - 18:00</p>
        </div>
      </div>
      <div class="info2">
        <div class="logoinfo2">
          <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i>
        </div>
        <div class="boxtext2">
          <p class="box3">OUR LOCATION</p>
          <p class="box4">100 S Main St, Los Angeles, CA</p>
        </div>
      </div>
      <div class="info3">
        <div class="logoinfo3">
          <i class="fa-solid fa-headphones" style="color: #ffffff;"></i>
        </div>
        <div class="boxtext3">
          <p class="box5">CUSTOMER SUPPORT</p>
          <p class="box6">100 S Main St, Los Angeles, CA</p>
        </div>
      </div>
    </div>
    <div class="room" id="room">
      <h2 class="title2">
        Our Rooms
      </h2>
      <div class="rooms">
        <div class="rooms1">
          <div class="picrooms1">
            <img src="1.jpg" alt="">
          </div>
          <div class="detailrooms1">
            <div class="titlerooms1">
              <h3>STANDART ROOM</h3>
            </div>
            <div class="inforooms1">
              <p>Most hotels and major hospitality companies have set industry standards to classify hotel types. An
                upscale full-service hotel facility offers luxury...</p>
            </div>
            <div class="bookrooms1">
              <a href="#">BOOK NOW FOR $29</a>
            </div>
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
              <p>Most hotels and major hospitality companies have set industry standards to classify hotel types. An
                upscale full-service hotel facility offers luxury...</p>
            </div>
            <div class="bookrooms2">
              <a href="#">BOOK NOW FOR $39</a>
            </div>
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
              <p>Most hotels and major hospitality companies have set industry standards to classify hotel types. An
                upscale full-service hotel facility offers luxury...</p>
            </div>
            <div class="bookrooms3">
              <a href="#">BOOK NOW FOR $49</a>
            </div>
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
          <h2>The Luxury Experience<br>You'll Remember</h2>
        </div>
        <div class="detailexp">
          <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
            dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor
            sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
            magnam aliquam quaerat voluptatem.</p>
        </div>
        <div class="bookexp">
          <a href="#">BOOK NOW </a>
        </div>
      </div>
    </div>
  </div>

  <div class="content4" id="content4">
    <div class="contact">
      <h2 class="title4">Contact Us</h2>
      <div class="contact-form">
        <form>
          <div class="form-group">
            <input type="text" placeholder="Your Name" required>
          </div>
          <div class="form-group">
            <input type="email" placeholder="Your Email" required>
          </div>
          <div class="form-group">
            <textarea placeholder="Your Message" required></textarea>
          </div>
          <div class="form-group">
            <button type="submit">Send Message</button>
          </div>
        </form>
      </div>
      <div class="contact-info">
        <div class="info-item">
          <i class="fas fa-map-marker-alt"></i>
          <p>100 S Main St, Los Angeles, CA</p>
        </div>
        <div class="info-item">
          <i class="fas fa-phone-alt"></i>
          <p>+1 123 456 7890</p>
        </div>
        <div class="info-item">
          <i class="fas fa-envelope"></i>
          <p>info@example.com</p>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    &copy; 2023 The Kencana Hotel | Designed by Your Name
  </div>

</body>

</html>