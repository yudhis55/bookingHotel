<?php
if (isset($_GET["noKamar"])) {
    $noKamar = $_GET["noKamar"];

    include('dbcon.php');

    $sql = "DELETE FROM `kamar` WHERE noKamar=$noKamar";
    $dbh->query($sql);
}

header("location: /bookingHotel/admin/production/index3.php");
exit;
