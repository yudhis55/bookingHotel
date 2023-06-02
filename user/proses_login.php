<?php
session_start();
include('../admin/production/dbcon.php');

// Fungsi untuk memasukkan akun baru ke dalam database
function daftarAkun($nama, $noHp, $email, $passwd)
{
    global $dbh;

    // Mengenkripsi kata sandi sebelum disimpan ke database
    $hashedPassword = md5($passwd);
    $userRole = "user"; //nilai user untuk pengguna baru

    // Menyiapkan pernyataan SQL untuk memasukkan data pengguna baru
    $stmt = $dbh->prepare("INSERT INTO user (id, nama, noHp, email, passwd, userRole) VALUES (UUID(), ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $nama);
    $stmt->bindParam(2, $noHp);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $hashedPassword);
    $stmt->bindParam(5, $userRole);


    // Menjalankan pernyataan SQL
    if ($stmt->execute()) {
        return true; // Akun berhasil didaftarkan
        exit(); // Menutup pernyataan
    } else {
        return false; // Gagal memasukkan akun ke dalam database
        exit(); // Menutup pernyataan
    }
}

// Fungsi untuk memeriksa kecocokan login pengguna
function cekLogin($email, $passwd)
{
    global $dbh;

    $stmt = $dbh->prepare("SELECT email, passwd FROM user WHERE email = ?");
    $stmt->bindParam(1, $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() === 1) {
        $hashedPassword = $row['passwd'];

        if (md5($passwd) === $hashedPassword) {
            return $row['email'];
        } else {
            return false;
        }
    }

    return false;
}




// Fungsi untuk memeriksa apakah akun memiliki akses admin
function cekHakAksesAdmin($email, $nama)
{
    global $dbh;
    $stmtid = $dbh->prepare("SELECT id FROM user WHERE email = ?");
    $stmtid->bindParam(1, $email);
    $stmtid->execute();
    $id = $stmtid->fetchColumn();
    $stmt = $dbh->prepare("SELECT userRole FROM user WHERE email = ?");
    $stmt->bindParam(1, $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($stmt->rowCount() === 1) {
        $role = $row['userRole'];

        if ($role === 'admin') {
            $_SESSION['log'] = 'logged';
            $_SESSION['userRole'] = 'admin';
            $_SESSION['nama'] = $nama; // Tambahkan session nama pengguna
            $_SESSION['id'] = $id;
            header('Location: /bookingHotel/admin/production/index.php');
            exit();
        } else {
            $_SESSION['log'] = 'logged';
            $_SESSION['userRole'] = 'user';
            $_SESSION['nama'] = $nama; // Tambahkan session nama pengguna
            $_SESSION['id'] = $id;
            header('Location: /bookingHotel/user/landing.php');
            exit();
        }
    }

    return false;
}

$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$noHp = isset($_POST['noHp']) ? $_POST['noHp'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$passwd = isset($_POST['passwd']) ? $_POST['passwd'] : '';

// Proses pendaftaran akun
if (isset($_POST['daftar'])) {
    if (!empty($nama) && !empty($noHp) && !empty($email) && !empty($passwd)) {
        if (daftarAkun($nama, $noHp, $email, $passwd)) {
            echo '<script>
                    alert("Akun sudah dibuat. Silahkan login");
                    window.location.href = "/bookingHotel/user/login.php";
                </script>';
        } else {
            echo '<script>
                    alert("Gagal mendaftarkan akun. Silakan coba lagi");
                    window.location.href = "/bookingHotel/user/login.php";
                </script>';
        }
    }
}

// Proses login
if (isset($_POST['login'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $passwd = isset($_POST['passwd']) ? $_POST['passwd'] : '';

    $loggedInEmail = cekLogin($email, $passwd);

    if ($loggedInEmail !== false) {
        // Login berhasil
        $_SESSION['log'] = 'Logged';
        cekHakAksesAdmin($loggedInEmail, $nama); // Tambahkan parameter $nama ke fungsi cekHakAksesAdmin()
    } else {
        // Login gagal
        echo '<script>
        alert("Login gagal. Silakan masukkan email dan password yang benar");
        window.location.href = "/bookingHotel/user/login.php";
        </script>';
        exit();
    }
}
