<?php
 $namafolder="photo/"; //tempat menyimpan file
 for($i=0; $i<=count($_FILES['nama_file']); $i++)
 {
  if (!empty($_FILES["nama_file"]["tmp_name"][$i]))
  {
   $jenis_gambar=$_FILES['nama_file']['type'][$i];
   $judul_gambar=$_POST['judul'][$i];
   if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
   {         
    $gambar = $namafolder . basename($_FILES['nama_file']['name'][$i]);     
    if (move_uploaded_file($_FILES['nama_file']['tmp_name'][$i], $gambar)) {
     //tampilkan ke layar
     echo "Judul Gambar : ".$judul_gambar."<br />";
     echo "Jenis Gambar : ".$jenis_gambar."<br />";
     echo "<img src=\"$gambar\" width=\"100\" alt=\"$judul_gambar\" /><br />";
     //tambahkan proses menyimpan database jika diperlukan seperti berikut
     //mysql_query("insert into tb_mgambar(judul_gambar,nama_file) values('$judul_gambar','$gambar')") or die(mysql_error());
    }
     }
     else
     {
    echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png<br />";
     }
    }
 }
?>