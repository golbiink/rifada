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
$aksi="modul/mod_album/aksi_album.php";
switch($_GET[act]){
  // Tampil Album
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=album&act=tambahalbum';\">
		  <span>Add Portofolio</span></button>
		<div class='box'>
	  <div class='title'>
						Album
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Portofolio</th><th>Action</th></tr></thead>
								<tbody>"; 
    $tampil=mysql_query("SELECT * FROM album ORDER BY id_album DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[jdl_album]</td>
             <td><a href=?module=album&act=editalbum&id=$r[id_album]><img src='gfx/icons/small/edit.png' tittle='Edit' alt='edit'></a>
			  <a href=javascript:confirmdelete('$aksi?module=album&act=hapus&id=$r[id_album]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a>
             </td></tr>";
      $no++;
    }
		echo "</tbody>
	  </table>
					</div>
				</div>";
    break;
  
  // Form Tambah Album
  case "tambahalbum":
    echo "<div class='box'>
					<div class='title'>
						Add Portofolio
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=album&act=input' enctype='multipart/form-data'>
					  <div class='row'>
					  <label>Portofolio Tittle</label>
					  <div class='right'><input type=text name='jdl_album'></div>
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
  
  // Form Edit Album  
  case "editalbum":
    $edit=mysql_query("SELECT * FROM album WHERE id_album='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Portofolio
						<span class='hide'></span>
					</div>
					<div class='content'>
		  <form method=POST enctype='multipart/form-data' action=$aksi?module=album&act=update>
          <input type=hidden name=id value='$r[id_album]'>
					  <div class='row'>
					  <label>Portofolio Tittle</label>
					  <div class='right'><input type=text name='jdl_album' value='$r[jdl_album]'></div>
					  </div>
					  <div class='row'>
					  <label></label>
					  <div class='right'><img src='../img_album/kecil_$r[gbr_album]'></div>
					  </div>
					  <div class='row'>
					  <label>Images</label>
					  <div class='right'><input type=file name='fupload'></div>
					  </div>";
			if ($r[aktif]=='Y'){
				echo "<div class='row'>
								<label>Active</label>
								<div class='right'>
									<input type='radio' name='aktif' id='radio-1' value='Y' checked='checked' /> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='aktif' id='radio-2' value='N' /> 
									<label for='radio-2'>N</label>
								</div>
							</div>";
							}
				else{
				echo "<div class='row'>
								<label>Active</label>
								<div class='right'>
									<input type='radio' name='aktif' id='radio-1' value='Y' /> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='aktif' id='radio-2' value='N' checked='checked' /> 
									<label for='radio-2'>N</label>
								</div>
							</div>";
				}
					echo "<div class='row'>
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
