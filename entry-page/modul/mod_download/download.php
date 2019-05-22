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
$aksi="modul/mod_download/aksi_download.php";
switch($_GET[act]){
  // Tampil Download
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=download&act=tambahdownload';\">
		  <span>Add File Download</span></button>
		<div class='box'>
	  <div class='title'>
						Download
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Tittle</th><th>File Name</th><th>Posted Date</th><th>Action</th></tr></thead>
								<tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM download ORDER BY id_download DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$r[nama_file]</td>
                <td>$tgl</td>
                <td><a href=?module=download&act=editdownload&id=$r[id_download]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a>
				<a href=javascript:confirmdelete('$aksi?module=download&act=hapus&id=$r[id_download]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a>
		        </tr>";
    $no++;
    }
		echo "</tbody>
	  </table>
					</div>
				</div>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM download"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);   
    break;
  
  case "tambahdownload":
    echo "<div class='box'>
					<div class='title'>
						Add File Download
						<span class='hide'></span>
					</div>
					<div class='content'>
					  <form method=POST action='$aksi?module=download&act=input' enctype='multipart/form-data'>
					  <div class='row'>
					  <label>Tittle</label>
					  <div class='right'><input type=text name='judul'></div>
					  </div>
					  <div class='row'>
					  <label>File</label>
					  <div class='right'><input type=file name='fupload'></div>
					  </div>
					  <div class='row'>
								<div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;
    
  case "editdownload":
    $edit = mysql_query("SELECT * FROM download WHERE id_download='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit File Download
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=download&act=update>
          <input type=hidden name=id value=$r[id_download]>
		 <div class='row'>
					  <label>Tittle</label>
					  <div class='right'><input type=text name='judul' value='$r[judul]'></div>
					  </div>
					  <div class='row'>
					  <label></label>
					  <div class='right'>$r[nama_file]</div>
					  </div>
					  <div class='row'>
					  <label>File</label>
					  <div class='right'><input type=file name='fupload'></div>
					  </div>
					  <div class='row'>
								<div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
    break;  
}
}
?>
