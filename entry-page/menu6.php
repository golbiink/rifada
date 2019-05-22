<?php
include "../config/koneksi.php";

if ($_SESSION['leveluser']=='admin'){
$sql=mysql_query("select * from modul where aktif='Y'");
    echo "<li><a href='?module=identitas'>Website Identity</a></li>
		  <li><a href='?module=modul'>Website Module</a></li>
		  <li><a href='?module=menu'>Website Menu</a></li>
		  <li><a href='?module=hubungi'>Messages Inbox</a></li>
		  <li><a href='?module=user'>User Management</a></li>";
  } 
elseif ($_SESSION['leveluser']=='user'){
$sql=mysql_query("select * from modul where status='user' and aktif='Y'");
    echo "<li><a href='?module=agenda'>Events</a></li>
		  <li><a href='?module=user'>User Management</a></li>";
}
  
?>
