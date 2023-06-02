<?php
include('dbcon.php');

$id = "";
$nama = "";
$noHp = "";
$email = "";
$passwd = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET method: menampilkan data kamar

    if (!isset($_GET["id"])) {
        header("location: /bookingHotel/admin/production/index2.php");
        exit;
    }

    $id = $_GET["id"];

    //baca data kamar
    $sql = "SELECT * FROM user WHERE id=$id";
    $result = $dbh->query($sql);
    $row = $result->fetch();

    if (!$row) {
        header("location: /bookingHotel/admin/production/index2.php");
        exit;
    }

    $id = $row["id"];
    $nama = $row["nama"];
    $noHp = $row["noHp"];
    $email = $row["email"];
    $passwd = ($row["passwd"]);
    $userRole = $row["userRole"];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //POST method: update data kamar

    $id = $_GET["id"];
    $nama = $_POST["nama"];
    $noHp = $_POST["noHp"];
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];

    if (empty($nama) || empty($noHp) || empty($email) || empty($passwd)) {
        $errorMessage = "All fields are required";
    } else {
        // Mengupdate data kamar
        $sql = "UPDATE `user` SET `id` = :id, `nama` = :nama, `noHp` = :noHp, `email` = :email, `passwd` = :passwd WHERE `id` = :id";
        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':noHp', $noHp);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':passwd', $passwd);

        $result = $stmt->execute();

        if ($result) {
            $successMessage = "User updated correctly";
            header("location: /bookingHotel/admin/production/index2.php");
            exit;
        } else {
            $errorMessage = "Error updating user: " . $stmt->errorCode();
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
        <h2>New User </h2>

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

        <form method="post" \>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="noHp" value="<?php echo $noHp; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3" hidden>
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="passwd" value="<?php echo $passwd; ?>">
                </div>
            </div>




            <?php
            if (!empty($succesMesssage)) {
                echo "
                <div class='row-mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class'alert alert-success alert-dismissible fade show' role='alert'>
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
                    <a href="/bookingHotel/admin/production/index2.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>

            </div>
        </form>
    </div>
</body>

</html>