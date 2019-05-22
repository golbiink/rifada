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

// Hapus gallery
if ($module=='staff' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gbr_staff FROM staff WHERE id_staff='$_GET[id]'"));
  if ($data['gbr_staff']!=''){
    mysql_query("DELETE FROM staff WHERE id_staff='$_GET[id]'");
    unlink("../../../img_staff/$_GET[namafile]");   
    unlink("../../../img_staff/kecil_$_GET[namafile]");
  }
  else{
    mysql_query("DELETE FROM staff WHERE id_staff='$_GET[id]'");  
  }   
  header('location:../../media.php?module='.$module);
}

// Input gallery
elseif ($module=='staff' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  
  $staff_seo     = seo_title($_POST['nama_staff']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=staff')</script>";
    }
    else{
    UploadStaff($nama_file_unik);
    mysql_query("INSERT INTO staff(nama_staff,
                                    staff_seo,
                                    id_jabatan,
                                    keterangan,
                                    gbr_staff,
									facebook,
									twitter,
									email) 
                            VALUES('$_POST[nama_staff]',
                                   '$staff_seo',
                                   '$_POST[jabatan]',
                                   '$_POST[keterangan]',
                                   '$nama_file_unik',
								   '$_POST[facebook]',
								   '$_POST[twitter]',
								   '$_POST[email]')");
  header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysql_query("INSERT INTO staff(nama_staff,
                                    staff_seo,
                                    id_jabatan,
                                    keterangan,
									facebook,
									twitter,
									email) 
                            VALUES('$_POST[nama_staff]',
                                   '$staff_seo',
                                   '$_POST[jabatan]',
                                   '$_POST[keterangan]',
								   '$_POST[facebook]',
								   '$_POST[twitter]',
								   '$_POST[email]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update gallery
elseif ($module=='staff' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  $staff_seo      = seo_title($_POST['nama_staff']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE staff SET nama_staff  = '$_POST[nama_staff]',
                                   staff_seo   = '$staff_seo', 
                                   id_jabatan = '$_POST[jabatan]',
                                   keterangan  = '$_POST[keterangan]',
								   facebook   = '$_POST[facebook]',
								   twitter   = '$_POST[twitter]',
								   email   = '$_POST[email]'
                             WHERE id_staff   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=staff')</script>";
    }
    else{
    UploadStaff($nama_file_unik);
    mysql_query("UPDATE staff SET nama_staff  = '$_POST[nama_staff]',
                                   staff_seo   = '$staff_seo', 
                                   id_jabatan = '$_POST[jabatan]',
                                   keterangan  = '$_POST[keterangan]',  
								   facebook   = '$_POST[facebook]',
								   twitter   = '$_POST[twitter]',
								   email   = '$_POST[email]',
								   gbr_staff      = '$nama_file_unik'
                             WHERE id_staff   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  }
}
}
?>
