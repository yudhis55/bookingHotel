<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    include('dbcon.php');

    $sql = "DELETE FROM `user` WHERE id=:id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

header("location: /bookingHotel/admin/production/index2.php");
exit;
