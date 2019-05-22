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
$aksi="modul/mod_staff/aksi_staff.php";
switch($_GET[act]){
  // Tampil Staff
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=staff&act=tambahstaff';\">
		<span>Tambah Staff</span></button>
		<div class='box'>
	  <div class='title'>
						Staff
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>no</th><th>nama staff</th><th>jabatan</th><th>aksi</th></tr></thead>
								<tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM staff,jabatan WHERE staff.id_jabatan=jabatan.id_jabatan ORDER BY id_staff DESC LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[nama_staff]</td>
                <td>$r[nama_jabatan]</td>
		            <td><a href=?module=staff&act=editstaff&id=$r[id_staff]><img src='gfx/icons/small/edit.png' alt='edit'></a>
		               <a href=javascript:confirmdelete('$aksi?module=staff&act=hapus&id=$r[id_staff]&namafile=$r[gambar]') 
   title='Hapus' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a></td>
		        </tr>";
      $no++;
    }
    echo "</tbody>
	  </table>
					</div>
				</div>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM staff"));
  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    break;
  
  case "tambahstaff":
    echo "<div class='box'>
					<div class='title'>
						Tambah Staff
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=staff&act=input' enctype='multipart/form-data'>
						    <div class='row'>
								<label>Nama Staff</label>
								<div class='right'><input type=text name='nama_staff'></div>
							</div>
							<div class='row'>
								<label>jabatan</label>
								<div class='right'>
								<select name='jabatan'>
            <option value=0 selected>- Pilih Jabatan -</option>";
            $tampil=mysql_query("SELECT * FROM jabatan ORDER BY nama_jabatan");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_jabatan]>$r[nama_jabatan]</option>";
            }
    echo "</select></div>
							</div>
							<div class='row'>
								<label>Keterangan</label>
								<div class='right'><textarea name='keterangan' class='wysiwyg'></textarea></div>
							</div>
							<div class='row'>
								<label>Gambar</label>
								<div class='right'><input type=file name='fupload' size=40></div>
							</div>
							<div class='row'>
								<label>Facebook</label>
								<div class='right'><input type=text name='facebook'></div>
							</div>
							<div class='row'>
								<label>Twitter</label>
								<div class='right'><input type=text name='twitter'></div>
							</div>
							<div class='row'>
								<label>Email</label>
								<div class='right'><input type=text name='email'></div>
							</div>
							<div class='right'>
									<button type='submit'><span>Simpan</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;
    
  case "editstaff":
    $edit = mysql_query("SELECT * FROM staff WHERE id_staff='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Modul
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=staff&act=update>
          <input type=hidden name=id value=$r[id_staff]>
						    <div class='row'>
								<label>Nama Staff</label>
								<div class='right'><input type=text name='nama_staff' value='$r[nama_staff]'></div>
							</div>
							<div class='row'>
								<label>Jabatan</label>
								<div class='right'> <select name='jabatan'>";
 
          $tampil=mysql_query("SELECT * FROM jabatan ORDER BY nama_jabatan");
          if ($r[id_jabatan]==0){
            echo "<option value=0 selected>- Pilih Jabatan -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_jabatan]==$w[id_jabatan]){
              echo "<option value=$w[id_jabatan] selected>$w[nama_jabatan]</option>";
            }
            else{
              echo "<option value=$w[id_jabatan]>$w[nama_jabatan]</option>";
            }
          }
    echo "</select></div>
							</div>
							<div class='row'>
								<label>Keterangan</label>
								<div class='right'><textarea name='keterangan' class='wysiwyg'>$r[keterangan]</textarea></div>
							</div>
							<div class='row'>
								<label></label>
								<div class='right'>";
          if ($r[gbr_staff]!=''){
              echo "<img src='../img_staff/kecil_$r[gbr_staff]'>";  
          }
    echo "</div>
							</div>
							<div class='row'>
								<label>Gambar</label>
								<div class='right'><input type=file name='fupload' size=40></div>
							</div>
							<div class='row'>
								<label>Facebook</label>
								<div class='right'><input type=text name='facebook' size=60 value='$r[facebook]'></div>
							</div>
							<div class='row'>
								<label>Twitter</label>
								<div class='right'><input type=text name='twitter' size=60 value='$r[twitter]'></div>
							</div>
							<div class='row'>
								<label>Email</label>
								<div class='right'><input type=text name='email' size=60 value='$r[email]'></div>
							</div>
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
