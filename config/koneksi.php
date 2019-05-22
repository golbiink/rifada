<?php
$server = "localhost";
$username = "asimetri_asimetr";
$password = "4s1m3tri52018^";
$database = "asimetri_asimetris";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
