<?php
include "../config/koneksi.php";

if ($_SESSION['leveluser']=='admin'){
$sql=mysql_query("select * from modul where aktif='Y'");
    echo "<li><a href='?module=home'>Home</a></li>";
  } 
elseif ($_SESSION['leveluser']=='user'){
$sql=mysql_query("select * from modul where status='user' and aktif='Y'");
echo "<li><a href='?module=home'>Home</a></li>";
}
  
?>
