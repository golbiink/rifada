<?php
include "../config/koneksi.php";

if ($_SESSION['leveluser']=='admin'){
$sql=mysql_query("select * from modul where aktif='Y'");
    echo "<li><a href='?module=staff'>Staff</a></li>
		  <li><a href='?module=staff&act=tambahstaff'>Tambah Staff</a></li>
		  <li><a href='?module=jabatan'>Jabatan Staff</a></li>";
  } 
elseif ($_SESSION['leveluser']=='user'){
$sql=mysql_query("select * from modul where status='user' and aktif='Y'");
    echo "";
}
  
?>
