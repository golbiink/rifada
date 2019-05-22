<?php
include "../config/koneksi.php";

if ($_SESSION['leveluser']=='admin'){
$sql=mysql_query("select * from modul where aktif='Y'");
    echo "<li><a href='?module=halamanstatis'>Statics Pages</a></li>
		  <li><a href='?module=halamanstatis&act=tambahhalamanstatis'>Add New Pages</a></li>";
  } 
elseif ($_SESSION['leveluser']=='user'){
$sql=mysql_query("select * from modul where status='user' and aktif='Y'");
    echo "";
}
  
?>
