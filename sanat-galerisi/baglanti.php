<?php
$servername = "localhost";
$username = "dbusr23360859057";
$password = "FcLkCZPqzVZw";
$dbname = "dbstorage23360859057";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
?>
