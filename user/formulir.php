<html>

<head>
  <link rel="stylesheet" href="form.css">
  <link rel="icon" href="../logo K.png" type="image/ico" />
  <!-- Fontawesome CDN Link For Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo">

  <style>
    .submit-btn {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .submit-btn input {
      margin-right: 10px;
    }
  </style>
</head>

<body>
  <form action="proses_formulir.php" method="post">
    <h2>FORMULIR PEMESANAN</h2>
    <div class="form-group roomtype">
      <?php
      try {
        $dbh = new PDO("mysql:host=localhost;dbname=dbhotel", "root", "");
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

      $sql = "(SELECT jenisKamar FROM kamar WHERE jenisKamar = 'Standard room' AND status = 'Available' LIMIT 1)
          UNION
          (SELECT jenisKamar FROM kamar WHERE jenisKamar = 'Deluxe room' AND status = 'Available' LIMIT 1)
          UNION
          (SELECT jenisKamar FROM kamar WHERE jenisKamar = 'Premiere room' AND status = 'Available' LIMIT 1)
          UNION
          (SELECT jenisKamar FROM kamar WHERE jenisKamar = 'Family room' AND status = 'Available' LIMIT 1)
          UNION
          (SELECT jenisKamar FROM kamar WHERE jenisKamar = 'Luxury room' AND status = 'Available' LIMIT 1)
          UNION
          (SELECT jenisKamar FROM kamar WHERE jenisKamar = 'President room' AND status = 'Available' LIMIT 1)";
      $stmt = $dbh->query($sql);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if ($stmt->rowCount() > 0) {
        echo "<label>Pilihan Ruangan</label>";
        echo "<select id='roomtype' name='roomtype' style='cursor: pointer;' onchange='updateKapasitas()'>";

        foreach ($result as $row) {
          $jenisKamar = $row['jenisKamar'];
          echo "<option value='$jenisKamar'>$jenisKamar</option>";
        }
        echo "</select>";
      } else {
        echo "Tidak ada data";
      }
      ?>
    </div>

    <div id="fieldA" class="form-group kapasitas">
      <label for="kapasitasA">Kapasitas yang tersedia</label>
      <select id='kapasitasA' name='kapasitasA' style='cursor: pointer;'>
        <!-- The options will be populated dynamically based on the selected room type -->
      </select>
    </div>
    <div id="fieldB" class="form-group kapasitas" style="display: none;">
      <label for="kapasitasB">Kapasitas yang tersedia</label>
      <select id='kapasitasB' name='kapasitasB' style='cursor: pointer;'>
        <!-- The options will be populated dynamically based on the selected room type -->
      </select>
    </div>

    <div class="group-date">
      <div class="form-group date">
        <label for="tglCheckin">Checkin Date</label>
        <input type="date" name="tglCheckin" id="tglCheckin" placeholder="Select your date" style='cursor: pointer;'>
      </div>
      <h2>-</h2>
      <div class="form-group date">
        <label for="tglCheckout">Checkout Date</label>
        <input type="date" name="tglCheckout" id="tglCheckout" placeholder="Select your date" style='cursor: pointer;'>
      </div>
    </div>
    <div class="form-group submit-btn d-flex">
      <input name="submit" type="submit" value="SUBMIT">
      <input name="cancel" type="button" onclick="window.location.href='landing.php'" value="CANCEL">
      <input type="hidden" name="tglTransaksi" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                      echo date('Y-m-d H-i-s'); ?>">
    </div>
  </form>

  <script>
    function updateKapasitas() {
      var roomTypeSelect = document.getElementById("roomtype");
      var kapasitasA = document.getElementById("kapasitasA");
      var kapasitasB = document.getElementById("kapasitasB");

      // Clear previous options
      kapasitasA.innerHTML = "";
      kapasitasB.innerHTML = "";

      // Get the selected room type
      var selectedOption = roomTypeSelect.value;

      // Fetch the capacity options from the database based on the selected room type
      fetch("get_capacity.php?jenisKamar=" + selectedOption)
        .then(response => response.json())
        .then(data => {
          // Add the capacity options to the respective select elements
          data.forEach(capacity => {
            var optionA = document.createElement("option");
            optionA.value = capacity;
            optionA.text = capacity;
            kapasitasA.appendChild(optionA);

            var optionB = document.createElement("option");
            optionB.value = capacity;
            optionB.text = capacity;
            kapasitasB.appendChild(optionB);
          });
        })
        .catch(error => {
          console.log(error);
        });
    }
  </script>
</body>

</html>