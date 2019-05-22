<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload banyak file dengan php</title>
<style type="text/css">
#form-upload {
 width:500px;
 margin:0 auto;
 border:1px solid #ccc;
 border-radius:10px;
 padding:10px;
 background-color:#E2FEEA;
 font:14px "Trebuchet MS";
}
</style>



</head>
<body>

<div id="form-upload">
<form action="coba.php" method="post" enctype="multipart/form-data">
  <h3 align="center">Isikan judul dan pilih file yang akan di upload :</h3>
  <p> Logo<br /><input name="nama_file[]" type="file" /></p>
  <p>Favicon<br /><input name="nama_file[]" type="file" /></p>
  
<p>* Hanya file gambar jpg/gif/png</p>
<p align="center"><input name="btnKirim" type="submit" id="btnKirim" value="Kirim File" /></p>
</form>
</div>
</body>
</html>


