<?php
try {
    $dbh = new PDO("mysql:host=localhost;dbname=dbhotel", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}
