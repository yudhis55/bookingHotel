<?php
// get_capacity.php

$roomType = $_GET['jenisKamar'];

try {
    $dbh = new PDO("mysql:host=localhost;dbname=dbhotel", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "SELECT kapasitas FROM kamar WHERE jenisKamar = :roomType AND status = 'Available'";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':roomType', $roomType);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo json_encode($result);
