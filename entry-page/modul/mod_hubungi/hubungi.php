<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus file ini?")) {
      document.location = delUrl;
   }
}
</script>

<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_hubungi/aksi_hubungi.php";
switch($_GET[act]){
  // Tampil Hubungi Kami
  default:
    echo "<div class='box'>
		<div class='title'>
						Contact Us
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Name</th><th>Email</th><th>Subject</th><th>Date</th><th>Action</th></tr></thead>
								<tbody>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM hubungi ORDER BY id_hubungi DESC LIMIT $posisi, $batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td>$r[nama]</td>
                <td><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>$r[email]</a></td>
                <td>$r[subjek]</td>
                <td>$tgl</a></td>
                <td> <a href=javascript:confirmdelete('$aksi?module=hubungi&act=hapus&id=$r[id_hubungi]&namafile=$r[gambar]') 
   title='Hapus' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a>
                </td></tr>";
    $no++;
    }
echo "</tbody>
	  </table>
					</div>
				</div>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM hubungi"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    break;

  case "balasemail":
    $tampil = mysql_query("SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
    $r      = mysql_fetch_array($tampil);

    echo "<div class='box'>
		  <div class='title'>
		  Reply Email
		  <span class='hide'></span>
		  </div>
		  <div class='content'>
          <form method=POST action='?module=hubungi&act=kirimemail'>
          <div class='row'>
		  <label>To</label>
		  <div class='right'><input type=text name='email' value='$r[email]'></div>
		  </div>
		  <div class='row'>
		  <label>Subject</label>
		  <div class='right'><input type=text name='subjek' value='Re: $r[subjek]'></div>
		  </div>
		  <div class='row'>
		  <label>Message</label>
		  <div class='right'><textarea name='isi_berita' class='wysiwyg'>
		  <br><br><br><br>
		  -----------------------------------------------------------------------------------------------------------------
		$r[pesan]
		  </textarea></div>
		  </div>
		  
		  <table>
          <tr><td>Kepada</td><td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td>Subjek</td><td> : <input type=text name='subjek' size=50 value='Re: $r[subjek]'></td></tr>
          <tr><td>Pesan</td><td> <textarea name='pesan' style='width: 600px; height: 180px;'><br><br><br><br>     
  -----------------------------------------------------------------------------------------------------------------
  $r[pesan]</textarea></td></tr>
					  <div class='row'>
								<div class='right'>
									<button type='submit'><span>Send</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;
    
  case "kirimemail":
    mail($_POST[email],$_POST[subjek],$_POST[pesan],"From: sayangschool@gmail.com");
    echo "<h2>Status Email</h2>
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	 		  
    break;  
}
}
?>
