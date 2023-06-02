<?php
include('dbcon.php');

$id = "";
$nama = "";
$noHp = "";
$email = "";
$passwd = "";

$errorMessage = "";
$successMessage = "";

function daftarAkun($id, $nama, $noHp, $email, $passwd)
{
    global $dbh;

    // Mengenkripsi kata sandi sebelum disimpan ke database
    $hashedPassword = md5($passwd);
    $userRole = "admin";

    // Menyiapkan pernyataan SQL untuk memasukkan data pengguna baru
    $stmt = $dbh->prepare("INSERT INTO user (id, nama, noHp, email, passwd, userRole) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $nama);
    $stmt->bindParam(3, $noHp);
    $stmt->bindParam(4, $email);
    $stmt->bindParam(5, $hashedPassword);
    $stmt->bindParam(6, $userRole);

    // Menjalankan pernyataan SQL
    if ($stmt->execute()) {
        return true; // Akun berhasil didaftarkan
        exit(); // Menutup pernyataan
    } else {
        return false; // Gagal memasukkan akun ke dalam database
        exit(); // Menutup pernyataan
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $noHp = isset($_POST['noHp']) ? $_POST['noHp'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $passwd = isset($_POST['passwd']) ? $_POST['passwd'] : '';

    if (!empty($id) && !empty($nama) && !empty($noHp) && !empty($email) && !empty($passwd)) {
        if (daftarAkun($id, $nama, $noHp, $email, $passwd)) {
            echo '<script>
                        alert("Akun berhasil dibuat");
                        window.location.href = "/bookingHotel/admin/production/index2.php";
                    </script>';
        } else {
            echo '<script>
                        alert("Gagal menambahkan akun, silahkan coba lagi!");
                        window.location.href = "/bookingHotel/admin/production/index2.php";
                    </script>';
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
        <h2>New admin</h2>

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
                <label class="col-sm-3 col-form-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="passwd" value="<?php echo $passwd; ?>">
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