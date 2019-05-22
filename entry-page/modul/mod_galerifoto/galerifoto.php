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
$aksi="modul/mod_galerifoto/aksi_galerifoto.php";
switch($_GET[act]){
  // Tampil Galeri Foto
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=galerifoto&act=tambahgalerifoto';\">
		  <span>Add List Portofolio</span></button>
		<div class='box'>
	  <div class='title'>
						Portofolio
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>List Portofolio</th><th>Portofolio</th><th>Action</th></tr></thead>
								<tbody>"; 

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM gallery,album WHERE gallery.id_album=album.id_album ORDER BY id_gallery DESC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[jdl_gallery]</td>
                <td>$r[jdl_album]</td>
		            <td><a href=?module=galerifoto&act=editgalerifoto&id=$r[id_gallery]><img src='gfx/icons/small/edit.png'  title='Edit' alt='edit'></a>
		                <a href=javascript:confirmdelete('$aksi?module=galerifoto&act=hapus&id=$r[id_gallery]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a></td>
		        </tr>";
      $no++;
    }
		echo "</tbody>
	  </table>
					</div>
				</div>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM gallery"));
  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
 
    break;
  
  case "tambahgalerifoto":
    echo "<div class='box'>
					<div class='title'>
						Add Photo Gallery
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=galerifoto&act=input' enctype='multipart/form-data'>
					  <div class='row'>
					  <label>Album Tittle</label>
					  <div class='right'><input type=text name='jdl_gallery'></div>
					  </div>
					  <div class='row'>
					  <label>Album</label>
					  <div class='right'>
					  <select name='album'>
            <option value=0 selected>- Pilih Portofolio -</option>";
            $tampil=mysql_query("SELECT * FROM album ORDER BY jdl_album");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_album]>$r[jdl_album]</option>";
            }
    echo "</select></div></div>
					  <div class='row'>
					  <label>Notes</label><br /><br />
					  <textarea name='keterangan' id='loko' style='width: 350px; height: 350px;'></textarea>
					  </div>
					  <div class='row'>
					  <label>Images</label>
					  <div class='right'><input type=file name='fupload'></div>
					  </div>
					  <div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;
    
  case "editgalerifoto":
    $edit = mysql_query("SELECT * FROM gallery WHERE id_gallery='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit List Portofolio
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=galerifoto&act=update>
          <input type=hidden name=id value=$r[id_gallery]>
          <div class='row'>
					  <label>List Portofolio Tittle</label>
					  <div class='right'><input type=text name='jdl_gallery' value='$r[jdl_gallery]'></div>
					  </div>
					  <div class='row'>
					  <label>Portofolio</label>
					  <div class='right'>
					  <select name='album'>";
		  $tampil=mysql_query("SELECT * FROM album ORDER BY jdl_album");
          if ($r[id_album]==0){
            echo "<option value=0 selected>- Pilih Portofolio -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_album]==$w[id_album]){
              echo "<option value=$w[id_album] selected>$w[jdl_album]</option>";
            }
            else{
              echo "<option value=$w[id_album]>$w[jdl_album]</option>";
            }
          }
    echo "</select></div>
							</div>
					  <div class='row'>
					  <label>Notes</label>
					  <textarea name='keterangan' id='loko' style='width: 350px; height: 350px;'></textarea>
					 </div>
					  <div class='row'>
					  <label></label>
					  <div class='right'>";
					  if ($r[gbr_gallery]!=''){
              echo "<img src='../img_galeri/kecil_$r[gbr_gallery]'>";  
          }
		  echo "</div>
					  </div>
					 <div class='row'>
					  <label>Images</label>
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
