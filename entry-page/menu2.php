<?php
include "../config/koneksi.php";

if ($_SESSION['leveluser']=='admin'){
$sql=mysql_query("select * from modul where aktif='Y'");
    echo "<li><a href='?module=berita'>All News</a></li>
		  <li><a href='?module=berita&act=tambahberita'>Add News</a></li>
		  <li><a href='?module=kategori'>Categori</a></li>
		  <li><a href='?module=tag'>Tag (label)</a></li>";
  } 
elseif ($_SESSION['leveluser']=='user'){
$sql=mysql_query("select * from modul where status='user' and aktif='Y'");
    echo "<li><a href='?module=berita'>All User</a></li>
		  <li><a href='?module=berita&act=tambahberita'>Add News</a></li>";
}
  
?>
