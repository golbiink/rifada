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
$aksi="modul/mod_portofolio/aksi_portofolio.php";
switch($_GET[act]){
  // Tampil Portofolio
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=portofolio&act=tambahportofolio';\">
		<span>Tambah Portofolio</span></button>
		<div class='box'>
	  <div class='title'>
						Portofolio
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>no</th><th>Nama Portofolio</th><th>Link</th><th>Alamat</th><th>aksi</th></tr></thead>
								<tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM portofolio order BY id_portofolio DESC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[nama_portofolio]</td>
				<td>portofolio-$r[id_portofolio]-$r[portofolio_seo].html</td>
                <td>$r[alamat_portofolio]</td>
		            <td><a href=?module=portofolio&act=editportofolio&id=$r[id_portofolio]><img src='gfx/icons/small/edit.png' alt='edit'></a>
		                <a a href=javascript:confirmdelete('$aksi?module=portofolio&act=hapus&id=$r[id_portofolio]&namafile=$r[gambar]') 
   title='Hapus' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a></td>
		        </tr>";
      $no++;
    }
    echo "</tbody>
	  </table>
					</div>
				</div>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM portofolio"));
  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
 
    break;
  
  case "tambahportofolio":
    echo "<div class='box'>
					<div class='title'>
						Tambah Potofilio
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=portofolio&act=input' enctype='multipart/form-data'>
					<div class='row'>
								<label>Nama Perusahaan</label>
								<div class='right'><input type=text name='nama_portofolio'></div>
					</div>
					<div class='row'>
								<label>Alamat</label>
								<div class='right'><input type=text name='alamat_portofolio'></div>
					</div>
					<div class='row'>
								<label>Foto Perusahaan</label>
								<div class='right'><input type=file name='fupload' size=40> </div>
					</div>
					<div class='right'>
									<button type='submit'><span>Simpan</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;
    
  case "editportofolio":
    $edit = mysql_query("SELECT * FROM portofolio WHERE id_portofolio='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Portofolio
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=portofolio&act=update>
          <input type=hidden name=id value=$r[id_portofolio]>
					<div class='row'>
								<label>Nama Perusahaan</label>
								<div class='right'><input type=text name='nama_portofolio' value='$r[nama_portofolio]'></div>
					</div>
					<div class='row'>
								<label>Alamat</label>
								<div class='right'><input type=text name='alamat_portofolio' value='$r[alamat_portofolio]'></div>
					</div>
					<div class='row'>
								<label></label>
								<div class='right'>";
					if ($r[foto_portofolio]!=''){
              echo "<img src='../img_portofolio/kecil_$r[foto_portofolio]'>";  
          }
    echo "</div>
							</div>
							<div class='row'>
								<label>Gambar</label>
								<div class='right'><input type=file name='fupload' size=40></div>
							</div>
							<div class='right'>
									<button type='submit'><span>Simpan</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
    break;  
}
}
?>
