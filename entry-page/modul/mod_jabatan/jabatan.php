<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_jabatan/aksi_jabatan.php";
switch($_GET[act]){
  // Tampil Jabatan
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=jabatan&act=tambahjabatan';\">
		<span>Tambah Jabatan</span></button>
		<div class='box'>
	  <div class='title'>
						Jabatan
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Nama Jabatan</th><th>Status</th><th>Aksi</th></tr></thead>
								<tbody>"; 
    $tampil=mysql_query("SELECT * FROM jabatan ORDER BY id_jabatan DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_jabatan]</td>
			 <td>$r[aktif]</td>
             <td><a href=?module=jabatan&act=editjabatan&id=$r[id_jabatan]><img src='gfx/icons/small/edit.png' alt='edit'></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody>
	  </table>
					</div>
				</div>";
    echo "<div id=paging>*) Data pada Jabatan tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Jabatan.</div><br>";
    break;
  
  // Form Tambah Jabatan
  case "tambahjabatan":
    echo "<div class='box'>
					<div class='title'>
						Tambah Jabatan
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=jabatan&act=input'>
				    <div class='row'>
								<label>Nama Jabatan</label>
								<div class='right'><input type=text name='nama_jabatan'></div>
					</div>
					<div class='right'>
									<button type='submit'><span>Simpan</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;
  
  // Form Edit Jabatan
  case "editjabatan":
    $edit=mysql_query("SELECT * FROM jabatan WHERE id_jabatan='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Jabatan
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action=$aksi?module=jabatan&act=update>
          <input type=hidden name=id value='$r[id_jabatan]'>
				<div class='row'>
								<label>Nama Jabatan</label>
								<div class='right'><input type=text name='nama_jabatan' value='$r[nama_jabatan]'></div>
					</div>";
					if ($r[aktif]=='Y'){
      echo "<div class='row'>
								<label>Aktif</label>
								<div class='right'>
									<input type='radio' name='aktif' id='radio-1' value='Y' checked='checked'/> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='aktif' id='radio-2' value='N'/> 
									<label for='radio-2'>N</label>
								</div>
							</div>";
    }
    else{
      echo "<div class='row'>
								<label>Aktif</label>
								<div class='right'>
									<input type='radio' name='aktif' id='radio-1' value='Y'/> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='aktif' id='radio-2' value='N'  checked='checked'/> 
									<label for='radio-2'>N</label>
								</div>
							</div>";
    }  
    echo "<div class='right'>
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
