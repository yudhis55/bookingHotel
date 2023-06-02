<?php
include('dbcon.php');

$noKamar = "";
$kapasitas = "";
$harga = "";
$jenisKamar = "";
$status = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET method: menampilkan data kamar

    if (!isset($_GET["noKamar"])) {
        header("location: /bookingHotel/admin/production/index3.php");
        exit;
    }

    $noKamar = $_GET["noKamar"];

    //baca data kamar
    $sql = "SELECT * FROM kamar WHERE noKamar=$noKamar";
    $result = $dbh->query($sql);
    $row = $result->fetch();

    if (!$row) {
        header("location: /bookingHotel/admin/production/index3.php");
        exit;
    }

    $noKamar = $row["noKamar"];
    $kapasitas = $row["kapasitas"];
    $harga = $row["harga"];
    $jenisKamar = $row["jenisKamar"];
    $status = $row["status"];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //POST method: update data kamar

    $noKamar = $_POST["noKamar"];
    $kapasitas = $_POST["kapasitas"];
    $harga = $_POST["harga"];
    $jenisKamar = $_POST["jenisKamar"];
    $status = $_POST["status"];

    if (empty($noKamar) || empty($kapasitas) || empty($harga) || empty($jenisKamar)) {
        $errorMessage = "All fields are required";
    } else {
        // Mengupdate data kamar
        $sql = "UPDATE `kamar` SET `noKamar` = :noKamar, `kapasitas` = :kapasitas, `harga` = :harga, `jenisKamar` = :jenisKamar, `status` = :status WHERE `noKamar` = :noKamar";
        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':noKamar', $noKamar);
        $stmt->bindParam(':kapasitas', $kapasitas);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':jenisKamar', $jenisKamar);
        $stmt->bindParam(':status', $status);

        $result = $stmt->execute();

        if ($result) {
            $successMessage = "Room updated correctly";
            header("location: /bookingHotel/admin/production/index3.php");
            exit;
        } else {
            $errorMessage = "Error updating room: " . $stmt->errorCode();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Kencana</title>
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container my-5">
        <h2>New Room </h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'>X</button>
            </div>
            ";
        }
        ?>

        <form method="post">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nomor Kamar</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="noKamar" value="<?php echo $noKamar; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Kapasitas</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kapasitas" value="<?php echo $kapasitas; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Harga/malam</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="harga" value="<?php echo $harga; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Jenis Kamar</label>
                <div class="col-sm-6">
                    <label class="mr-5" style="cursor: pointer;"><input type="radio" name="jenisKamar" value="Standard Room" <?php if ($jenisKamar == "Standard Room") echo "checked"; ?> /> Standard Room</label>
                    <label style="cursor: pointer;"><input type="radio" name="jenisKamar" value="Deluxe Room" <?php if ($jenisKamar == "Deluxe Room") echo "checked"; ?> /> Deluxe Room </label><br>
                    <label style="cursor: pointer;"><input type="radio" name="jenisKamar" value="Premier Room" <?php if ($jenisKamar == "Premier Room") echo "checked"; ?> /> Premier Room </label>
                    <label class="ml-5" style="cursor: pointer;"><input type="radio" name="jenisKamar" value="Family Room" <?php if ($jenisKamar == "Family Room") echo "checked"; ?> /> Family Room </label><br>
                    <label style="cursor: pointer;"><input type="radio" name="jenisKamar" value="Luxury Room" <?php if ($jenisKamar == "Luxury Room") echo "checked"; ?> /> Luxury Room </label>
                    <label class="ml-5" style="cursor: pointer;"><input type="radio" name="jenisKamar" value="President Room" <?php if ($jenisKamar == "President Room") echo "checked"; ?> /> President Room </label><br>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-6">
                    <label style="cursor: pointer;"><input type="radio" name="status" value="Available" <?php if ($status == "Available") echo "checked"; ?>> Available </label><br>
                    <label style="cursor: pointer;"><input type="radio" name="status" value="Booked" <?php if ($status == "Booked") echo "checked"; ?>> Booked </label>
                </div>
            </div>

            <?php
            if (!empty($successMesssage)) {
                echo "
                <div class='row-mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'>X</button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/bookingHotel/admin/production/index3.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>

            </div>
        </form>
    </div>
</body>

</html>