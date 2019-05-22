<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Input Jabatan
if ($module=='jabatan' AND $act=='input'){
  $jabatan_seo = seo_title($_POST['nama_jabatan']);
  mysql_query("INSERT INTO jabatan(nama_jabatan,jabatan_seo) VALUES('$_POST[nama_jabatan]','$jabatan_seo')");
  header('location:../../media.php?module='.$module);
}

// Update Jabatan
elseif ($module=='jabatan' AND $act=='update'){
  $jabatan_seo = seo_title($_POST['nama_jabatan']);
  mysql_query("UPDATE jabatan SET nama_jabatan='$_POST[nama_jabatan]', jabatan_seo='$jabatann_seo', aktif='$_POST[aktif]' 
               WHERE id_jabatan = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
