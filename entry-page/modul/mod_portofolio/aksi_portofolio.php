<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus Portofolio
if ($module=='portofolio' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT foto_portofolio FROM portofolio WHERE id_portofolio='$_GET[id]'"));
  if ($data['foto_portofolio']!=''){
    mysql_query("DELETE FROM portofolio WHERE id_portofolio='$_GET[id]'");
    unlink("../../../img_portofolio/$_GET[namafile]");   
    unlink("../../../img_portofolio/kecil_$_GET[namafile]");
  }
  else{
    mysql_query("DELETE FROM portofolio WHERE id_portofolio='$_GET[id]'");  
  }   
  header('location:../../media.php?module='.$module);
}

// Input gallery
elseif ($module=='portofolio' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $portofolio_seo     = seo_title($_POST['nama_portofolio']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=portofolio')</script>";
    }
    else{
    UploadPortofolio($nama_file_unik);
    mysql_query("INSERT INTO portofolio(nama_portofolio,
                                    portofolio_seo,
									alamat_portofolio,
                                    foto_portofolio) 
                            VALUES('$_POST[nama_portofolio]',
							       '$portofolio_seo',
                                   '$_POST[alamat_portofolio]',
                                   '$nama_file_unik')");
  header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysql_query("INSERT INTO portofolio(nama_portofolio,
									portofolio_seo,
                                    alamat_portofolio) 
                            VALUES('$_POST[nama_portofolio]',
								   '$portofolio_seo',
                                   '$_POST[alamat_portofolio]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update Portofolio
elseif ($module=='portofolio' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  $portofolio_seo      = seo_title($_POST['nama_portofolio']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE portofolio SET nama_portofolio  = '$_POST[nama_portofolio]',
								   portofolio_seo  = '$portofolio_seo',
                                   alamat_portofolio = '$_POST[alamat_portofolio]'                                   
                             WHERE id_portofolio   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=portofolio')</script>";
    }
    else{
    UploadPortofolio($nama_file_unik);
    mysql_query("UPDATE portofolio SET nama_portofolio  = '$_POST[nama_portofolio]',
								   portofolio_seo   =  '$portofolio_seo',
                                   alamat_portofolio = '$_POST[alamat_portofolio]',
                                   foto_portofolio      = '$nama_file_unik'
                             WHERE id_portofolio   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  }
}
}
?>
